"use strict";

const modalSignup = document.querySelector('#modal-signup'),
  modalSignin = document.querySelector('#modal-signin'),
  closeSingup = document.querySelector('#close-singup'),
  closeSingin = document.querySelector('#close-singin'),
  buttonSignup = document.querySelector('#button-signup'),
  buttonSignin = document.querySelector('#button-signin'),
  modalSignupContent = document.querySelector('#modal-signup__content'),
  modalSigninContent = document.querySelector('#modal-signin__content');

if (buttonSignup) {
  buttonSignup.addEventListener('click', () => {
    modalSignup.style.zIndex = "1";
    modalSignup.style.opacity = "1";
    modalSignupContent.style.animation = "descent 0.4s linear forwards";
  });
}

if (buttonSignin) { 
  buttonSignin.addEventListener('click', () => {
    modalSignin.style.zIndex = "1";
    modalSignin.style.opacity = "1";
    modalSigninContent.style.animation = "descent 0.4s linear forwards";
  });
}


closeSingup.addEventListener('click', () => {
  modalSignup.style.zIndex = "-1";
  modalSignup.style.opacity = "0";
  modalSignupContent.style.animation = "climb 0.4s linear forwards";
});

closeSingin.addEventListener('click', () => {
  modalSignin.style.zIndex = "-1";
  modalSignin.style.opacity = "0";
  modalSigninContent.style.animation = "climb 0.4s linear forwards";
});



