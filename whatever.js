$(document).ready(function() {
	var inTheJar = 0;
	$('span').text("$" + inTheJar);
	$('button').click(function() {
		inTheJar += 0.25;
		$('span').text("$" + inTheJar);
	})
	$('#reset').click(function() {
		inTheJar = 0;
	})
});