// Formulaire des evenements
// recuperation de la pop up
var modalEvent = document.getElementById("popupFormEvent");

// recuperation du bouton
var btnEvent = document.getElementById("addEvent");

// Get the <span> element that closes the modal
var spanEvent = document.getElementsByClassName("close")[0];

// ouverture de la pop up apres un clck sur le bouton
btnEvent.onclick = function () {
  modalEvent.style.display = "block";
};

// fermeture de la pop up apres click sur la croix
spanEvent.addEventListener("click", function () {
  modalEvent.style.display = "none";
});

// fermeture de la pop up apres click en dehors de la pop-up
window.onclick = function (event) {
  if (event.target == modalEvent) {
    modalEvent.style.display = "none";
  }
};
