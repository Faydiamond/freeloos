<?php 

require_once '../php/Conect.php';
$coonect = new CONNECCT();
$coonect->Con();
$query="SELECT Id_User,Name,Last_Name FROM userss ORDER BY Name";
$result = mysqli_query($coonect->Cons,$query)
        or die("Ocurrio un error en la consulta SQL");
mysqli_close($coonect->Cons);
echo '<option value="DEFAULT">Seleccionar Usuario</option>';
while (($fila = mysqli_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila["Id_User"].'">'.$fila["Name"].'
    '.$fila["Last_Name"].'
    
    </option>';
}

mysqli_free_result($result);

?>