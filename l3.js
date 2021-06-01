function myFunction(x) {
	const nav = document.querySelector("nav");
	const img = document.createElement("img");
	img.src = "images/hamburger.png";
	if (x.matches) {
		// wzięcie napisu aktualnej strony
		const element = document.querySelector(".nav_item");
		// napis aktualnej strony zostaje, reszta znika
		nav.children[0].style.display = "none";
		nav.children[1].style.display = "none";
		nav.children[2].style.display = "none";
		element.style.display = "inline";
		// dodanie hamburgera
		nav.insertBefore(img, nav.children[0]);
		nav.children[0].style.width = "10%";
		nav.children[0].style.display = "inline";
		nav.children[0].style.cursor = "pointer";
		// rozwijanie menu
		nav.children[0].addEventListener("click", (event) => {
			if (element.style.display === "inline") {
				nav.children[1].style.display = "block";
				nav.children[2].style.display = "block";
				nav.children[3].style.display = "block";
			} else {
				nav.children[1].style.display = "none";
				nav.children[2].style.display = "none";
				nav.children[3].style.display = "none";
				element.style.display = "inline";
			}
		});
	} else {
		// jeśli jest hamburger menu ma 4 elementy
		if (nav.children[3])
		nav.children[0].remove();
		nav.children[0].style.display = "inline";
		nav.children[1].style.display = "inline";
		nav.children[2].style.display = "inline";
	}
}

window.onload = function() {
	var x = window.matchMedia("(max-width: 500px)");
	myFunction(x); // Call listener function at run time
	x.addListener(myFunction); // Attach listener function on state changes
	var e1 = document.getElementById("e1");
	var e2 = document.getElementById("e2");
	var e3 = document.getElementById("e3");	
	if (window.location.href === "http://localhost/interests.php") {
		e3.classList.add("nav_item");
		if (e1.classList.contains("nav_item")) {
			e1.classList.remove("nav_item");
		}
		if (e2.classList.contains("nav_item")) {
			e2.classList.remove("nav_item");
		}			
	} else if (window.location.href === "http://localhost/index.php") {
		e1.classList.add("nav_item");
		if (e2.classList.contains("nav_item")) {
			e2.classList.remove("nav_item");
		}
		if (e3.classList.contains("nav_item")) {
			e3.classList.remove("nav_item");
		}		
	} else {
		e2.classList.add("nav_item");
		if (e1.classList.contains("nav_item")) {
			e1.classList.remove("nav_item");
		}
		if (e3.classList.contains("nav_item")) {
			e3.classList.remove("nav_item");
		}		
	}
	var logout = document.getElementById("logout");
	if (logout) {
		setTimeout(function() {
			logout.click();
		}, 300000);		
	}
};
