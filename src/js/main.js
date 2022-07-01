console.log('%cinitializing autodestruction...', 'color: #ff0000')

// Preloader and copy ip

const copyIp = document.querySelector('.copy-ip')

window.addEventListener('load', () => {
	document.body.classList.add('body-fixed')
	setTimeout(() => {
		document.querySelector('.preloader').classList.add('preloader-open')
		copyIp.style.animation = 'bounce'
		copyIp.style.animationDuration = '2s'
		copyIp.style.animationDelay = '0.6s'

		AOS.init({
			once: true,
		})
	}, 800)
	setTimeout(() => {
		document.body.classList.remove('body-fixed')
	}, 1800)
})

const copyServerIp = () => {
	navigator.clipboard.writeText('pogserv.csrv.pl')

	document.querySelector('.tooltip-text').textContent = 'Skopiowano IP'
	document.querySelector('.fa-copy').style.display = 'none'
	document.querySelector('.checkmark').style.display = 'block'
	copyIp.style.boxShadow = 'unset'
	copyIp.style.backgroundColor = 'transparent'
	setTimeout(() => {
		document.querySelector('.tooltip-text').textContent = 'Skopiuj IP serwera'
		document.querySelector('.fa-copy').style.display = 'block'
		document.querySelector('.checkmark').style.display = 'none'
		copyIp.style.boxShadow = '0 1px 8px rgba(0, 0, 0, 0.5)'
		copyIp.style.backgroundColor = '#0b1b22'
	}, 2500)
}

copyIp.addEventListener('click', copyServerIp)

// Mobile menu

const hamburger = document.querySelector('.hamburger')
const mobileMenu = document.querySelector('.mobile-menu')
const navLinks = document.querySelector('.nav-links')
const navLink = document.querySelectorAll('.nav-links-box a')
let menuOpen = false

mobileMenu.addEventListener('click', () => {
	navLinks.classList.toggle('open')
	if (!menuOpen) {
		hamburger.classList.add('openX')
		document.body.classList.add('body-fixed')
		menuOpen = true
	} else {
		hamburger.classList.remove('openX')
		document.body.classList.remove('body-fixed')
		menuOpen = false
	}
})

navLink.forEach(link => {
	link.addEventListener('click', () => {
		navLinks.classList.toggle('open')
		hamburger.classList.remove('openX')
		document.body.classList.remove('body-fixed')
		menuOpen = false
	})
})

// Contact labels

const contactInput = document.querySelectorAll('.form-control')
const contactLabel = document.querySelectorAll('.contact-label')
const contactForm = document.querySelectorAll('.contact-form .form-control')

const handleLabels = () => {
	for (let i = 0; i < 3; i++) {
		if (contactInput[i].value != '') {
			contactLabel[i].classList.add('label-active')
		} else {
			contactLabel[i].classList.remove('label-active')
		}
	}
}

contactInput.forEach(input => {
	input.addEventListener('keyup', handleLabels)
})
// Discord
;(async function () {
	await DiscordWidget.init(document.querySelector('.contact-discord'), '877883704792477696')
})()

// Footer and copy IP

const ipBtn = document.querySelector('.copy-ip-text')

const footerYear = document.querySelector('#current-year')

const ipText = () => {
	navigator.clipboard.writeText('pogserv.csrv.pl')
	ipBtn.style.color = '#fff'
	setTimeout(() => {
		ipBtn.style.color = 'unset'
	}, 800)
}
footerYear.textContent = new Date().getFullYear()

ipBtn.addEventListener('click', ipText)

// Scroll Spy

const sections = document.querySelectorAll('.section')
const navLi = document.querySelectorAll('.sidenav-content ul li')

window.onscroll = () => {
	let current = ''

	sections.forEach(section => {
		let sectionTop = section.offsetTop
		if (scrollY >= sectionTop - 450) {
			current = section.getAttribute('id')
		}
	})

	navLi.forEach(li => {
		li.classList.remove('active')
		if (li.getAttribute('id').includes(current)) {
			li.classList.add('active')
		}
	})
}

// News cards animation

const dataAttr = () => {
	const faqEven = document.querySelectorAll('.accordion > :nth-child(even)')
	const faqOdd = document.querySelectorAll('.accordion > :nth-child(odd)')

	faqEven.forEach(card => {
		card.setAttribute('data-aos', 'fade-left')
	})
	faqOdd.forEach(card => {
		card.setAttribute('data-aos', 'fade-right')
	})
}

dataAttr()

// Map

const map = document.querySelector('.live-map')

const mapFixed = () => {
	document.body.style.position = 'fixed'
}

const mapUnfixed = () => {
	document.body.style.position = 'relative'
}

map.addEventListener('mouseover', mapFixed)
map.addEventListener('mouseout', mapUnfixed)

// Form validation

// const adressInput = document.querySelector('#form-adress-input')
// const regEx =
// 	/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
// const titleInput = document.querySelector('#form-title-input')
// const messageInput = document.querySelector('#form-message-input')
// const sumbitFormBtn = document.querySelector('#form-submit-btn')
// const formWarnP = document.querySelector('.form-warn')
// const formWarnSpan = document.querySelector('.form-warn-span')

// const formValidation = () => {
// 	if (adressInput.value.match(regEx)) {
// 		if (titleInput.value.length > 2) {
// 			if (messageInput.value.length > 10) {
// 				sumbitFormBtn.type = 'submit'
// 			} else {
// 				formWarnP.style.visibility = 'visible'
// 				formWarnSpan.textContent = 'Wiadomość jest za krótka!'
// 			}
// 		} else {
// 			formWarnP.style.visibility = 'visible'
// 			formWarnSpan.textContent = 'Tytuł jest za krótki!'
// 		}
// 	} else {
// 		formWarnP.style.visibility = 'visible'
// 		formWarnSpan.textContent = 'Podałeś zły email!'
// 	}
// }

// sumbitFormBtn.addEventListener('click', formValidation)

// Header logo handler

const headerLogo = document.querySelector('.header__hero .logo')

const handleHeaderLogo = () => {
	let logoOffset = headerLogo.offsetTop
	window.addEventListener('scroll', () => {
		if (window.scrollY >= logoOffset) {
			headerLogo.classList.add('fixed')
		} else {
			headerLogo.classList.remove('fixed')
		}
	})
}

window.addEventListener('resize', () => {
	handleHeaderLogo()
})

window.onload = () => {
	handleHeaderLogo()
}
