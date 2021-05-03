win1 = document.getElementById("mod-window1");
trig1 = document.getElementById("mod-trigger1");
trig1.onclick = function() {
  win1.style.display = "block";
}
win1.onclick = function(event) {
  if (event.target != win1) {
	win1.style.display = "none";
  }
}
win2 = document.getElementById("mod-window2");
trig2 = document.getElementById("mod-trigger2");
trig2.onclick = function() {
  win2.style.display = "block";
}
win2.onclick = function(event) {
  if (event.target != win2) {
	win2.style.display = "none";
  }
}
win3 = document.getElementById("mod-window3");
trig3 = document.getElementById("mod-trigger3");
trig3.onclick = function() {
  win3.style.display = "block";
}
win3.onclick = function(event) {
  if (event.target != win3) {
	win3.style.display = "none";
  }
}