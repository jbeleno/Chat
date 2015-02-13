<?php
	/*
	* Se autentica el usuario - Juan Beleño - 22/12/2013 - v0.1
	*/
	require("../m1992/pdofactory.phpm");
	require("../m1992/databoundobject.phpm");
	require("../m1992/class.Cuenta.phpm");
	require("../m1992/class.Factory.phpm");
	require("PDOParameters.php");

	// Se reciben los parametros
	$NombreUsuario = $_GET['usuario'];
	$Password = $_GET['password'];

	$IdCuenta = Factory::FactoryObject2($objPDO,"usuario", "cuenta", $NombreUsuario); // Se busca una cuenta con ese nombre de usuario
	if(count($IdCuenta) !=0) { // Si existe una cuenta con ese nombre de usuario entonces se valida
		$objCuenta = new Cuenta($objPDO, $IdCuenta[0]); // Se crea un objeto cuenta con el id de la cuenta del usuario
		if($objCuenta->getPassword() == sha1($Password)){
			$objCuenta->setIdSesion(sha1($objCuenta->getUsuario().date("d/m/y H:i:s"))); //Se establece un token de sesion
			$objCuenta->save(); //Se guarda el token de sesion
			echo $objCuenta->getIdSesion();
			return;
		}
		else {
			echo "invalid1";
			return;
		}
	}
	else{ // De lo contrario es 
		echo "invalid0";
		return;
	}
?>