window.onload = function () {
    let loader = document.querySelector('.loader');
    loader.style.display = 'none';
}


let navMenu = document.querySelector('.nav-menu i'),
    navClose = document.querySelector('.navClose'),
    resHeader = document.querySelector('.res-header'),
    pauseBtn = document.querySelector('.pauseBtn'),
    playBtn = document.querySelector('.playBtn'),
    interiorBtn = document.querySelector('.interiorBtn'),
    exteriorBtn = document.querySelector('.exteriorBtn'),
    reviewImage = document.querySelector('.review-image img'),
    modelBtns = document.querySelectorAll('.model-btn button'),
    sedanBtn = document.querySelector('.sedanBtn'),
    suvBtn = document.querySelector('.suvBtn'),
    evBtn = document.querySelector('.evBtn'),
    sedan = document.querySelector('.sedan'),
    suv = document.querySelector('.suv'),
    ev = document.querySelector('.ev'),
    testDriveBtn = document.querySelectorAll('.testDriveBtn'),
    dModal = document.querySelector('.d-modal'),
    driveModalClose = document.querySelector('.driveModalClose'),
    img = document.querySelector('.review-image img'),
    navFormSelect234 = document.querySelector('.nav-form-select234'),
    reviewBtns234 = document.querySelector('.review-btns234'),
    navFormSelect134 = document.querySelector('.nav-form-select134'),
    reviewBtns134 = document.querySelector('.review-btns134'),
    filialBtns = document.querySelectorAll('.filial h3'),
    map = document.querySelector('.map'),
    imageBtns = document.querySelectorAll('.imageBtn'),
    imageBtnActive = document.querySelectorAll('.imageBtnActive'),
    empty = document.querySelector('.empty');


function changeImage(url, clas) {
    if (clas) {
        let selectBtn = document.querySelector(`.${clas}`)
        imageBtns.forEach(item => {
            item.classList.remove('active');
        });
        selectBtn.classList.add('active')
        img.src = url
    }else{
        img.src = url
        imageBtns.forEach(item => {
            item.classList.remove('active');
        });
    }
}

let vdActive;
setInterval(() => {
    vdActive = document.querySelector('.vd-wrapper .swiper-slide-active video');
}, 500)
navMenu.addEventListener('click', () => {
    resHeader.classList.add('active');
})
navClose.addEventListener('click', () => {
    resHeader.classList.remove('active');
})
testDriveBtn.forEach(item => {
    item.addEventListener('click', () => {
        dModal.style.display = 'flex'
    })
})
driveModalClose.addEventListener('click', () => {
    dModal.style.display = 'none'
})
pauseBtn.addEventListener('click', () => {
    pauseBtn.style.display = 'none';
    playBtn.style.display = 'block';
    console.log(vdActive);
    vdActive.pause();
})
playBtn.addEventListener('click', () => {
    playBtn.style.display = 'none';
    pauseBtn.style.display = 'block';
    vdActive.play();
})
interiorBtn.addEventListener('click', () => {
    interiorBtn.classList.add('active')
    exteriorBtn.classList.remove('active')
    reviewBtns134.classList.add('d-none');
    reviewBtns234.classList.remove('d-none');
    navFormSelect134.classList.add('d-none');
    navFormSelect234.classList.remove('d-none');
    imageBtnActive[1].classList.add('active');
})
exteriorBtn.addEventListener('click', () => {
    interiorBtn.classList.remove('active')
    exteriorBtn.classList.add('active')
    reviewBtns134.classList.remove('d-none');
    reviewBtns234.classList.add('d-none');
    navFormSelect134.classList.remove('d-none');
    navFormSelect234.classList.add('d-none');
    imageBtnActive[0].classList.add('active');
})
function change() {
    if (navFormSelect134.value == '1') {
        img.src = './assets/images/shina.jpg'
    }else if(navFormSelect134.value == '2'){
        img.src = './assets/images/left.jpg'
    }else if(navFormSelect134.value == '3'){
        img.src = './assets/images/prim.jpg'
    }else if(navFormSelect134.value == '4'){
        img.src = './assets/images/outside.jpg'
    }else if(navFormSelect134.value == '5'){
        img.src = './assets/images/right.jpg'
    }
}
function change2() {
    if (navFormSelect234.value == '1') {
        img.src = './assets/images/inside1.jpg'
    }else if(navFormSelect234.value == '2'){
        img.src = './assets/images/inside2.jpg'
    }else if(navFormSelect234.value == '3'){
        img.src = './assets/images/inside1.jpg'
    }else if(navFormSelect234.value == '4'){
        img.src = './assets/images/inside2.jpg'
    }else if(navFormSelect234.value == '5'){
        img.src = './assets/images/inside1.jpg'
    }
}
sedanBtn.addEventListener('click', () => {
    modelBtns.forEach(item => {
        item.classList.remove('active')
    })
    sedanBtn.classList.add('active')
    sedan.style.display = 'flex';
    suv.classList.remove('active');
    ev.classList.remove('active');
})
suvBtn.addEventListener('click', () => {
    modelBtns.forEach(item => {
        item.classList.remove('active')
    })
    suvBtn.classList.add('active')
    suv.classList.add('active');
    sedan.style.display = 'none';
    ev.classList.remove('active');
})
evBtn.addEventListener('click', () => {
    modelBtns.forEach(item => {
        item.classList.remove('active')
    })
    evBtn.classList.add('active')
    ev.classList.add('active');
    sedan.style.display = 'none';
    suv.classList.remove('active');
});

function changeMap(url) {
    map.innerHTML = url
}

window.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        empty.innerHTML = "<img style='display:none' src='./assets/images/shina.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/left.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/prim.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/outside.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/right.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/inside1.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/inside2.jpg'>"
        empty.innerHTML = "<img style='display:none' src='./assets/images/inside3.jpg'>"
    }, 2000)
})