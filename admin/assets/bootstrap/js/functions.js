// JavaScript Functions

// hide the login panel and show the register panel
function register_account(){
	
	$('.login_wrapper').removeClass("show").addClass("hide");
	$('.register_wrapper').removeClass("hide").addClass("show");
	
}

// hide the register panel and show the login panel
function sign_in(){
	
	$('.register_wrapper').removeClass("show").addClass("hide");
	$('.login_wrapper').removeClass("hide").addClass("show");

}
