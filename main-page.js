function logout() {
    var myRequest = new XMLHttpRequest();
    myRequest.open("POST", "logout.php", true);
    myRequest.send();
}