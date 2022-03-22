function displayFilter (list) {
    const popUp = document.getElementById("filter-" + list);
    if (popUp.style.display != "block") {
        popUp.style.display = "block";
    } else {
        popUp.style.display = "none";
    }
}