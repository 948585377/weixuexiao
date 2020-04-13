

document.addEventListener('DOMContentLoaded', function() {

      grid = null;
      docElem = document.documentElement;
      demo = document.querySelector('.grid-demo');
      gridElement = demo.querySelector('.grid');
      
      filterField = demo.querySelector('.filter-field'); // 颜色筛选：红、蓝、绿
      searchField = demo.querySelector('.search-field'); // 搜索筛选
      sortField = demo.querySelector('.sort-field'); // 分类筛选：拖拽、标题、颜色
      layoutField = demo.querySelector('.layout-field'); // 摆放筛选
      addItemsElement = demo.querySelector('.add-more-items'); // 添加更多items
      characters = 'abcdefghijklmnopqrstuvwxyz'; // 26个小写字母（小写）
      filterOptions = ['red', 'blue', 'green']; // 颜色过滤条件
      dragOrder = [];
      uuid = 0;


    initDemo();
    $('.grid').find(".item").each(function(){
       if($(this).attr('is_top') == '1'){
        removeItem(this) 
       }
    })

});


var grid ;
var docElem ;
var demo ;
var gridElement ;
var filterField ; // 颜色筛选：红、蓝、绿
var searchField; // 搜索筛选
var sortField ; // 分类筛选：拖拽、标题、颜色
var layoutField; // 摆放筛选
var addItemsElement; // 添加更多items
var characters = 'abcdefghijklmnopqrstuvwxyz'; // 26个小写字母（小写）
var filterOptions = ['red', 'blue', 'green']; // 颜色过滤条件
var dragOrder = [];
var uuid = 0;
var filterFieldValue;
var sortFieldValue;
var layoutFieldValue;
var searchFieldValue;

function initDemo() {

    initGrid(); // 初始化grid

    // 搜索条件置空
    searchField.value = '';
    // 获取所有下拉选择的条件
    [sortField, filterField, layoutField].forEach(function(field) {
        field.value = field.querySelectorAll('option')[0].value;
    });

    searchFieldValue = searchField.value.toLowerCase(); // 搜索框中输入的值
    filterFieldValue = filterField.value; // 颜色筛选所选择的值
    sortFieldValue = sortField.value; // 分类筛选所选择的值
    layoutFieldValue = layoutField.value; // 摆放筛选所选择的值

    // 为搜索框添加keyup事件
    searchField.addEventListener('keyup', function() {
        var newSearch = searchField.value.toLowerCase();
        if (searchFieldValue !== newSearch) {
            searchFieldValue = newSearch;
            filter();
        }
    });

    // 为颜色、排序和摆放添加change事件
    filterField.addEventListener('change', filter);
    sortField.addEventListener('change', sort);
    layoutField.addEventListener('change', changeLayout);

    // 为"添加更多items"添加click事件
    addItemsElement.addEventListener('click', addItems);
    gridElement.addEventListener('click', function(e) {
        if (elementMatches(e.target, '.card-remove, .card-remove i')) {
            // console.log(e.target); 
            removeItem(e);
        }
    });

}

/**
 * 初始化grid
 */
function initGrid() {

    var dragCounter = 0;

    grid = new Muuri(gridElement, {
        /*items: generateElements(20),*/
        layoutDuration: 400,
        layoutEasing: 'ease',
        dragEnabled: true,
        dragSortInterval: 50,
        dragContainer: document.body,
        dragStartPredicate: function(item, event) {
            var isDraggable = sortFieldValue === 'order';
            var isRemoveAction = elementMatches(event.target, '.card-remove, .card-remove i');
            return isDraggable && !isRemoveAction ? Muuri.ItemDrag.defaultStartPredicate(item, event) : false;
        },
        dragReleaseDuration: 400,
        dragReleseEasing: 'ease'
    })
    .on('dragStart', function() {
        ++dragCounter;
        docElem.classList.add('dragging');
    })
    .on('dragEnd', function() {
        if (--dragCounter < 1) {
            docElem.classList.remove('dragging');
        }
    })
    .on('move', updateIndices)
    .on('sort', updateIndices);

}

function filter() {

    filterFieldValue = filterField.value;
    grid.filter(function(item) {
        var element = item.getElement();
        var isSearchMatch = !searchFieldValue ? true : (element.getAttribute('data-title') || '').toLowerCase().indexOf(searchFieldValue) > -1;
        var isFilterMatch = !filterFieldValue ? true : (element.getAttribute('data-color') || '') === filterFieldValue;
        return isSearchMatch && isFilterMatch;
    });

}

function sort() {

    // Do nothing if sort value did not change.
    var currentSort = sortField.value;
    if (sortFieldValue === currentSort) {
        return;
    }

    // If we are changing from "order" sorting to something else
    // let's store the drag order.
    if (sortFieldValue === 'order') {
        dragOrder = grid.getItems();
    }

    // Sort the items.
    grid.sort(
        currentSort === 'title' ? compareItemTitle :
        currentSort === 'color' ? compareItemColor :
        dragOrder
    );

    // Update indices and active sort value.
    updateIndices();
    sortFieldValue = currentSort;

}

