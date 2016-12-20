/**
 * Created by linjunru on 2016/12/14.
 */

var students;
var stuAjax = new AjaxUtil();

function initMeta(students){
    titleName = {
        name: "姓名",
        id:"学号"
    };
    elementStandards = {
        name:new ElementStandard("div", "id"),
        id:new ElementStandard("div", "name")
    };
    metaData = [];
    for(var attr in students[0]){
        metaData.push(attr);
        if(elementStandards[attr]==undefined){
            elementStandards[attr]=new ElementStandard("div", "score");
        }
    }

}

order = "descend";
function showStudents(students){
    clearStudents();
    initMeta(students);
    var list = createList(students, elementStandards, titleName);
    var titles = list.getElementsByClassName("row")[0].getElementsByClassName("title");
    var length = titles.length;
    for (var i=0; i<length; i++){
        var sortButton = createNode("div", "sort-button "+order,undefined,{}, {"data-meta":metaData[i]});
        sortButton.onclick = function(event){
            if(order=="ascend"){
                sortObjects(students, event.target.dataset.meta, -1);
                order = "descend";
            } else {
                sortObjects(students, event.target.dataset.meta, 1);
                order = "ascend";
            }
            showStudents(students);
        }
        titles[i].appendChild(sortButton);
    }
    document.getElementById("students").appendChild(list);
}

function clearStudents(){
    document.getElementById("students").innerHTML = "";
}

function searchStudents(keyword) {
    var tmpResult = [];
    if(keyword==""){
        showStudents(students);
    } else {
      for(var i in students){
          if( students[i].name.indexOf(keyword)==0 || students[i].id.toString().indexOf(keyword)==0){
              tmpResult.push(students[i]);
              }
         }
        showStudents(tmpResult);
      }
}