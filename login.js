function showPassword() {
    var checkBox = document.getElementById("show-password");
    var inputPassword = document.getElementById("login-password");
    if (checkBox.checked == true) {
        inputPassword.type = "text";
    }
    else inputPassword.type = "password";
}

function getRole() {
    var role = document.getElementsByName("role");
    var roleValue;
    for (var i = 0; i < role.length; i++) {
        if (role[i].checked) roleValue = role[i].value;
    }
    return roleValue;
}

function selectRole() {
    var roleValue = getRole();
    if (roleValue == "student") {
        studentInfo = document.getElementsByClassName("select-student");
        for (var i = 0; i < studentInfo.length; i++) {
            studentInfo[i].style.display = "table-row";
        }
        teacherInfo = document.getElementsByClassName("select-teacher");
        for (var i = 0; i < teacherInfo.length; i++) {
            teacherInfo[i].style.display = "none";
        } 
    }
    else if (roleValue == "teacher") {
        studentInfo = document.getElementsByClassName("select-student");
        for (var i = 0; i < studentInfo.length; i++) {
            studentInfo[i].style.display = "none";
        }
        teacherInfo = document.getElementsByClassName("select-teacher");
        for (var i = 0; i < teacherInfo.length; i++) {
            teacherInfo[i].style.display = "table-row";
        } 
    }
}

function checkError() {
    var valid = true;
    var name = document.getElementById("nickname");
    var email = document.getElementById("email");
    var course = document.getElementById("course");

    var namePattern = /^[a-z]+[a-z\s]*/gi;
    var emailPattern = /^\S+@\S+\.\S+/gi;
    var coursePattern = /[a-z]+[0-9]+/gi;
    if (!namePattern.test(name.value)) {
        name.style.border = "solid #93291b 2px";
        name.value = '';
        valid = false;
    }
    else name.style.removeProperty("border");
    if (!emailPattern.test(email.value)) {
        email.style.border = "solid #93291b 2px";
        email.value = '';
        valid = false;
    }
    else email.style.removeProperty("border");  
    if (!coursePattern.test(course.value) && getRole() == "teacher") {
        course.style.border = "solid #93291b 2px";
        course.value = '';
        valid = false;
    }
    else course.style.removeProperty("border");
    
    if (valid) document.getElementById("user-info").submit();
}