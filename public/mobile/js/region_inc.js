function Region(R_Province, R_City, R_District, settings)
{
    this.R_Province = R_Province;
    this.R_City = R_City;
    this.R_District = R_District;
    this.objProvince = null;
    this.objCity = null;
    this.objDistrict = null;

    this.preSelectedRegion = '';

    this.selectedProvince = '';
    this.selectedCity = '';
    this.selectedDistrict = '';

    this.config = {optionValue: 'key',};

    if(typeof(settings)!='undefined'){
        for(var c in settings){
            this.config[c] = settings[c];
        }
    }

    //console.log(this.config);
}


/* 初始化区域信息 */
Region.prototype.initRegion = function (objProvince, objCity, objDistrict, selectedRegionID){
    this.objProvince = objProvince;
    this.objCity = objCity;

    if(typeof(objDistrict)!='undefined' && objDistrict){
        this.objDistrict = objDistrict;
    }

    this.selectProvince(selectedRegionID);
    this.preSelectedRegion = selectedRegionID;
}

Region.prototype.initRegion_V2 = function (objProvince, objCity, objDistrict, selectedProvinceID, selectedCityID, selectedDistrictID){
    this.objProvince = objProvince;
    this.objCity = objCity;
    this.objDistrict = objDistrict;

    if(selectedDistrictID){
        this.preSelectedRegion = selectedDistrictID;
    }else if(selectedCityID){
        this.preSelectedRegion = selectedCityID;
    }else{
        this.preSelectedRegion = selectedProvinceID;
    }

    this.selectedProvince = selectedProvinceID;
    this.selectedCity = selectedCityID;
    this.selectedDistrict = selectedDistrictID;

    this.selectProvince(this.preSelectedRegion);

}

/* 选中省份 */
Region.prototype.selectProvince = function (selectedProvinceId){

    //this.objCity.disabled = true
    //this.objDistrict.disabled = true
    if (this.R_Province.length != 0) {
        this.objProvince.options.length = 0
        this.objProvince.options[0] = new Option('省份', '')
        this.objProvince.options[0].selected = true
        var j = 1
        for (i = 0; i < this.R_Province.length; i += 2) {
            if (this.R_Province[i] == "" || this.R_Province[i + 1] == "") {
                continue
            }
            else {
                optionValue = this.config.optionValue=='name'?this.R_Province[i + 1]:this.R_Province[i];
                this.objProvince.options[j] = new Option(this.R_Province[i + 1], optionValue)
                j++
            }
        }
    }
    if (selectedProvinceId != "") {
        selectedProvinceId = selectedProvinceId.toString()
        var L_selectedProvinceId = selectedProvinceId.length
        if (L_selectedProvinceId < 8) {
            for (i = 0; i < 8 - L_selectedProvinceId; i++) {
                selectedProvinceId += "0"
            }
        }

        if (this.selectedProvince) {
            var DefaultProvince = this.selectedProvince;
            var DefaultCity = this.selectedCity;
            var DefaultDistrict = this.selectedDistrict;

        } else {
            var DefaultProvince = selectedProvinceId.substring(0, 4) + '0000';
            var DefaultCity = selectedProvinceId.substring(0, 6) + '00';
            var DefaultDistrict = selectedProvinceId.substring(0, 8);
        }


        this.selectDefaultItem(this.objProvince, DefaultProvince)
        this.selectCity()
        this.selectDefaultItem(this.objCity, DefaultCity)
        this.selectDistrict()
        this.selectDefaultItem(this.objDistrict, DefaultDistrict)
    }
}

/* 选中城市 */
Region.prototype.selectCity = function (){
    if (this.objProvince.selectedIndex != 0) {
        this.objCity.options.length = 0
        this.objCity.options[0] = new Option('城市', '')
        this.objCity.options[0].selected = true;
        this.objCity.disabled = true;

        if(this.objDistrict){
            this.objDistrict.options.length = 0
            this.objDistrict.options[0] = new Option('地区', '')
            this.objDistrict.options[0].selected = true
            this.objDistrict.disabled = true
        }

        if(this.config.optionValue=='name'){
            for(i=1; i<this.R_Province.length; i+=2){
                if(this.R_Province[i]==this.objProvince.value){
                    CityIndex = this.R_Province[i-1];
                }
            }
        }else{
            CityIndex = this.objProvince.options[this.objProvince.selectedIndex].value
        }


        var j = 1
        for (i = 0; i < this.R_City[CityIndex].length; i += 2) {
            if (this.R_City[CityIndex][i] == "" || this.R_City[CityIndex][i + 1] == "") {
                continue
            }
            else {
                optionValue = this.config.optionValue=='name'?this.R_City[CityIndex][i + 1]:this.R_City[CityIndex][i];
                this.objCity.options[j] = new Option(this.R_City[CityIndex][i + 1], optionValue)
                j++
            }
        }
        if (this.objCity.options.length > 1) {
            this.objCity.disabled = false
            //       	 this.objCity.options[1].selected = true
            //       	 this.selectDistrict()

            if(this.objCity.options.length==2){
                this.objCity.options[1].selected = true;
                this.selectDistrict();
            }
        }
    }
    else {
        this.objCity.options.length = 0
        this.objCity.options[0] = new Option('城市', '')
        this.objCity.options[0].selected = true
        this.objCity.disabled = true;

        if(this.objDistrict){
            this.objDistrict.options.length = 0
            this.objDistrict.options[0] = new Option('地区', '')
            this.objDistrict.options[0].selected = true
            this.objDistrict.disabled = true
        }
    }
}

