const deleteButton = document.getElementById("Delete");
const noButton = document.getElementById("noButton");
const popUp = document.getElementById("popUp");

deleteButton.onclick = function() {
        popUp.style.display = "block";
    }
noButton.onclick = function() {
        popUp.style.display = "none";
    }