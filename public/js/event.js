import { arrowAnimation, setCounters, setNavOpacity } from "./animateFunction.js";

// Animasi halaman tentang
if (/tentang/g.test(window.location.href)) setNavOpacity('hero-profil');

// Animasi halaman profil
else if (/profil/g.test(window.location.href)) {
    setNavOpacity('hero-profil');
}

// Animasi halaman statistik
else if (/statistik/g.test(window.location.href)) setNavOpacity('hero-profil');

// Animasi halaman administrasi
else if (/administrasi/g.test(window.location.href)) setNavOpacity('hero-profil');

// Animasi halaman blog
else if (/post/g.test(window.location.href)) 
    document.getElementById('navbar').style.backgroundColor = "rgb(76, 134, 116)";


// Animasi halaman home
else {
    setNavOpacity('hero');
    arrowAnimation();

    const counters = document.querySelectorAll('.counter')
    
    window.addEventListener('scroll', () => {

        counters.forEach((counter) => {
            const screenPosition = Math.ceil(window.scrollY + screen.height);
            const counterPosition = Math.ceil(window.scrollY + counter.getBoundingClientRect().top + counter.offsetHeight);
            const counterNum = counter.innerHTML;

            if(screenPosition > counterPosition && counterNum == 0){
                setCounters(true, counter.id);
            }
            else if (screenPosition < counterPosition && counterNum > 0){
                setCounters(false, counter.id)
            }

        })
    })
}