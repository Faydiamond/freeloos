<?php
    
    require_once '../php/Conect.php';
    $coonect = new CONNECCT();
    $coonect->Con();
    //llamo al procedimiento que trae los tipos de docuemnto
    $query="CALL All_tp()";
    $result = mysqli_query($coonect->Cons,$query)
            or die("Ocurrio un error en la consulta SQL");
    mysqli_close($coonect->Cons);
    echo '<option value="DEFAULT">Tipo de documento</option>';
    while (($fila = mysqli_fetch_array($result)) != NULL) {
        echo '<option value="'.$fila["Id_to_documents"].'">'.$fila["document"].'</option>';
    }

    mysqli_free_result($result);

?>
