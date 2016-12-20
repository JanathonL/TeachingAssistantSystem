/**
 * Created by linjunru on 2016/12/14.
 */

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
