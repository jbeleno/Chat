<?php
	/* Aqui estan los datos que corresponden a la DB - Juan Beleño - 21/12/2013 - v0.1*/
	$strDSN = "mysql:dbname=a3304919_chat;host=mysql13.000webhost.com";
	$objPDO = PDOFactory::GetPDO($strDSN, "a3304919_user", "Atenas123", array());
	$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>