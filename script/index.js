function login() {
    var form = document.getElementById("login-form");
    var submit = form.elements["submit"];
    var data = new FormData(form);

    if(typeof loginAjax == "undefined"){
        loginAjax = new AjaxUtil();
        loginAjax.asyRequest(form.action, data, "post");
        loginAjax.setSuccessAction(function(){
            var response = loginAjax.getResponse();
            if (parseInt(response)==1) {
                document.getElementById("login-success").hidden = false;
                document.getElementById("login-window").hidden = true;
                window.location.href="mycourses.php";
            } else if(parseInt(response)==0){
                document.getElementById("login-failed").hidden = false;
                document.getElementById("login-window").hidden = true;
            }

        });
        loginAjax.setFailureAction(function(){
                document.getElementById("login-failed").hidden = false;
                document.getElementById("login-window").hidden = true;
        });
    } else if(loginAjax instanceof AjaxUtil){
        loginAjax.asyRequest(form.action, data, "post");
    }

}
function showLogin() {
    var loginWindow = document.getElementById("login");
    loginWindow.hidden = false;
}
window.onload = function () {
    var loginForm = document.getElementById("login-form");
    var submit = loginForm.elements["submit"];
}