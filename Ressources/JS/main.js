/*
 * GENERAL JS
 */

const btnPlus = document.querySelectorAll(".plus-icon");
if (btnPlus != null) {
  const elementsTopic = document.querySelectorAll(".help-element");

  btnPlus.forEach((element, index) => {
    element.addEventListener("click", () => {
      let detailSection = elementsTopic[index].querySelector(".detail-section");

      detailSection.classList.toggle("show");

      if (detailSection.classList.contains("show")) {
        element.src = "../Ressources/Images/arrow_up.svg";
      } else {
        element.src = "../Ressources/Images/arrow_down.svg";
      }
    });
  });
}

/*
 * AUTHENTIFICATION JS
 */
const btnChoix = document.querySelectorAll(".connexion-header p");

if (btnChoix != null) {
  let formConnexion = document.getElementById("connexion-form");
  let formInscription = document.getElementById("inscription-form");

  btnChoix.forEach((element) => {
    element.addEventListener("click", function (event) {
      if (btnChoix[0].classList.contains("active")) {
        btnChoix[0].classList.remove("active");
        btnChoix[1].classList.add("active");
        formConnexion.style.display = "none";
        formInscription.style.display = "flex";
      } else {
        btnChoix[0].classList.add("active");
        btnChoix[1].classList.remove("active");
        formConnexion.style.display = "flex";
        formInscription.style.display = "none";
      }
    });
  });
}

/*
 * TROC JSa
 */
const btnSection = document.querySelectorAll(".troc-header p");

if (btnSection != null) {
  btnSection.forEach((element) => {
    element.addEventListener("click", () => {
      btnSection[0].classList.toggle("active");
      btnSection[1].classList.toggle("active");
    });
  });
}
