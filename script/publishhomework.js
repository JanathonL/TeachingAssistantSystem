/**
 * Created by linjunru on 2016/12/17.
 */
function showForm(type){
    switch (parseInt(type)){
        case 1:
            document.getElementById("homework-choice").reset();
            document.getElementById("homework-choice").style.display="";
            document.getElementById("homework-answer").style.display="none";
            break;
        case 2:
            document.getElementById("homework-choice").style.display="none";
            document.getElementById("homework-answer").reset();
            document.getElementById("homework-answer").style.display="";
            break;
        default:
            break;
    }
}

function addChoice() {

    var form = document.forms["homework-choice"];
    var choiceNum;
    var choices = document.getElementById("choices");

    if(typeof form.elements["choice"] == "undefined"){
        choiceNum = 0;
    } else if(typeof form.elements["choice"].length == "undefined"){
        choiceNum = 1;
    } else {
        choiceNum = form.elements["choice"].length;
    }
    choiceNum++;

    var radio = document.createElement("input");
    radio.type = "radio";
    radio.name = "answer";
    radio.value = choiceNum;

    var txtNode = document.createTextNode(choiceNum + ": ");

    var input = document.createElement("input");
    input.type = "text";
    input.name = "choice";

    var deleteBtn = document.createElement("span");
    deleteBtn.className = "button delete-button";
    deleteBtn.innerHTML = "删除";
    deleteBtn.addEventListener("click", function (event) {
        var input = event.target.previousSibling;
        var txt = input.previousSibling;
        var radio = txt.previousSibling;
        var parent = event.target.parentNode;
        var br = event.target.nextSibling;
        parent.removeChild(input);
        parent.removeChild(txt);
        parent.removeChild(radio);
        parent.removeChild(event.target);
        parent.removeChild(br);
    });

    choices.appendChild(radio);
    choices.appendChild(txtNode);
    choices.appendChild(input);
    choices.appendChild(deleteBtn);
    choices.appendChild(document.createElement("br"));
}

function serializeChoiceForm(){

}

function uploadImage(element){
    if(typeof ImageAjax == "undefined"){
        ImageAjax = new AjaxUtil();
        ImageAjax.targetForm = element.form;
        ImageAjax.setSuccessAction(function(){
            var response = ImageAjax.getResponse();
            if(true){   //上传成功
                var textField = ImageAjax.targetForm.elements["content"];
                textField.value = textField.value + "<img src=\"" + response +"\"></img>";
            }
        });
        ImageAjax.setFailureAction(function(){

        });
    }
    var data = new FormData();
    data.append(element.name, element);



    ImageAjax.asyRequest("./control/uploadFile.php", data, "post");
}