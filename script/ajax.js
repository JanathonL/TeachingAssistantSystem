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


