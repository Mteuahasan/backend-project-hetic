var hoverProfil = document.getElementById('feature-profile-menu');
var feature = document.getElementById('test');

hoverProfil.addEventListener('mouseover', mouseOver, false);
feature.addEventListener('mouseover', mouseOver, false);

hoverProfil.addEventListener('mouseout', mouseOut, false);
feature.addEventListener('mouseout', mouseOut, false);



function mouseOver() {
	hoverProfil.classList.add("move");
}

function mouseOut() {
	hoverProfil.classList.remove("move");
}

