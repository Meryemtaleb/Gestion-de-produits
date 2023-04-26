// Message flash, 3s
setTimeout(() => document.querySelector(".message").style.display = "none", 5000);

// Animation scrollreaveal()
// placer la classe dans les attributs de la balise pour l'animer
ScrollReveal().reveal('.animtop',{distance: '25px',origin:'top',interval: 150, reset: true })
ScrollReveal().reveal('.animbottom',{distance: '25px',origin:'bottom',interval: 150, })
ScrollReveal().reveal('.animleft',{distance: '250px',origin:'left',interval: 150,})
ScrollReveal().reveal('.animright',{distance: '250px',origin:'right',interval: 150,})
ScrollReveal().reveal('.anim',{duration: 1500, })
