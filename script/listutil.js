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