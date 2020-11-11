function validatePassword(){
	const leoForm = document.forms["leoForm"];
	var password = leoForm["password"]["value"], confirmPassword = leoForm["confirm_password"]["value"] ;



	if(password === confirm_password){
		return true;
	}else{
		document.getElementById("form-errors").innerHTML = "Passwords Don't Match";
		return false;
	}
}