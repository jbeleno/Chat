/*
* Este archivo va a controlar todo lo relacionado con la parte
* del cliente de la app - Juan Beleño - 21/12/2013 - v0.1
*/

//Valida la contraseña
function validarPassword(pass1, pass2){
	if(pass1 == pass2){
		if(pass1.replace(" ","").length<pass2.length){
			alert('Password should not contain spaces characters');
			return false;
		}
		else {
			if(pass1.length<6){
				alert('The password must contain at least 6 characters');
				return false;
			}
		}
	}
	else {
		alert('Passwords are differents');
		return false; 
	}
	return true;
}

//Valida el usuario
function validarUsuario(user){
	var user2 = user;
	if(window.XMLHttpRequest){
		conexion = new XMLHttpRequest();
	}else{
		conexion = new ActiveXObject("Microsoft.XMLHTTP");
	}
	conexion.onreadystatechange= function(){
		if(conexion.readyState == 4 && conexion.status == 200){
			if(conexion.responseText == "invalido"){
				alert("Username already in use, please change it by other one.");
				return false;
			}
			
		}
	};
	conexion.open("GET","http://phantomchat.netai.net/c0328/ValidarUsuario.php?", true);
	conexion.send();	
	if(user2.replace(" ","").length < user.length){		
		alert ('User field must not contain space characters');
		return false;
	}else{ 
		if(user.length<3){
			alert('User field must at least 3 characters');
			return false;
		}
	}
	return true;
}

//Registrar un usuario
function Registrar(){
	var conexion;
	var user,email,number,pass, pass2;
	user = document.getElementById("username").value.toLowerCase();
	email = document.getElementById("email").value.toLowerCase();
	number = document.getElementById("number").value;
	pass = document.getElementById("pass").value;
	pass2 = document.getElementById("r_pass").value;
	if(validarPassword(pass,pass2) && validarUsuario(user)){
		if(window.XMLHttpRequest){
			conexion = new XMLHttpRequest();
		}else{
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}
		conexion.onreadystatechange= function(){
			if(conexion.readyState == 4 && conexion.status == 200){
				alert("Register done!");
			}
		};
		conexion.open("GET","http://phantomchat.netai.net/c0328/Registrar.php?usuario="+user+"&correo="+email+"&celular="+number+"&password="+pass, true);
		conexion.send();
	}
}

//Autenticar el usuario
function Autenticar(){
	var conexion,user,pass;
	user = document.getElementById("login_user").value.toLowerCase();
	pass = document.getElementById("login_pass").value;
	if(window.XMLHttpRequest){
		conexion = new XMLHttpRequest();
	}else{
		conexion = new ActiveXObject("Microsoft.XMLHTTP");
	}
	conexion.onreadystatechange= function(){
		if(conexion.readyState == 4 && conexion.status == 200){
			var res = conexion.responseText;
			if(res == "invalid0"){
				alert("Doesn't exist an account with that username.");
			}
			else if(res == "invalid1"){
				alert("Wrong password");
			}
			else{
				localStorage.setItem("Token",res);
			}
		}
	};
	conexion.open("GET","http://phantomchat.netai.net/c0328/Autenticar.php?usuario="+user+"&password="+pass, true);
	conexion.send();
}

//Cargar los contactos del usuario
function CargarContactos(){
	var conexion, token;
	token = localStorage.getItem("Token");
	if(window.XMLHttpRequest){
		conexion = new XMLHttpRequest();
	}else{
		conexion = new ActiveXObject("Microsoft.XMLHTTP");
	}
	conexion.onreadystatechange= function(){
		if(conexion.readyState == 4 && conexion.status == 200){
			document.getElementById("contactsul").value = conexion.responseText;
		}
	};
	conexion.open("GET","http://phantomchat.netai.net/c0328/CargarContactos.php?token="+token, true);
	conexion.send();
}
