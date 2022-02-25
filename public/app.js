const nextBtn = document.querySelector(".next-btn");
const prevtBtn = document.querySelector(".prev-btn");
const slides = document.querySelectorAll(".slide");
const slideIcons = document.querySelectorAll(".slide-icon")
const numberOfSlides = slides.length;
var slideNumber = 0;

const slider = document.querySelector(".slider");

//image-slider boton next
nextBtn.addEventListener("click", () => {
    slides.forEach((slide) => {
        slide.classList.remove("active");
    });
    slideIcons.forEach((slideIcon) => {
        slideIcon.classList.remove("active");
    });

    slideNumber++;
    if(slideNumber> (numberOfSlides - 1)){
        slideNumber = 0;
    }

    slides[slideNumber].classList.add("active");
    slideIcons[slideNumber].classList.add("active");

})

//boton atras

prevtBtn.addEventListener("click",() => {
    slides.forEach((slide) => {
        slide.classList.remove("active");
    });
    slideIcons.forEach((slideIcon) => {
        slideIcon.classList.remove("active");
    });

    slideNumber--;
    if(slideNumber<0){
        slideNumber = numberOfSlides -1;
    }

    slides[slideNumber].classList.add("active");
    slideIcons[slideNumber].classList.add("active");
})

//slider automatico

var playSlider;
var repeater = () =>{
    playSlider = setInterval(function(){
        slides.forEach((slide) => {
            slide.classList.remove("active");
        });
        slideIcons.forEach((slideIcon) => {
            slideIcon.classList.remove("active");
        });
    
        slideNumber++;
        if(slideNumber> (numberOfSlides - 1)){
            slideNumber = 0;
        }
    
        slides[slideNumber].classList.add("active");
        slideIcons[slideNumber].classList.add("active");
    }, 4000);
    
}
repeater();

//parar la imagen  al poner el cursor con evento mouseover
slider.addEventListener("mouseover",() =>{
    clearInterval(playSlider);
})

//reanudar al quitar cursor con evento mouseout
slider.addEventListener("mouseout", () =>{
    repeater();
})
