var show = function(elem) {
	elem.style.display = 'block';
};

var hide = function(elem) {
	elem.style.display = 'none';
};

document.addEventListener("DOMContentLoaded", function(event) {
	ca = localStorage.getItem("cookie_accept");
	if (!ca) {
		show(document.getElementById('cookie'));
	} else {
		hide(document.getElementById('cookie'));
	}
	document.getElementById('cookie_accept').addEventListener('click', function() {
		localStorage.setItem("cookie_accept", true);
		hide(document.getElementById('cookie'));
	})
});