function addItems() {

    // 每次生成5个items
    var newElems = generateElements(5);

    // Set the display of the new elements to "none" so it will be hidden by
    // default.
    newElems.forEach(function(item) {
        item.style.display = 'none';
    });

    // Add the elements to the grid.
    var newItems = grid.add(newElems);

    // Update UI indices.
    updateIndices();

    // Sort the items only if the drag sorting is not active.
    if (sortFieldValue !== 'order') {
        grid.sort(sortFieldValue === 'title' ? compareItemTitle : compareItemColor);
        dragOrder = dragOrder.concat(newItems);
    }

    // Finally filter the items.
    filter();

}

/**
 * 删除card
 * @param e
 */
function removeItem(e) {
        //showMoFang({$row['id']})
        
    var elem = elementClosest($(e)[0], '.item');
    grid.hide(elem, {
        onFinish: function(items) {
           
        }
    });
    updateIndices();

}




function showItem(e) {
    //showMoFang({$row['id']})
    
    // console.log(e);
    var elem = elementClosest($(e)[0], '.item');
    grid.show(elem, {
        onFinish: function(items) {
        
        }
    });
    updateIndices();

}


function changeLayout() {

    layoutFieldValue = layoutField.value;
    grid._settings.layout = {
        horizontal: false,
        alignRight: layoutFieldValue.indexOf('right') > -1,
        alignBottom: layoutFieldValue.indexOf('bottom') > -1,
        fillGaps: layoutFieldValue.indexOf('fillgaps') > -1
    };
    grid.layout();

}

/**
 * 生成card
 * @param amount：生成card的数量
 * @returns {Array}
 */
function generateElements(amount) {
    var ret = [];

    for (var i = 0, len = amount || 1; i < amount; i++) {

        var id = ++uuid;
        var color = getRandomItem(filterOptions); // 随机从红、蓝、绿三种颜色中选择一种
        var title = generateRandomWord(2); // 随机生成2个字母
        // 确保随机生成的高和宽只能是1或2
        var width = Math.floor(Math.random() * 2) + 1;
        var height = Math.floor(Math.random() * 2) + 1;
        var itemElem = document.createElement('div');
        var itemTemplate = '' +
            '<div class="item h' + height + ' w' + width + ' ' + color + '" data-id="' + id + '" data-color="' + color + '" data-title="' + title + '">' +
            '<div class="item-content">' +
            '<div class="card">' +
            '<div class="card-id">' + id + '</div>' +
            '<div class="card-title">' + title + '</div>' +
            '<div class="card-remove"><i class="material-icons">&#xE5CD;</i></div>' +
            '</div>' +
            '</div>' +
            '</div>';

        itemElem.innerHTML = itemTemplate;
        ret.push(itemElem.firstChild);

    }

    return ret;

}

/**
 * 随机中集合（数组）中取出一个元素
 * @param collection：集合（数组）
 * @returns {*}
 */
function getRandomItem(collection) {

    return collection[Math.floor(Math.random() * collection.length)];

}

/**
 * 从26个字母中随机取出
 * @param length：取出字母的个数
 * @returns {string}
 */
function generateRandomWord(length) {

    var ret = '';
    for (var i = 0; i < length; i++) {
        ret += getRandomItem(characters);
    }
    return ret;

}

/**
 * 比较标题（title）
 * @param a
 * @param b
 * @returns {number}
 */
function compareItemTitle(a, b) {

    var aVal = a.getElement().getAttribute('data-title') || '';
    var bVal = b.getElement().getAttribute('data-title') || '';
    return aVal < bVal ? -1 : aVal > bVal ? 1 : 0;

}

/**
 * 比较颜色
 * @param a
 * @param b
 * @returns {number}
 */
function compareItemColor(a, b) {

    var aVal = a.getElement().getAttribute('data-color') || '';
    var bVal = b.getElement().getAttribute('data-color') || '';
    return aVal < bVal ? -1 : aVal > bVal ? 1 : compareItemTitle(a, b);

}

/**
 * 更新card的data-id和card-id的值
 */
function updateIndices() {

    grid.getItems().forEach(function(item, i) {
        item.getElement().setAttribute('data-id', i + 1);
        var back = Number(i+1);
        item.getElement().querySelector('.card-id').value = back;
    });

}

function elementMatches(element, selector) {

    var p = Element.prototype;
    return (p.matches || p.matchesSelector || p.webkitMatchesSelector || p.mozMatchesSelector || p.msMatchesSelector || p.oMatchesSelector).call(element, selector);

}

function elementClosest(element, selector) {

    if (window.Element && !Element.prototype.closest) {
        var isMatch = elementMatches(element, selector);
        while (!isMatch && element && element !== document) {
            element = element.parentNode;
            isMatch = element && element !== document && elementMatches(element, selector);
        }
        return element && element !== document ? element : null;
    } else {
        return element.closest(selector);
    }

}
