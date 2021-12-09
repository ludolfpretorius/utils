// Nav Scroll
const win = window;
const nav = document.querySelector('#nav')
let navbarHeight = nav.offsetHeight
const viewportWidth = win.outerWidth
win.addEventListener('scroll', () => {
	var scroll = win.pageYOffset
	if (viewportWidth > 992) {
		if (scroll > 400){
			nav.classList.add('scroll-nav')
			nav.classList.add('active')
		} else {
			nav.classList.remove('scroll-nav')
			setTimeout(() => {
				nav.classList.remove('active')
			}, 100)
		}
	}
})