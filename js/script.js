"use strict";

const modalSignup = document.querySelector('#modalSignup'),
    modalSignin = document.querySelector('#modalSignin'),
    modalSign = document.querySelectorAll('.modalSign'),
    closeSingup = document.querySelector('#closeSingup'),
    closeSingin = document.querySelector('#closeSingin'),
    buttonSignup = document.querySelector('#buttonSignup'),
    buttonSignin = document.querySelector('#buttonSignin'),
    modalSignupContent = document.querySelector('#modalSignup__content'),
    modalSigninContent = document.querySelector('#modalSignin__content'),
    portfolioAddAchievement = document.querySelector('.portfolio__addAchievement'),
    modalAddAchievement = document.querySelector('.modalAddAchievement'),
    modalAddAchievementActivity = document.querySelector('#modalAddAchievement__activity'),
    AddAchievementBtn = document.querySelector('#AddAchievementBtn');

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

if (portfolioAddAchievement) {
    portfolioAddAchievement.addEventListener('click', () => {
        modalAddAchievement.classList.toggle('hide');
    });
}

if (modalAddAchievement) {
    document.addEventListener('click', (e) => {
        if (e.target.classList[0] === 'modalAddAchievement') {
            modalAddAchievement.classList.add('hide');
        }
    });
}

if (modalSign) {
    document.addEventListener('click', (e) => {
        if (e.target.classList[0] === 'modalSign') {
            if (!modalSign[0].classList.contains('hide')) {
                modalSign[0].classList.add('hide');
            }
            if (!modalSign[1].classList.contains('hide')) {
                modalSign[1].classList.add('hide');
            }
        }
    });
}

if (AddAchievementBtn) {
    AddAchievementBtn.addEventListener('click', () => {
        modalAddAchievement.classList.add('hide');
    });
}

if (modalAddAchievementActivity) {
    const tableList = ['.criterion__science', '.criterion__study', '.criterion__social', '.criterion__cultural', '.criterion__sport', '.criterion__course', '.criterion__diplom'];
    let selectedIndex,
        earlyIndex;
    
    if (modalAddAchievementActivity.selectedIndex !== -1) {
        selectedIndex = modalAddAchievementActivity.options[modalAddAchievementActivity.selectedIndex].value;
        earlyIndex = selectedIndex;

        modalAddAchievementActivity.addEventListener('change', () => {
            earlyIndex = selectedIndex;
            document.querySelector(tableList[earlyIndex]).style.display = "none";

            selectedIndex = modalAddAchievementActivity.options[modalAddAchievementActivity.selectedIndex].value;
            document.querySelector(tableList[selectedIndex]).style.display = "table";

            if (selectedIndex === '5' || selectedIndex === '6') {
                document.querySelector('.modalAddAchievement__kind').style.display = 'none';
                document.querySelector('.participant').style.display = 'block';
            } else {
                document.querySelector('.participant').style.display = 'none';
                document.querySelector('.modalAddAchievement__kind').style.display = 'block';
            }
        });
    }

    const modalAddAchievementData = document.querySelector('#modalAddAchievement__data');
    let now = new Date(),
        year = now.getFullYear(),
        month = now.getMonth() + 1,
        date = now.getDate();

    if (month < 10) {
        month = '0' + month;
    }

    if (date < 10) {
        date = '0' + date;
    }

    modalAddAchievementData.value = year + '-' + month + '-' + date;  
}





