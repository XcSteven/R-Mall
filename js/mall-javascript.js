function StoreownerCheck() {
	if (document.getElementById('storeown').checked) {
		document.getElementById('ifStoreown').style.display = 'block';
	}
	else document.getElementById('ifStoreown').style.display = 'none';
}

var win1 = document.getElementById("mod-window1");
var trig1 = document.getElementById("mod-trigger1");
trig1.onclick = function() {
  win1.style.display = "block";
}
win1.onclick = function(event) {
  if (event.target != win1) {
	win1.style.display = "none";
  }
}
var win2 = document.getElementById("mod-window2");
var trig2 = document.getElementById("mod-trigger2");
trig2.onclick = function() {
  win2.style.display = "block";
}
win2.onclick = function(event) {
  if (event.target != win2) {
	win2.style.display = "none";
  }
}
var win3 = document.getElementById("mod-window3");
var trig3 = document.getElementById("mod-trigger3");
trig3.onclick = function() {
  win3.style.display = "block";
}
win3.onclick = function(event) {
  if (event.target != win3) {
	win3.style.display = "none";
  }
}



