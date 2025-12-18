
// Formulaire des dépenses
// recuperation de la pop up
var modalSpent = document.getElementById("popupFormSpent");

// recuperation du bouton
var btnSpent = document.getElementById("addSpent");

// Get the <span> element that closes the modal
var spanSpent = document.getElementsByClassName("close")[0];

// ouverture de la pop up apres un clck sur le bouton
btnSpent.onclick = function () {
  modalSpent.style.display = "block";
};

// fermeture de la pop up apres click sur la croix
spanSpent.addEventListener("click", function () {
  modalSpent.style.display = "none";
});

// fermeture de la pop up apres click en dehors de la pop-up
window.onclick = function (event) {
  if (event.target == modalSpent) {
    modalSpent.style.display = "none";
  }
};
