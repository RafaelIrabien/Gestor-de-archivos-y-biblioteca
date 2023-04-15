<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$usuarios = new Usuario;

	$id_Usuario = $_POST['id_Usuario'];

	echo $usuarios->eliminarUsuario($id_Usuario);

	//Definimos la ruta de la carpeta del usuario a eliminar
	
	//$carpetaCompartir = '../../../archivos/' . $id_Usuario . '/Archivos_Compartidos';

    function eliminarDirectorio($carpeta2) {
    
    if (is_dir($carpeta2)) {
        $archivos = scandir($carpeta2);

        foreach ($archivos as $archivo) {
            if ($archivo !== '.' && $archivo !== '..') {
                $rutaArchivo = $carpeta2 . '/' . $archivo;
                if (is_file($rutaArchivo)) {
                    unlink($rutaArchivo); // Eliminar archivo
                } else {
                    eliminarDirectorio($rutaArchivo); // Eliminar directorio de forma recursiva
                }
            }
        }
        rmdir($carpeta2); // Eliminar directorio vacío
    }
}


$carpeta2 = '../../../archivos/' . $id_Usuario; 
eliminarDirectorio($carpeta2);


	
    


    
    
    


			 




 ?>