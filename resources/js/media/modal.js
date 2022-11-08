"use strict"
let images = document.querySelectorAll(".items__img");
let modalWindow = document.querySelector(".modal");
let modalImg = document.querySelector(".modal__img");
let modalCaption = document.querySelector(".modal__figcaption");

for (const img of images) {
    img.addEventListener("click", function(e){
        modalImg.src = this.src;
        modalCaption.textContent = this.nextElementSibling.textContent;
        img.setAttribute('data-toggle', "modal");
        img.setAttribute('data-target', "#myModal");
    });
}