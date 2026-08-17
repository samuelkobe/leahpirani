const body_element = document.body;
const header_element = document.getElementById("header");
const menu_button = document.getElementById("menu-button"); // div#menu-button in header.php
const menu = document.getElementById("menu"); // nav element in header.php
var submenu_parent = document.querySelector(".sub-menu").parentElement.firstChild; // ul.sub-menu's parent element (in this case its a li from the nav ul)
var submenu = document.querySelector(".sub-menu"); // ul.sub-menu generatd by WP inside menu, settings can be altered in functions.php

const SCROLLUP = "scroll-up";
const SCROLLDOWN = "scroll-down";
let last_scroll = 0;

const IMG_LOCATION = document.getElementById("menu-image-location");
let ARRAY = submenu.querySelectorAll(":scope li > .menu-anchor");
const IMG_LOCATION_BOTTOM = document.querySelector("#menu-image-location > img.bottom");
const IMG_LOCATION_TOP = document.querySelector("#menu-image-location > img.top");

// Menu tap/click detection
menu_button.addEventListener('click', (event) => {
	// Don't follow the link
	event.preventDefault();

  // Toggle 'opened' class on the .submenu
  if (menu_button.classList.contains('open')) {
    menu_button.classList.remove('open');
    menu.classList.remove('open');
    menu.classList.add('invisible');
		submenu.classList.remove('open');
		menu.classList.remove('child-open');
		submenu_parent.classList.remove('parent-open');
		body_element.classList.remove('menu-open');
		IMG_LOCATION.classList.add('hidden');
  } else {
    menu_button.classList.add('open');
    menu.classList.remove('invisible');
    menu.classList.add('open');
		body_element.classList.add('menu-open');
		IMG_LOCATION.classList.remove('hidden');
  }

}, false);

// Submenu tap/click detection
submenu_parent.addEventListener('click', (event) => {
	// Don't follow the link
	event.preventDefault();

  // Toggle 'opened' class on the .submenu
  if (submenu.classList.contains('open')) {
    submenu.classList.remove('open');
		menu.classList.remove('child-open');
		submenu_parent.classList.remove('parent-open');
  } else {
    submenu.classList.add('open');
		menu.classList.add('child-open');
		submenu_parent.classList.add('parent-open');
  }
}, false);


// window scroll to hide and reveal menu
window.addEventListener("scroll", () => {
  const current_scroll = window.pageYOffset;
  if (current_scroll <= 0) {
    header_element.classList.remove(SCROLLUP);
    return;
  }

  if (current_scroll > last_scroll && !body_element.classList.contains(SCROLLDOWN)) {
    // down
    header_element.classList.remove(SCROLLUP);
    header_element.classList.add(SCROLLDOWN);
  } else if (current_scroll < last_scroll && header_element.classList.contains(SCROLLDOWN)) {
    // up
    header_element.classList.remove(SCROLLDOWN);
    header_element.classList.add(SCROLLUP);
  }
  last_scroll = current_scroll;
});

// Array of menu images.
ARRAY.forEach((item) => {
	item.addEventListener("mouseleave", () => {
		document.querySelector("#menu-image-location > img.bottom").classList.add("blackout");
	});
	item.addEventListener("mouseenter", () => {

		document.querySelector("#menu-image-location > img.bottom").classList.remove("blackout");
		/////////////////////////////////////////////////////////////////////////////////// 				// top | bottom
		document.querySelector("#menu-image-location > img.bottom").classList.add("transition"); 		// top | bottom.transition
		document.querySelector("#menu-image-location > img.transition").classList.remove("bottom");	// top | transition
		document.querySelector("#menu-image-location > img.top").classList.add("bottom");						// top.bottom | transition
		document.querySelector("#menu-image-location > img.bottom").classList.remove("top");				// bottom | transition
		document.querySelector("#menu-image-location > img.transition").classList.add("top");				// bottom | top.transition
		document.querySelector("#menu-image-location > img.top").classList.remove("transition");		// bottom | top

		if (document.querySelector("#menu-image-location > img:first-of-type").classList.contains("bottom")) {
			IMG_LOCATION_BOTTOM.src = item.dataset.imageUrl;
			IMG_LOCATION_BOTTOM.alt = item.dataset.altText;
			IMG_LOCATION_BOTTOM.title = item.dataset.title;
			console.log("Hello Bottom");
		} else {
			IMG_LOCATION_TOP.src = item.dataset.imageUrl;
			IMG_LOCATION_TOP.alt = item.dataset.altText;
			IMG_LOCATION_TOP.title = item.dataset.title;
			console.log("Hello Top");
		}
	});
});

const CONTACT_BUTTON = menu.querySelector("[data-title*='Contact']");
const CONTACT_AREA = document.getElementById("contact");

// Contact button click/tap detection
CONTACT_BUTTON.addEventListener('click', (event) => {
	// Don't follow the link
	event.preventDefault();
	// Close menu after click/tap
	if (menu_button.classList.contains('open')) {
		menu_button.classList.remove('open');
		menu.classList.remove('open');
		menu.classList.add('invisible');
		submenu.classList.remove('open');
		submenu_parent.classList.remove('parent-open');
		body_element.classList.remove('menu-open');
		IMG_LOCATION.classList.add('hidden');
		CONTACT_AREA.scrollIntoView({ behavior: 'smooth', block: 'center'});
	}
});


const LATEST_WORKS_AREA = document.getElementById("latest-works");
const LASTEST_WORKS = document.querySelectorAll('.cta-arrow');

for (var i = 0; i < LASTEST_WORKS.length; i++) {
	LASTEST_WORKS[i].addEventListener('click', () => {
		// Don't follow the link
		event.preventDefault();
		LATEST_WORKS_AREA.scrollIntoView({ behavior: 'smooth', block: 'start'});
	});
}
