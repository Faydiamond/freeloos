<?php
    
    require_once '../php/Conect.php';
    $coonect = new CONNECCT();
    $coonect->Con();
    $query="CALL All_Professions()";
    $result = mysqli_query($coonect->Cons,$query)
            or die("Ocurrio un error en la consulta SQL");
    mysqli_close($coonect->Cons);
    echo '<option value="DEFAULT">Seleccionar Profesion</option>';
    while (($fila = mysqli_fetch_array($result)) != NULL) {
        echo '<option value="'.$fila["Id_profesion"].'">'.$fila["profesion"].'</option>';
    }

    mysqli_free_result($result);

?>
