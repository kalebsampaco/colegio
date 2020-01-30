<?php
//El parametro de $extension determina que tipo de imagen no se borrará por ejemplo si es jpg significa que la imagen con extensión .jpg se queda en el servidor y si existen imagenes con el mismo nombre pero con extension png o gif se eliminaran, con esta función evito tener imagenes duplicadas con distinta extensiones para cada perfil la funcion file_exists evalua si un archivo existe y la funcion unlink borra un archivo del servidor
function borrar_imagenes($ruta,$extension)
{
	if(strstr($extension,"pdf"))
	{
		if(file_exists($ruta.".pdf"))
				unlink($ruta.".pdf");
	}
}

//Función para subir la imagen del perfil del usuario
function subir_taller($tipo,$archivo,$asig_curso)
{
	//strstr($cadena1,$cadena2) sirve para evaluar si en la primer cadena de texto existe la segunda cadena de texto
	//Si dentro del tipo del archivo se encuentra la palabra image significa que el archivo es una imagen
	//para saber de que tipo de extension es el documento
		if(strstr($tipo,"pdf")){
			$extension = ".pdf";
		
		
			//guardo la ruta que tendra en el servidor del pdf
            $destino="./public/taller/".$asig_curso.$extension;

            //Se sube la foto
            move_uploaded_file($archivo,$destino) or die("No se pudo subir la imagen al Servidor :(");

            //Ejecuto la funcion para borrar posibles pdf dobles para el taller
            $nombre_pdf = "./public/taller/".$asig_curso;
            borrar_imagenes($nombre_pdf,$extension);
		

		//Asigno el nombre del pdf que se guardará en la BD como cadena de texto
        $archivo=$asig_curso.$extension;
        return $archivo;
	}
	else
	{
		echo 'No es un documento valido';
	}
}
?>