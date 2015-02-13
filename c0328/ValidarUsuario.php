<?php
	/*
	* Se valida el nombre de usuario - Juan Beleño - 21/12/2013 - v0.1
	*/
	require("../m1992/pdofactory.phpm");
	require("../m1992/databoundobject.phpm");
	require("../m1992/class.Cuenta.phpm");
	require("../m1992/class.Factory.phpm");
	require("PDOParameters.php");

	$NombreUsuario = $_GET['usuario']; // Se recibe el parametro del nombre de usuario
	$IdCuenta = Factory::FactoryObject($objPDO,"usuario", "cuenta", $NombreUsuario); // Se busca una cuenta con ese nombre de usuario
	if(count($IdCuenta) == 0) {// Si no encuentra una cuenta con ese nombre de usuario entonces
		echo "valido";// La cuenta es valida
		return;
	}
	else{ // De lo contrario es 
		echo "invalido";// Un nombre de usuario invalido
		return;
	}
?>