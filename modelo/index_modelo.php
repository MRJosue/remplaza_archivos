<?php

// Includes
 include 'conexion.php';
// fin includes


// declaracion de resultados
$option = $_POST['option'];
$contenido = [];
$result = '';
$RootPath = '';
$ErrMsg = ''; 
$Mensaje = '';
// fin de resultados

echo '<br>'. var_dump($_POST);
echo '<br>';
echo '<br>';
echo '<br>'. var_dump($_FILES);

if ($option == 'remplaza_archivo') {

    // asignamos datos
    echo $_POST;

}





$dataObj = array('contenido' => $contenido, 'result' => $result, 'RootPath' => $RootPath, 'ErrMsg' => $ErrMsg, 'Mensaje' => $Mensaje);




echo json_encode($dataObj);