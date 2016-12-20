/**
 * Created by linjunru on 2016/12/14.
 */
function ElementStandard(elementName, className, id, otherData, selfDefinedData){
    this.elementName = elementName;
    this.className = className;
    this.id = id;
    this.otherData = otherData;
    this.selfDefinedData = selfDefinedData;
}

/**
 * Create a list
 *
 * @param objects
 * @param elementStandards
 * @returns {*}
 */
function createList(objects, elementStandards, titleNames){
    if(!(objects instanceof Array)){
        return undefined;
    }
    var es = elementStandards;
    var list = createNode("div", "list");
    var title = createNode("div", "title row");
    for(var attrName in objects[0]){
        var titleNode = createNode("div", "title");
        if(titleNames[attrName]==undefined){
            titleNode.innerHTML = attrName;
        } else {
            titleNode.innerHTML = titleNames[attrName];
        }
        title.appendChild(titleNode);
    }
    list.appendChild(title);
    for(var i=0; i<objects.length; i++){
        var row = createNode("div", "row");
        for(var j in objects[i]){
            var node = createNode(es[j].elementName, es[j].className, es[j].id, es[j].otherData, es[j].selfDefinedData);
            node.innerHTML = objects[i][j];
            row.appendChild(node);
        }
        list.appendChild(row);
    }
    return list;
}


/*
 *   Sort the array of objects.
 *
 * @array
 * @order 1 for ascend, -1 for descend;
 */
function sortObjects(array, key, order){
    var compare;
    compare = function(value1, value2){
        var result;
        if(value1[key]>value2[key]){
            result = 1;
        } else if(value1[key]<value2[key]){
            result = -1;
        } else {
            result = 0;
        }
        if (typeof order == "number"){
            return result*order;
        }
        return result;
    };
    array.sort(compare);
}

/**
 *
 * @param elementName
 * @param className
 * @param id
 * @returns {*}
 */
function createNode(elementName, className, id, otherAttrs, selfDefinedAttrs){
    if(elementName==undefined){
        return undefined;
    }
    var node = document.createElement(elementName);
    if(typeof className == "string"){
        node.className = className;
    }
    if(typeof id == "string"){
        node.id = id;
    }
    if(typeof otherAttrs=="object"){
        for(var attr in otherAttrs){
            node[attr] = otherAttrs[attr];
        }
    }
    if(typeof selfDefinedAttrs=="object"){
        for(var attr in selfDefinedAttrs){
            node.setAttribute(attr, selfDefinedAttrs[attr]);
        }
    }
    return node;
}



/**
 *
 * @param element
 */
function removeNode(element){
    var parent = element.parentNode;
    parent.removeChild(element);
}

Element.insertAfter = function(refNode, newNode){
    var parent = refNode.parentNode;
    if(parent.lastChild == refNode){
        parent.appendChild(newNode)
    } else {
        refNode.insertBefore(refNode.nextSibling, newNode);
    }
};

/**
 *
 * @param Element
 * @param className
 */
function addClass(Element, className) {
    var classList = Element.classList;
    classList.add(className);
}

/**
 *
 * @param Element
 * @param className
 */
function removeClass(Element, className) {
    var classList = Element.classList;
    classList.remove(className);
}

/**
 *
 * @param Element
 * @param className
 */
function toggleClass(Element, className) {
    var classList = Element.classList;
    classList.toggle(className);
}

/**
 * Created by linjunru on 2016/12/14.
 */

function AjaxUtil() {
    this.xhr = new XMLHttpRequest();
}


/**
 * Send Ajax request.
 *
 * @param url
 * @param data
 * @param method "GET" or "POST"
 * @param header An object whose attribute name is header name, and attribute value is header content.
 */
AjaxUtil.prototype.asyRequest = function (url, data, method, header){
    if(method == undefined){
        this.xhr.open("GET", url, true); //using GET method by default
    } else {
        this.xhr.open(method, url, true);
    }

    if(typeof header == "object"){
        this.xhr.setRequestHeader()
    }

    if(data != undefined){
        this.xhr.send(data);
    } else {
        this.xhr.send(null);
    }
};

/**
 *
 * @returns {Object}
 */
AjaxUtil.prototype.getResponse = function(){
    return this.xhr.response;
};

AjaxUtil.prototype.setSuccessAction = function(action){
    if(typeof action == "function"){
        this.xhr.onload = action;
    }
};

AjaxUtil.prototype.setFailureAction = function(action){
    if(typeof action == "function"){
        this.xhr.onerror = action;
    }
};

AjaxUtil.prototype.setProgressAction = function(action){
    if(typeof action == "function"){
        this.xhr.onprogress = action;
    }
};


