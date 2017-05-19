/*javascript file*/

/* On Scroll, Nav stick to the top */
$(document).ready(function () {

    var menu = $("#on-scroll-fixed-top");
    var origOffsetY = menu.offset().top;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            $("#on-scroll-fixed-top").addClass("navbar-fixed-top");
            $(".main").addClass("menu-padding");
        } else {
            $("#on-scroll-fixed-top").removeClass("navbar-fixed-top");
            $(".main").removeClass("menu-padding");
        }
    }

    document.onscroll = scroll;
});

/*error checking scripts for contact form*/
function check()	{
	"use strict";
	var error = "";
	if (document.getElementById('name').value === "")	{
			error += "Please enter your Name \n";
			document.getElementById('name').style.borderColor = "#F90606";
		}
		
		if (document.getElementById('email').value === "")	{
			error += "Please enter your Email address \n";
			document.getElementById('email').style.borderColor = "#F90606";
		}
		
		if (document.getElementById('message').value === "")	{
			error += "Please enter your message \n";
			document.getElementById('message').style.borderColor = "#F90606";
		}
		if (document.getElementById("callback").checked && document.getElementById("number").value === "") {
			error += "Please enter your phone number \n";
			document.getElementById('number').style.borderColor = "#F90606";
		}
			if (error !== "") {
				alert(error);
				return false;
		}
}	

/*error checking scripts for login form*/

function check1()	{
	"use strict";
	var error = "";
	if (document.getElementById('userId').value === "")	{
			error += "Please enter your username \n";
			document.getElementById('userId').style.borderColor = "#F90606";
		}
		
		if (document.getElementById('password').value === "")	{
			error += "Please enter your password \n";
			document.getElementById('password').style.borderColor = "#F90606";
		}
		
			if (error !== "") {
				alert(error);
				return false;
		}
}	

/* functions to expand and contract text*/	

	function slideOpen(el)	{
		"use strict";
		var elem = document.getElementById(el);
		elem.style.transition = "height 0.5s linear 0s";
	elem.style.height = "100%";
}
function slideClosed(el)	{
	"use strict";
		var elem = document.getElementById(el);
		elem.style.transition = "height 0.5s linear 0s";
	elem.style.height = "0px";
}

