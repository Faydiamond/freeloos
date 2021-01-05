<?php
    
    require_once '../php/Conect.php';
    $coonect = new CONNECCT();
    $coonect->Con();
    $query="CALL  All_Genders()";
    $result = mysqli_query($coonect->Cons,$query)
            or die("Ocurrio un error en la consulta SQL");
    mysqli_close($coonect->Cons);
    echo '<option value="DEFAULT">Seleccionar Genero</option>';
    while (($fila = mysqli_fetch_array($result)) != NULL) {
        echo '<option value="'.$fila["Id_gender"].'">'.$fila["Gender"].'</option>';
    }

    mysqli_free_result($result);

?>
