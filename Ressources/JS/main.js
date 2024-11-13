/*
 * GENERAL JS
 */

const btnPlus = document.querySelectorAll(".plus-icon");
const elementsTopic = document.querySelectorAll(".help-element");

btnPlus.forEach((element, index) => {
  element.addEventListener("click", () => {
    let detailSection = elementsTopic[index].querySelector(".detail-section");

    detailSection.classList.toggle("show");

    if (detailSection.classList.contains("show")) {
      element.src = "Ressources/Images/arrow_up.svg";
    } else {
      element.src = "Ressources/Images/arrow_down.svg";
    }
  });
});
