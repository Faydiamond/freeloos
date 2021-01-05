<?php
//session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel Administrativo</title>
    <!-- Bootstrap CSS CDN -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/alertify.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-select.css" />
    <link rel="stylesheet" type="text/css" href="../css/NavLeft.css" />
  </head>

<body>
    

    </div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Panel Administrativo</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Opciones</p>
                <li class="active">
                    <a href="#MeUs" data-toggle="collapse" aria-expanded="false">Usuarios</a>
                    <ul class="collapse list-unstyled" id="MeUs">
                        <li><a id="Crt_Us">Crear</a></li>
                        <li><a id="Ad_Usr">Administrar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#MeCys" data-toggle="collapse" aria-expanded="false">Ciudades</a>
                    <ul class="collapse list-unstyled" id="MeCys">
                        <li><a id="Crt_Cys">Crear</a></li>
                        <li><a id="Ad_Cys">Administrar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#MeJobs" data-toggle="collapse" aria-expanded="false">Empleos</a>
                    <ul class="collapse list-unstyled" id="MeJobs">
                        <li><a id="Crt_Jobs">Crear</a></li>
                        <li><a id="Ad_Jobs">Administrar</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li><a id="Exi" class="download">Salir</a></li>
            </ul>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-default" style="background-color:#001a4b !important;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <button type="button" id="sidebarCollapse" class="navbar-btn">
                                    <span class="FBan"></span>
                                    <span class="FBan"></span>
                                    <span class="FBan"></span>
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                    include_once '../php/sesion.php';
                                    $say = new Session();
                                    //echo '<h3>Bienvenido:'.'. .'..'</h3>';
                                    echo '<h3>' .'Bienvenido:  '.$say->NamseSe .'</h3>'
                                ?>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </div>
            </nav>
            <section id="UsImg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div>
                                <img src="../img/msn.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </section>
            <!--Usuarios-->
            <section id="FormUs">
                <div class="container">
                    <form action="Admon.php" name="formulario">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="input" style="  background-color: transparent   !important;" class="Ints form-control" name="Name" id="Name" placeholder="Primer Nombre"><br>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="input" style="  background-color: transparent   !important;" class="Ints form-control" name="Name1" id="Name1" placeholder="Segundo Nombre"><br>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="input" style="  background-color: transparent   !important;" class="Ints form-control" name="LaNa" id="LaNa" placeholder="Primer Apellido"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="input" style="  background-color: transparent   !important;" class=" Ints form-control" name="LaNa1" id="LaNa1" placeholder="Segundo Apellido1"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                   <div class="selector-tp">
                                                        <select name="CreTp" id="Cretp"></select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="input" style="  background-color: transparent   !important;" class=" Ints form-control" name="nroDoc" id="nroDoc" placeholder="Numero documento"><br>
                                                </div>
                                                <div class="col-sm-3">
                                                   <div class="selector-professions">
                                                        <select name="CrePro" id="Crepro"></select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="email" style="  background-color: transparent   !important;" class="Ints form-control" name="Maill" id="Maill" placeholder="Correo"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="input" style="  background-color: transparent   !important;" class=" Ints form-control" name="Fna" id="Fna" placeholder="Año de nacimiento AAAA-MM-DD"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="input" style="  background-color: transparent   !important;" class="Ints form-control" name="Userr" id="Userr" placeholder="Usuario"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" style="  background-color: transparent   !important;" class=" Ints form-control" name="Pass" id="Pass" placeholder="Clave"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <center>
                                                        <div class="btn-group" role="group" aria-label="">
                                                            <input type="button" id="Mascu" value="Masculino" name="Gender" class="btn btn-default Lef"></input>
                                                            <input type="button" id="Femen" value="Femenino" name="Gender2" class="btn btn-default Rig"></input>
                                                            <input type="hidden" name="Genero" id="Genero" value="-" />
                                                        </div>
                                                    </center>
                                                </div>
                                                <div class="col-sm-6">
                                                    <center>
                                                        <div class="btn-group" role="group" aria-label="">
                                                            <input type="button" id="Adm" value="Administrador" name="Admin" class="btn btn-info Lef"></input>
                                                            <input type="button" id="Use" value="Usuario" name="Usr" class="btn btn-info Rig"></input>
                                                            <input type="hidden" name="Rol" id="Rol" value="-" />
                                                        </div>
                                                    </center>
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <!-- Single button -->
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-sm-6">Ciudad :</div>
                                                            <div class="col-sm-6">
                                                            <div class="selector-city">
                                                                <select name="CreCity" id="Crecity"></select>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4"></div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="button" style="background-color:transparent; border-color:blue; color:#0994dc;" class="btn btn-block" id="CreUsr">Crear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                </div>
                </form>
            </section><br>
            <!--Ciudades-->
            <section id="Citys">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div>
                                <img src="../img/Cityss.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </section><br>
            <section id="FormCys">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <input type="input" style="  background-color: transparent   !important;" class="Ints form-control" name="NameCys" id="Namecys" placeholder="Nombre Ciudad"><br>
                    </div>
                    <div class="col-sm-4"></div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <button type="button" style="background-color:transparent; border-color:blue; color:#0994dc;" class="btn btn-block" id="CreCity">Crear</button><br>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Jobs-->
            <section id="imgJob">
            <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div>
                                <img src="../img/constructor.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
            </div>
            </section><br>
            <section id="Jobs">
                <form action="../php/CreJob.php" method="post">
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <input type="input" style="background-color: transparent !important;" class="Ints form-control" id="TleJob" name="TleJoB" placeholder="Título empleo"><br>
                            <textarea style="  background-color: transparent   !important;" class="Ints form-control" name="DesJob" id="desjobs" placeholder="Ingrese la descripción del empleo" maxlength="500"></textarea><br>
                            <input type="input" style="background-color: transparent !important;" class="Ints form-control" id="PreJob" name="prejob" placeholder="Digite el presupuesto"><br>
                            <div class="professions2">
                                <select name="CrePro2" id="Crepro2"></select>
                            </div><br>
                              
                            <button type="button" style="background-color:transparent; border-color:blue; color:#0994dc;" class="btn btn-block" id="SendJob"  name="btnJob" >Crear</button><br>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
                </form>
            </section>
           
       
           
            
            <section id="FoAdm">

                <?php
               include_once '../php/FootAdUs.php'; ?>
            </section>
            </section>
        </div>
    </div>
    <section>
    </section>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  
    <script src="../js/alertify.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
    <script src="../js/Admonn.js"></script>
  

  

    <!--<script src="../js/Admin_Ctys.js"></script>-->
    

    <!--<script src="../js/Users.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
