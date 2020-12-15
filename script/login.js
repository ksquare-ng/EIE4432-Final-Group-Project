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
    var roleValue = '';
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
    var lastName = document.getElementById("last-name");
    var firstName = document.getElementById("first-name");
    var email = document.getElementById("email");
    var course = document.getElementById("course");
    var gender = document.getElementsByName("gender");
    var birthday = document.getElementById("birthday");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var firstNamePattern = /^[a-z]+[a-z\s]*/gi;
    var lastNamePattern = /^[a-z]+[a-z\s]*/gi;
    var emailPattern = /^\S+@\S+\.\S+/gi;
    var coursePattern = /[a-z]+[0-9]+/gi;
    var birthdayPattern = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/gi;
    var usernamePattern = /^[a-z0-9]+/gi;
    var passwordPattern = /^\S{8,}/gi;

    if (!lastNamePattern.test(lastName.value)) {
        lastName.style.border = "solid #e0474c 2px";
        lastName.value = '';
        valid = false;
    }
    else lastName.style.removeProperty("border");
    if (!firstNamePattern.test(firstName.value)) {
        firstName.style.border = "solid #e0474c 2px";
        firstName.value = '';
        valid = false;
    }
    else firstName.style.removeProperty("border");
    if (!emailPattern.test(email.value)) {
        email.style.border = "solid #e0474c 2px";
        email.value = '';
        valid = false;
    }
    else email.style.removeProperty("border");  
    if (getRole() == '') {
        valid = false;
    }
    if (!coursePattern.test(course.value) && getRole() == "teacher") {
        course.style.border = "solid #e0474c 2px";
        course.value = '';
        valid = false;
    }
    else course.style.removeProperty("border");
    if (getRole() == "student") {
        var flag = true;
        for (var i = 0; i < gender.length; i++) {
            if(gender[i].checked) flag = false;
        }
        if (flag) {
            valid = false;
        }

        if (!birthdayPattern.test(birthday.value)) {
            birthday.style.border = "solid #e0474c 2px";
            birthday.value = '';
            valid = false;
        }
    }
    if (!usernamePattern.test(username.value)) {
        username.style.border = "solid #e0474c 2px";
        username.value = '';
        valid = false;
    }
    else username.style.removeProperty("border");
    if (!passwordPattern.test(password.value)) {
        password.style.border = "solid #e0474c 2px";
        password.value = '';
        valid = false;
    }
    else password.style.removeProperty("border");

    if (valid) document.getElementById("user-info").submit();
}

function checkError1() {
    var valid = true;

    var username = document.getElementById("username");
    var password = document.getElementById("new-password");
    var usernamePattern = /^[a-z0-9]+/gi;
    var passwordPattern = /^\S{8,}/gi;

    if (!usernamePattern.test(username.value)) {
        username.style.border = "solid #e0474c 2px";
        username.value = '';
        valid = false;
    }
    else username.style.removeProperty("border");
    if (!passwordPattern.test(password.value)) {
        password.style.border = "solid #e0474c 2px";
        password.value = '';
        valid = false;
    }
    else password.style.removeProperty("border");

    if (valid) document.getElementById("login").submit();
}
