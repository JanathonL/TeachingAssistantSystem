function openAndCloseSidenav() {
    var mySidenav = document.getElementById("sideNav");
    if (mySidenav.className.indexOf("w3-hide") != -1) {
        mySidenav.className = mySidenav.className.replace("w3-hide", "w3-show");
    }
    else {
        mySidenav.className = mySidenav.className.replace("w3-show", "w3-hide");
    }
}

function searchCourse() {
    var searchContentValue = document.getElementById("searchContent").value;
    var searchTypeValue = document.getElementById("searchType").value;
    if(searchContentValue == "") {
        var pagination = document.getElementById("pagination");
        if (pagination.className.indexOf("w3-hide") != -1) {
            pagination.className = pagination.className.replace("w3-hide", "w3-show");
        }
        goToPage(1);
    }
    else {
        var pagination = document.getElementById("pagination");
        if (pagination.className.indexOf("w3-show") != -1) {
            pagination.className = pagination.className.replace("w3-show", "w3-hide");
        }
        var courseList = document.getElementsByClassName("course");
        for (var i = 0; i < courseList.length; i++) {
            var courseContent= courseList[i].children[3].children[0].children[0].children[searchTypeValue].innerHTML;
            if (courseContent.indexOf(searchContentValue) != -1) {
                if (courseList[i].className.indexOf("w3-hide") != -1) {
                    courseList[i].className = courseList[i].className.replace("w3-hide", "w3-show");
                }
            }
            else {
                if (courseList[i].className.indexOf("w3-show") != -1) {
                    courseList[i].className = courseList[i].className.replace("w3-show", "w3-hide");
                }
            }
        }
    }
}

function goToPage(pageNumber) {
    var courseList = document.getElementsByClassName("course");
    for (var i = 0; i < courseList.length; i++) {
        if(pageNumber * 6 -6 <= i && i <= pageNumber * 6 -1) {
            if (courseList[i].className.indexOf("w3-hide") != -1) {
                courseList[i].className = courseList[i].className.replace("w3-hide", "w3-show");
            }
        }
        else {
            if (courseList[i].className.indexOf("w3-show") != -1) {
                courseList[i].className = courseList[i].className.replace("w3-show", "w3-hide");
            }
        }
    }
    var pageButtonList = document.getElementsByClassName("page-button");
    for (var j = 0; j < pageButtonList.length; j++) {
        if (pageButtonList[j].className.indexOf("w3-dark-gray") != -1) {
            pageButtonList[j].className = pageButtonList[j].className.replace("w3-dark-gray", "w3-white");
        }
    }
    if (pageButtonList[pageNumber-1].className.indexOf("w3-white") != -1) {
        pageButtonList[pageNumber-1].className = pageButtonList[pageNumber-1].className.replace("w3-white", "w3-dark-gray");
    }
}