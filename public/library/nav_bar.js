function listExpand(list)
{
	list.style.backgroundColor = "#EEEEEE";
}

function listContract(list)
{
	list.style.backgroundColor = "#FFFFFF";
}

var els = document.getElementsByTagName("li");

for (var i = 0; i < els.length; i++) {
	els[i].onmouseover = function() {
	listExpand(this)};
	els[i].onmouseout = function() {
	listContract(this)};
}