/* 选中县、区 */
Region.prototype.selectDistrict = function(){
    if(!this.objDistrict){
        return false;
    }

    if (this.objProvince.selectedIndex != 0 && this.objCity.selectedIndex != 0) {
        this.objDistrict.options.length = 0
        this.objDistrict.options[0] = new Option('地区', '')
        this.objDistrict.options[0].selected = true
        this.objDistrict.disabled = true

        if(this.config.optionValue=='name'){
            for(i=1; i<this.R_Province.length; i+=2){
                if(this.R_Province[i]==this.objProvince.value){
                    CityIndex = this.R_Province[i-1];
                }
            }

            for(i=1; i<this.R_City[CityIndex].length; i+=2){
                if(this.R_City[CityIndex][i]==this.objCity.value){
                    DistrictIndex = this.R_City[CityIndex][i-1];
                }
            }
        }else{
            DistrictIndex = this.objCity.options[this.objCity.selectedIndex].value;
        }

        var j = 1

        for (i = 0; i < this.R_District[DistrictIndex].length; i += 2) {
            if (this.R_District[DistrictIndex][i] == "" || this.R_District[DistrictIndex][i + 1] == "") {
                continue
            }
            else {
                optionValue = this.config.optionValue=='name'?this.R_District[DistrictIndex][i + 1]:this.R_District[DistrictIndex][i];
                this.objDistrict.options[j] = new Option(this.R_District[DistrictIndex][i + 1], optionValue)
                j++
            }
        }
        if (this.objDistrict.options.length > 1) {
            this.objDistrict.disabled = false
            //           this.objDistrict.options[1].selected = true
        }
    }
    else {
        this.objDistrict.options.length = 0
        this.objDistrict.options[0] = new Option('地区', '')
        this.objDistrict.options[0].selected = true
        this.objDistrict.disabled = true
    }
}


/* 选中默认项目 */
Region.prototype.selectDefaultItem = function (ItemObj, ItemValue){
    if(!ItemObj || !ItemObj.options.length){
        return false;
    }

    for (i = 0; i < ItemObj.options.length; i++) {
        if (ItemObj.options[i].value == ItemValue) {
            ItemObj.options[i].selected = true
            break
        }
    }
}

Region.prototype.isCountry = function(strPlaceID){
    return strPlaceID.substr(0, 2)=='000000';
}

Region.prototype.isProvince = function(strPlaceID){
    return strPlaceID.substr(0, 4)=='0000' && !this.isCountry(strPlaceID);
}

Region.prototype.isCity = function(strPlaceID){
    return strPlaceID.substr(0, 6)=='00' && !this.isProvince(strPlaceID) && !this.isCountry(strPlaceID);
}

Region.prototype.isDistrict = function(strPlaceID){
    return strPlaceID.substr(0, 6)!='00';
}

/* 将相应的地点ID转化为地名 */
Region.prototype.getPlace = function (strPlaceID){
    var i = 0;
    var strProvince = "", strCity = "", strDistrict = "";
    ProvinceID = strPlaceID.substr(0, 4) + '0000';
    CityID = strPlaceID.substr(0, 6) + '00';
    DistrictID = strPlaceID;

    if(ProvinceID!='10110000' && ProvinceID!='10120000' && ProvinceID!='10310000' && ProvinceID!='10500000'){
        strProvince = this.getProvince(ProvinceID)
    }

    if(this.isCity(strPlaceID)){
        strCity = this.getCity(strPlaceID);
    }

    if(this.isDistrict(strPlaceID)){
        strCity = this.getDistrict(strPlaceID);
    }

    var strPlace = strProvince + strCity + strDistrict;
    return strPlace;
}


/* 取得省份名 */
Region.prototype.getProvince = function (ProvinceID){
    strProvince = "";

    for (i = 0; i < this.R_Province.length; i += 2) {
        if (this.R_Province[i] == ProvinceID) {
            strProvince = this.R_Province[i + 1]
            break;
        }
    }
    return strProvince;
}


/* 取得市名 */
Region.prototype.getCity = function (CityID){
    var strCity = "";
    ProvinceID = CityID.substr(0, 4) + '0000';

    for (i = 0; i < this.R_City[ProvinceID].length; i += 2) {
        if (this.R_City[ProvinceID][i] == CityID) {
            strCity = this.R_City[ProvinceID][i + 1];
            break;
        }
    }
    return strCity;
}


/* 取得县、区名 */
Region.prototype.getDistrict =  function (DistrictID){
    var strDistrict = "";
    CityID = DistrictID.substr(0, 6) + '00';

    for (i = 0; i < this.R_District[CityID].length; i += 2) {
        if (this.R_District[CityID][i] == DistrictID) {
            strDistrict = this.R_District[CityID][i + 1];
            break;
        }
    }
    return strDistrict
}

Region.prototype.changeAddress = function (obj, strDistrictId, force){
    if(typeof(force)=='undefined'){force = true;}

    if(!force)
    {
        if(this.preSelectedRegion && obj.value && obj.value!=this.getPlace(this.preSelectedRegion))
        {
            return void(0);
        }
    }

    obj.value = this.getPlace(strDistrictId);
    this.preSelectedRegion = strDistrictId;
}