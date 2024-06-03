function logoutHandle() {
    window.localStorage.setItem("ftoken", "");
    window.location.reload();
}
