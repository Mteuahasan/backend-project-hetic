var portfolio = document.querySelector('.portfolio');
var liked = document.querySelector('.liked');

var addedBoards = document.getElementsByClassName('addedBoards');
var likedBoards = document.getElementsByClassName('likedBoards');



portfolio.addEventListener('click', clickPortfolio, false);
liked.addEventListener('click', clickLiked, false);

function clickPortfolio() {
	portfolio.classList.add('color');
	liked.classList.remove('color');

	for (var i = 0; i < addedBoards.length; i++) {
		addedBoards[i].classList.add('displayAdded');
	};

	for (var i = 0; i < likedBoards.length; i++) {
		likedBoards[i].classList.remove('displayLiked');
	};

}

function clickLiked() {
	liked.classList.add('color');
	portfolio.classList.remove('color');

	for (var i = 0; i < likedBoards.length; i++) {
		likedBoards[i].classList.add('displayLiked');
	};

	for (var i = 0; i < addedBoards.length; i++) {
		addedBoards[i].classList.remove('displayAdded');
	};

}


