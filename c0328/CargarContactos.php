<?php
	/*
	* Se cargan los contactos del usuario - Juan Beleño - 25/12/2013 - v0.1
	*/
	require("../m1992/pdofactory.phpm");
	require("../m1992/databoundobject.phpm");
	require("../m1992/class.DetalleContactos.phpm");
	require("../m1992/class.GrupoContactos.phpm");
	require("../m1992/class.Factory.phpm");
	require("PDOParameters.php");

	// Se reciben los parametros
	$token = $_GET['token'];

	$IdCuenta = Factory::FactoryObject($objPDO,"id_sesion", "cuenta", $token); // Se busca una cuenta con ese Id de sesion
	
	if(count($IdCuenta) != 0) { // Si existe una cuenta con ese id de sesion entonces
		$Contactos = Factory::FactoryObject($objPDO, "id_cuenta", "detalle_contactos", (int)$IdCuenta[0]); // Se buscan los contactos del usuario
		$Grupos = Factory::FactoryObject($objPDO, "owner", "grupo_contactos", (int)$IdCuenta[0]); // Se buscan los grupos de contacto
		foreach($Grupos as $valgr){// Para cada grupo
			$Grupo = new GrupoContactos($objPDO, (int)$valgr);// Se crea un objeto grupo
			echo '<li data-role="list-divider" data-theme="d">'.$Grupo->Nombre.'</li>';// Se imprime el nombre del grupo
			if(count($Contactos) != 0){// Si hay contactos
				foreach($Contactos as $valc){// Para cada contacto
					$Contacto = new DetalleContactos($objPDO, (int)$valc);// Se crea un objeto contacto
					if($Contacto->getIdGrupoContactos() == $Grupo->Id){// Si el grupo del contacto coincide con el grupo que estamos imprimiendo
						echo '<li><a href="#chat" onclick=('.$Contacto->IdContacto.')'.$Contacto->Nombre.'</a></li>';// Se imprime el contacto
					}
				}
			}
		}
		return;
	}
	echo "This account doesn't exist";// Si no coincide el dueño de la cuenta es porque no existe
?>