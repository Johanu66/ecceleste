var images = [
				"Image (0).jpg","Image (1).jpg","Image (2).jpg",
				"Image (3).jpg","Image (4).jpg","Image (5).jpg",
				"Image (6).jpg","Image (7).jpg","Image (8).jpg",
				"Image (9).jpg","Image (10).jpg","Image (11).jpg",
				"Image (12).jpg","Image (13).jpg","Image (14).jpg",
				"Image (15).jpg","Image (16).jpg","Image (17).jpg",
				"Image (18).jpg","Image (19).jpg","Image (20).jpg",
				"Image (21).jpg","Image (22).jpg","Image (23).jpg",
				"Image (24).jpg","Image (25).jpg","Image (26).jpg",
				"Image (27).jpg"
			];
var i = 0;
var timer = 4000;

function diaporama() {
	document.diapo.src = images[i];
	if(i<images.length-1)
		i++;
	else
		i = 0;
	setTimeout(function(){
		document.diapo.id = "disparaitre";
	},timer-1000);
	setTimeout(function(){
		document.diapo.id = "apparaitre";
	},timer+100);
}
setInterval("diaporama()",timer);