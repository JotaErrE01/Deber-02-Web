(() => {
    const e = document.querySelector("#bar"),
        t = document.querySelector("#nav");
    e.addEventListener("click", (() => { t.classList.toggle("invisible"), t.classList.toggle("flex"), t.classList.toggle("h-0"), t.classList.toggle("opacity-0") }))
})();