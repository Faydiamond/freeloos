<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="es">

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
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Panel Administrativo</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Opciones</p>
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
            <section id="ListJobs">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">

                            <div class="HowProf">
                                <select name="Howprof" id="Howproff"></select>
                            </div><br>
                        </div>
                        <div class="col-sm-4">
                            <!--
                            <div class="HowCity">
                                <select name="Hocity" id="HoCityy"></select>
                            </div><br>-->
                        </div>
                        <div class="col-sm-4">
                            <!--
                            <div class="input-group">
                                <input type="text" class="form-control" id="SeJob">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="SearchJob">Buscar</button>
                                </span>
                            </div>
                            -->
                        </div>
                    </div>
                   <div class="container my-5">
                        <div class="row">   
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                               <div id="LoadJobss"> </div>

                            </div>  
                            <div class="col-sm-1"></div>
                          
                        </div> 

                   </div>
                </div>
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Aplicación al empleo</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="input" style="background-color: transparent !important;" class="Ints form-control" id="ConOfe" name="conOfe" placeholder="Digite su contra oferta"><br>
            <input type="textarea" style="background-color: transparent !important; height: 100px !important;" class="Ints form-control" id="msgJob" name="msgjob" placeholder="Envie un mensaje al empleador" maxlength = "500" ><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="ApliJob">Aplicar al empleo</button>
      </div>
    </div>
  </div>
</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/alertify.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
    <script src="../js/Admonn.js"></script>
    <script src="../js/AdmonUsers.js"></script>
    <script src="../js/showJobs.js"></script>
    <script src="../js/search.js"></script>
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
