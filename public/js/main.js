function usersList(event) {
    value = event.getAttribute("data-id");
    document.querySelector("#users-list").classList.toggle("d-none");
    document.querySelector("#users-post").style.display = "";
}
