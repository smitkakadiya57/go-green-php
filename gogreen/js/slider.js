

let flag = 0;

let controller = (x) => {
    flag = flag + x;
    slideshow(flag);
}

let show = (x) => {
    flag = x;
    slideshow(flag);
}

let slides = document.getElementsByClassName("slide");
let indi = document.getElementById("indicator");


for (let i = 0; i < slides.length; i++) {
    let data = document.createElement("span");
    data.setAttribute('onclick', `show(${i})`);
    data.innerHTML = "&#9786;";
    indi.appendChild(data);
}


let indicators = document.querySelectorAll("#indicator span");



let slideshow = (num) => {
    for (let i = 0; i < indicators.length; i++) {
        indicators[i].innerHTML = "&#9786;";
    }
    if (num == slides.length) {
        flag = 0;
        num = 0;
    }
    if (num < 0) {
        flag = slides.length - 1;
        num = slides.length - 1;
    }
    for (let y of slides) {
        y.style.display = "none";
    }

    slides[num].style.display = "block";
    indicators[num].innerHTML = "&#9787;";


}

slideshow(flag);

let sor = setInterval(() => {
    flag = flag + 1;
    slideshow(flag);
}, 7000);