function displaySort (list) {
    const popUp = document.getElementById("sort-" + list);
    if (popUp.style.display != "block") {
        popUp.style.display = "block";
    } else {
        popUp.style.display = "none";
    }
}