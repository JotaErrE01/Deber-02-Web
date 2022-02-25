var quadimages = document.querySelectorAll("#galeriaImagenes figure");
for (i = 0; i < quadimages.length; i++) {
    quadimages[i].addEventListener('click', function() {
        this.classList.toggle("expanded");
        quad.classList.toggle("full")
    });
}