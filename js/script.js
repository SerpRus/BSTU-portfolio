"use strict";

const modalSignup = document.querySelector('#modalSignup'),
  modalSignin = document.querySelector('#modalSignin'),
  closeSingup = document.querySelector('#closeSingup'),
  closeSingin = document.querySelector('#closeSingin'),
  buttonSignup = document.querySelector('#buttonSignup'),
  buttonSignin = document.querySelector('#buttonSignin'),
  modalSignupContent = document.querySelector('#modalSignup__content'),
  modalSigninContent = document.querySelector('#modalSignin__content');

if (buttonSignup) {
  buttonSignup.addEventListener('click', () => {
    modalSignup.classList.toggle('hide');
    modalSignupContent.classList.toggle('animate');
  });
}

if (buttonSignin) { 
  buttonSignin.addEventListener('click', () => {
    modalSignin.classList.toggle('hide');
    modalSigninContent.classList.toggle('animate');
  });
}

if (closeSingup) {
    closeSingup.addEventListener('click', () => {
    modalSignup.classList.toggle('hide');
    modalSignupContent.classList.toggle('animate');
  });
}

if (closeSingin) {
    closeSingin.addEventListener('click', () => {
    modalSignin.classList.toggle('hide');
    modalSigninContent.classList.toggle('animate');
  });
}




