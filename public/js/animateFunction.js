
export function setNavOpacity(id){
    const navbar = document.getElementById('navbar');
    const navHeight = navbar.offsetHeight;
    const heroHeight = document.getElementById(id).offsetHeight;

    window.addEventListener('scroll', function(){
        const bg1 = "rgba(76, 134, 116, 0.5)"
        const bg2 = "rgb(76, 134, 116)"

        if(Math.ceil(heroHeight) <= Math.ceil(this.window.scrollY + navHeight) && (bg1 == navbar.style.backgroundColor || navbar.style.backgroundColor == 0)){
            navbar.style.backgroundColor = bg2
        }
        else if (Math.ceil(heroHeight) > Math.ceil(this.window.scrollY + navHeight) && bg2 == navbar.style.backgroundColor) {
            navbar.style.backgroundColor = bg1
        }
    })
}


export function setCounters(reset = true, id){
    const counterEl = document.getElementById(id);
    if(!reset) {
        counterEl.innerHTML = '0';
        return;
    } 

    const updateCounter = (currentCount = 0) => {
        const targetCount = +(counterEl.getAttribute('data-target'));
        const increment = targetCount / 200;

        if(+(counterEl.innerHTML) != targetCount){
            counterEl.innerHTML = targetCount;
        }

        if(currentCount < targetCount){
            currentCount = currentCount + increment;
            counterEl.innerHTML = `${Math.floor(currentCount)}`;
            setTimeout(() => { updateCounter(currentCount); }, 1);
        }
    }
    updateCounter();
}

// Animasi Arrow
export function arrowAnimation() {
    const arrowEl = document.getElementById("arrow-icon");
    const arrowNav = document.getElementById("arrow-nav");

    const arrowUpClass = 'fa-arrow-up'
    const arrowDownClass = 'fa-arrow-down'
    
    window.addEventListener('scroll', () => {
        const windowScroll = window.scrollY

        if(windowScroll > 0){
            arrowEl.classList.remove(arrowDownClass)
            arrowEl.classList.add(arrowUpClass)
            arrowNav.href = "#"
        }
        else{
            arrowEl.classList.remove(arrowUpClass)
            arrowEl.classList.add(arrowDownClass)  
            arrowNav.href = "#inform"
        }
    })
}
