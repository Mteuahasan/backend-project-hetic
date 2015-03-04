var hoverProfil = document.getElementById('feature-profile-menu');
console.log(hoverProfil);
var feature = document.getElementById('test');

var buttonSearch = document.getElementById('search');
var filterSearch = document.getElementById('searchFilter');
var pageSearch = document.getElementById('pageSearch');
var closeSearch = document.getElementById('closeSearch');

var buttonCategory = document.getElementById('category');
var filterCategory = document.getElementById('categoryFilter');
var pageCategory = document.getElementById('pageCategory');
var closeCategory = document.getElementById('closeCategory');

var mainContent = document.getElementById('mainContent')


hoverProfil.addEventListener('mouseover', mouseOver, false);
hoverProfil.addEventListener('mouseout', mouseOut, false);

feature.addEventListener('mouseover', mouseOver, false);
feature.addEventListener('mouseout', mouseOut, false);

buttonSearch.addEventListener('click', clickSearch, false);
closeSearch.addEventListener('click', searchClose, false);

buttonCategory.addEventListener('click', clickCategory, false);
closeCategory.addEventListener('click', categoryClose, false);


function mouseOver() {
	hoverProfil.classList.add("move");
}

function mouseOut() {
	hoverProfil.classList.remove("move");
}

function clickSearch(e) {
	e.preventDefault();
	e.stopPropagation();
	filterSearch.style.display="block";	
	pageSearch.style.display="block";
}

function searchClose() {
	filterSearch.style.display="none";	
	pageSearch.style.display="none";
}

function clickCategory(e) {
	e.preventDefault();
	e.stopPropagation();
	filterCategory.style.display="block";	
	pageCategory.style.display="block";
}

function categoryClose() {
	filterCategory.style.display="none";	
	pageCategory.style.display="none";
}







