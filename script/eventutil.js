/**
 * Created by linjunru on 2016/12/14.
 */

function addLoadEvent(event){
    if(typeof event == "function"){
        var oldLoad = window.onload;
        window.onload = function(){
            oldLoad();
            event();
        }
    }
}