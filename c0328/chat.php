<?php
	/*Aqui se realiza el registro de nuevos usuarios - Made By Juan Beleño - 21/12/2013 - v0.1*/
	require("../m1992/pdofactory.phpm");
	require("../m1992/databoundobject.phpm");
	require("../m1992/class.Cuenta.phpm");
	require("PDOParameters.php");
	
	//Se reciben los parametros enviados desde la app
	$lang = 1;

	//Se crea un Objeto Cuenta
	$objCuenta = new Cuenta($objPDO);

	//Se establecen los datos del usuario
	$objCuenta->setUsuario($user);
	$objCuenta->setCorreo($email);
	$objCuenta->setCelular($movil);
	$objCuenta->setPassword(sha1($pass));
	$objCuenta->setIdIdioma($lang);
	
?>