function filter() {
    var name = document.getElementById("name").value;
    var identity = document.getElementById("identity").value;

    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "../query/admin.php?name="+name+"&identity="+identity, true);
    myRequest.send();
    myRequest.onload = function() {
        document.getElementById("user-info").innerHTML = this.responseText;
    }
}

function removeStudent(button) {
    var username = button.value;
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "../query/remove-student.php?name="+username, true);
    myRequest.send();
    alert(username + " is deleted.");
}

function removeTeacher(button) {
    var username = button.value;
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "../query/remove-teacher.php?name="+username, true);
    myRequest.send();
    alert(username + " is deleted.");
}

function modifyStudent(button) {
    var username = button.value;
    window.location.href = "../pages/admin-modify-user.php?username="+username+"&role=student";
}

function modifyTeacher(button) {
    var username = button.value;
    window.location.href = "../pages/admin-modify-user.php?username="+username+"&role=teacher";
}