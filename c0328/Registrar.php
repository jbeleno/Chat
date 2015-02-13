<?php
	/*
	* Se registran los datos del nuevo usuario - Juan Beleño - 21/12/2013 - v0.1
	*/
	require("../m1992/pdofactory.phpm");
	require("../m1992/databoundobject.phpm");
	require("../m1992/class.Cuenta.phpm");
	require("PDOParameters.php");

	//Se crea un objeto cuenta
	$objCuenta = new Cuenta($objPDO);

	//Se agregan al objeto los valores obtenidos
	$objCuenta->setUsuario($_GET['usuario']);
	$objCuenta->setCorreo($_GET['correo']);
	$objCuenta->setCelular($_GET['celular']);
	$objCuenta->setPassword(sha1($_GET['password']));
	$objCuenta->setIdIdioma(1);

	//Se guarda la informacion
	$objCuenta->save();
?>