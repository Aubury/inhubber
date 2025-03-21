
"use strict";


document.addEventListener('DOMContentLoaded', () => {

    const swiper = new Swiper('.stories__slider', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    //Burger

    function burgerClick() {
        const burger = document.querySelector('.header__burger');
        const menu = document.querySelector('.bottom-header__nav');
        const btns = document.querySelector('.bottom-header__btns');
        const body = document.body;

        const menuMobile = document.createElement('div');
        menuMobile.classList.add('menu-mobile');
        body.append(menuMobile);

        if (burger) {
            burger.addEventListener('click', () => {
                burger.classList.toggle('_active');
                body.classList.toggle('_active');
                menuMobile.classList.toggle('_active');
            });

            if (document.documentElement.clientWidth <= 992) {
                burger.insertAdjacentElement('afterend', menuMobile);
                menuMobile.insertAdjacentElement('beforeend', menu);
            }
            if (document.documentElement.clientWidth <= 576) {
                menuMobile.insertAdjacentElement('beforeend', btns);
            }
        }
    }
    burgerClick();

    //==============================================================


    // Menu mobile nav click

    function menuClickNavMobile() {
        const links = document.querySelectorAll('.bottom-header__nav-arrow>a');
        const menuListSecond = document.querySelectorAll('.bottom-header__nav-second');

        if (links.length > 0) {
            for (let index = 0; index < links.length; index++) {
                const link = links[index];
                let secondMenuHeight = menuListSecond[index].clientHeight;

                if (document.documentElement.clientWidth <= 992) {
                    menuListSecond[index].style.height = '0px';
                }

                link.addEventListener('click', (e) => {
                    if (document.documentElement.clientWidth <= 992) {
                        e.preventDefault();
                        link.parentElement.classList.toggle('_active');

                        if (link.parentElement.classList.contains('_active')) {
                            menuListSecond[index].style.height = `${secondMenuHeight}px`;
                        } else {
                            menuListSecond[index].style.height = '0px';
                        }
                    }
                });
            }
        }
    }
    menuClickNavMobile();

    //===================================================================

    // Tab Solutions

    function tabSolutionHide(tabs, contents) {
        tabs.forEach(tab => {
            tab.classList.remove('_active');
        });
        contents.forEach(content => {
            content.classList.remove('_active');
        });
    }
    function tabSolutionClick(selectorTab, selectorContents) {
        const tabs = document.querySelectorAll(selectorTab);
        const contents = document.querySelectorAll(selectorContents);
        if (tabs.length > 0) {

            tabs[0].classList.add('_active');
            contents[0].classList.add('_active');

            tabs.forEach((tab, i) => {
                tab.addEventListener('click', () => {
                    tabSolutionHide(tabs, contents);
                    tab.classList.add('_active');
                    contents[i].classList.add('_active');
                });
            });
        }
    }
    tabSolutionClick('.solutions__tab', '.solutions__content');
    tabSolutionClick('.blog-offer__tab', '.blog-content__content');

    //=========================================================================

    //Faq click

    function faqItemClick() {
        const items = document.querySelectorAll('.faq__header');
        const itemParents = document.querySelectorAll('.faq__item');
        const itemBodys = document.querySelectorAll('.faq__body');

        if (itemParents.length > 0) {
            itemParents.forEach((item, i) => {
                let bodyHeight = itemBodys[i].clientHeight;
                itemBodys[i].style.height = '0px';

                item.addEventListener('click', () => {
                    item.classList.toggle('_active');

                    if (item.classList.contains('_active')) {
                        itemBodys[i].style.height = `${bodyHeight}px`;
                    } else {
                        itemBodys[i].style.height = '0px';
                    }
                });
            });
        }
    }
    faqItemClick();

    //===================================================================


    //Footer Language

    function footerLangugeClick() {
        const languageHeader = document.querySelector('.bottom-footer__language-header');
        // const language = document.querySelector('.bottom-footer__language');
        const languageBody = document.querySelector('.bottom-footer__language-body');
        const body = document.body;

        if (languageHeader) {
            const div = document.createElement('div');
            body.append(div);

            languageHeader.addEventListener('click', () => {
                languageBody.classList.toggle('_active');

                if (languageBody.classList.contains('_active')) {
                    div.classList.add('div-body');
                } else {
                    div.classList.remove('div-body');
                }
            });

            div.addEventListener('click', () => {
                if (languageBody.classList.contains('_active')) {
                    div.classList.remove('div-body');
                    languageBody.classList.remove('_active');
                }
            });
        }
    }
    footerLangugeClick();

    //====================================================================

    // Number Index

    function numberIndex(selectorItem, stop = false) {
        const numberItem = document.querySelectorAll(selectorItem);

        if (numberItem.length > 0) {
            if (stop === false) {
                for (let index = 0; index < numberItem.length; index++) {
                    const element = numberItem[index];
                    const dataNum = Number(element.dataset.number);
                    const dataNumProcent = Math.round(dataNum * 0.1);
                    let i = dataNumProcent;

                    let timer = setInterval(() => {
                        if (i <= dataNum) {
                            element.textContent = i++;
                        }
                        if (i === (dataNum + 1)) {
                            clearInterval(timer);
                        }
                    }, 80);
                }
            }
        }
    }
    function animatedNumbersIndex() {
        const realize = document.querySelector('.benefits');

        if (realize) {
            const elementPositionRealize = realize.offsetTop;
            const windowHeight = document.documentElement.clientHeight;
            let number = windowHeight / 100 * 20;

            window.addEventListener('scroll', () => {

                if (window.pageYOffset + number >= elementPositionRealize) {
                    if (!realize.classList.contains('_stop')) {
                        numberIndex('.benefits__number span');
                    }
                    realize.classList.add('_stop');
                } else {
                    realize.classList.remove('_stop');
                }
            });
        }
    }
    animatedNumbersIndex();

    //===============================================================================================================




    // new WOW().init();








});