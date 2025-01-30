const infoBox = document.getElementById("infoBox");
const toggleButn = document.querySelector(".toggle-butn");

toggleButn.addEventListener("click", function () {
    if (infoBox.style.display === "none" || infoBox.style.display === "") {
        infoBox.style.display = "block";
        toggleButn.textContent = "Hide Info";
    } else {
        infoBox.style.display = "none";
        toggleButn.textContent = "Show Info";
    }
});