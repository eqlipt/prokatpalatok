"use strict";
// document.getElementById('menu-btn').addEventListener('click', () => document.getElementById('side-nav').classList.toggle('open'));

const burgerButton = document.getElementById("menu-btn");
const overlay = document.getElementById("overlay");
const sideMenu = document.getElementById("side-nav");

const toggleSideMenu = function () {
  sideMenu.classList.toggle("open");
  overlay.classList.toggle("open");
};

burgerButton.addEventListener("click", toggleSideMenu);
overlay.addEventListener("click", toggleSideMenu);
