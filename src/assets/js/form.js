// recuperation de la pop up
var modal = document.getElementById("popupFormSpent");

// recuperation du bouton
var btn = document.getElementById("addSpent");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// ouverture de la pop up apres un clck sur le bouton
btn.onclick = function () {
  modal.style.display = "block";
};

// fermeture de la pop up apres click sur la croix
span.addEventListener("click", function () {
  modal.style.display = "none";
});

// fermeture de la pop up apres click en dehors de la pop-up
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
