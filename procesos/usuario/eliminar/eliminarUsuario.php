<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$usuarios = new Usuario;

	$id_Usuario = $_POST['id_Usuario'];

	echo $usuarios->eliminarUsuario($id_Usuario);

	//Definimos la ruta de la carpeta del usuario a eliminar
	$carpeta2 = '../../../archivos/' . $id_Usuario; 
	

	if (is_dir($carpeta2)) {
        // Obtener todos los archivos y directorios dentro del directorio
        $archivos = scandir($carpeta2);

        // Recorrer los archivos y directorios
        foreach ($archivos as $archivo) {
            // Ignorar los directorios "." y ".."
            if ($archivo != '.' && $archivo != '..') {
                $rutaArchivo = $carpeta2 . '/' . $archivo;
                
                // Verificar si el elemento es un archivo o un directorio
                if (is_file($rutaArchivo)) {
                    // Eliminar el archivo
                    unlink($rutaArchivo);
                } elseif (is_dir($rutaArchivo)) {
                    // Llamar recursivamente a la función para eliminar el directorio
                    mrdir($rutaArchivo);
                }
            }
        }


        // Eliminar el directorio vacío
        rmdir($carpeta2);
        
        return true;
    } else {
        return false;
    }
	
   			 
    		     


			 




 ?>