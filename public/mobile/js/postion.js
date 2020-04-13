
function distanceByLnglat(lng1, lat1, lng2 = 0, lat2 = 0) {
    var radLat1 = Rad(lat1);
    var radLat2 = Rad(lat2);
    var a = radLat1 - radLat2;
    var b = Rad(lng1) - Rad(lng2);
    var s = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(a / 2), 2) + Math.cos(radLat1) * Math.cos(radLat2) * Math.pow(Math.sin(b / 2), 2)));
    s = s * 6378137.0;
    s = Math.round(s * 10000) / 10000000;
    s = s.toFixed(2);
    return s;
}
function Rad(d) {
    return d * Math.PI / 180.0
};



