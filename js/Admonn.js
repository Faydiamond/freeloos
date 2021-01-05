$(function() 
{
    $("#Non").hide();
    $("#CardsUss").hide();
    $('#FormUs').hide();
    $('#UsImg').hide();
    $('#Citys').hide();
    $('#FormCys').hide();
    $('#Jobs').hide();
    $('#imgJob').hide();

    //listado de ciudades
    $("select[name=CreCity").change(function() {
        creciyy = $(this).val();
        //alert(creciyy);
    });
    //listado de tipos de documento
    $("select[name=CreTp").change(function() {
        cretp = $(this).val();
    });
    //listado de p`rofesiones
    $("select[name=CrePro").change(function() {
        crePro = $(this).val();
    });
    $("select[name=CrePro2").change(function() {
        crePro2 = $(this).val();
        //alert(crePro2);
    });
    //select city
    $.ajax({
        type: 'post',
        url: '../php/GetListCitys.php',
        success: function(response) {
            $('.selector-city select').html(response).fadeIn();
        }
    });
    //select tipo documento
    $.ajax({
        type: 'post',
        url: '../php/GetListTp.php',
        success: function(response) {
            $('.selector-tp select').html(response).fadeIn();
        }
    });
    //select listrado de profesiones
    $.ajax({
        type: 'post',
        url: '../php/GetListPro.php',
        success: function(response) {
            $('.selector-professions select').html(response).fadeIn();
        }
    });
    $.ajax({
        type: 'post',
        url: '../php/GetListPro.php',
        success: function(response) {
            $('.professions2 select').html(response).fadeIn();
        }
    });

    $('#Crt_Us').click(function() {
        $("#CardsUss").hide("size").delay(400);
        $('#Citys').hide();
        $('#FormCys').hide();
        $('#UsImg').show();
        $('#FormUs').show("size");
        $('#AllCitys').hide();
        $('#Roless').hide();
        $('#FormRol').hide();
        $('#AllRolss').hide();
        $('#Servicess').hide();
        $('#FormSer').hide();
        $('#AllServices').hide();
        $('#Informss').hide();
        $('#FormInforms').hide();
        $('#AllInforms').hide();
        $('#InformsHours').hide();
        $('#FormInfoHours').hide();
        $('#AllInformsHours').hide();
        $('#imgJob').hide();
        $('#Jobs').hide();
        //alert("Me has pinchado!");
        console.log('Click in the menu;Crear user');
    });
    $('#Crt_Cys').click(function() {
        //$("#CardsUss").hide("size").delay(400);
        $("#CardsUss").hide();
        $('#FormUs').hide();
        $('#UsImg').hide();
        $('#Citys').show();
        $('#Servicess').hide();
        $('#FormSer').hide();
        $('#AllServices').hide();
        $('#FormCys').show("size");
        $('#AllCitys').hide();
        $('#Informss').hide();
        $('#FormInforms').hide();
        $('#AllInforms').hide();
        $('#InformsHours').hide();
        $('#FormInfoHours').hide();
        $('#AllInformsHours').hide();
        $('#imgJob').hide();
        $('#Jobs').hide();
        //alert("Me has pinchado!");
        console.log('Click in the menu;Crear Ciudad');
    });
    $('#Ad_Cys').click(function() {
        //$("#CardsUss").hide("size").delay(400);
        $("#CardsUss").hide();
        $('#FormUs').hide();
        $('#UsImg').hide();
        $('#FormCys').hide();
        $('#Citys').show();
        $('#AllCitys').show({
            effect: "scale",
            direction: "horizontal"
        });
        $('#imgJob').hide();
        $('#Jobs').hide();
        //alert("Me has pinchado!");
        console.log('Click in the menu;Admin Ciudades');
    });
    $('#Crt_Jobs').click(function() {
        //$("#CardsUss").hide("size").delay(400);
        $("#CardsUss").hide();
        $('#FormUs').hide();
        $('#UsImg').hide();
        $('#FormCys').hide();
        $('#Citys').hide();
        $('#AllCitys').hide({
            effect: "scale",
            direction: "horizontal"
        });
        $('#imgJob').show();
        $('#Jobs').show({
            effect: "scale",
            direction: "horizontal"
        });
        //alert("Me has pinchado!");
        console.log('Click in the menu;Admin Empleos');
    });




    $('#SendJob').click(function() {
        //get vars
        var Title = $("#TleJob").val();
        var Descrip = $("#desjobs").val();
        var Profess = crePro2;
        var Presupu = $("#PreJob").val();
        var DataJo = 'Title=' + Title + '&Descrip=' + Descrip + '&Profess=' + Profess + '&Presupu=' +Presupu;

        console.log(DataJo);
        $.ajax
        ({
            type: 'post',
            url: '../php/CreJob.php',
            data: DataJo,
            beforeSend: function() {
                console.log('Antes de procesar');
            },
            success: function(response)  
            {
                
                if (response == 1) {
                    //$('#Res').show();
                    //console.log("Es uno");
                    alertify.warning('Por favor diligencia los campos');

                }
                if (response == 2) {
                    //$('#Res').show();
                    //console.log("Es uno");
                    alertify.error('El empleo ya se encuentra registrada, lo sentimos');
                }
                if (response == 5) {
                    //$('#Res').show();
                    //console.log("Es uno");
                    alertify.success('El empleo se ha creado correctamente');
                }
                //$("#grande").html(response);
            }
        });
    });





});
///////////////////////////////////////////////////7
//importante



$(".btn-default").click(function(event) 
{
    // alert("Here");
    var status = $(this).attr('id');
    console.log(status);
    if (status == "Mascu") {
        $("#Femen").css("border", "none");
        $("#Mascu").css("border", "1px solid blue");
        $("#Genero").val("1");
        //alert("here");
        //$("#BtnSx2").attr("disabled",true);

        //console.log("desde btnsx1: "+Gen);
    } else if (status == "Femen") {
        $("#Mascu").css("border", "none");
        $("#Femen").css("border", "1px solid blue");
        $("#Genero").val("2");
        // alert("F");
    }
    //declaro vaiable
    //  var SxM="Mujer";
    //pruebo y sale dos  veces
    //  console.log(SxM);
    //sss  alert(SxM);
});

$(".btn-info").click(function(event) {
    //alert ("click in select some rol!");
    var status2 = $(this).attr('id');
    console.log(status2);
    if (status2 == "Adm") {
        //alert("I am a Admin!");
        $("#Use").css("border", "none");
        $("#Adm").css("border", "1px solid blue");
        //$( ".btn-info" ).css( "border", "1px solid blue");
        $("#Rol").val("2");
    } else if (status2 == "Use") {
        $("#Adm").css("border", "none");
        $("#Use").css("border", "1px solid blue");
        $("#Rol").val("1");
    }
});

//crear usuario
$("#CreUsr").click(function(Inicio) {
    //alert("Click in the create user!");
    console.log("Click in the create User!");

    var Na = $("#Name").val();
    var Na1 = $("#Name1").val();
    var LaNa = $("#LaNa").val();
    var LaNa1 = $("#LaNa1").val();
    var Maill = $("#Maill").val();
    var fadeIn = $("#Fna").val();
    var Us = $("#Userr").val();
    var Ps = $("#Pass").val();
    var Gen = $("#Genero").val();
    var Rol = $("#Rol").val();
    var Ci = creciyy;
    var Fnac = $('#Fna').val();
    var Tp = cretp;
    var NoDoc = $('#nroDoc').val();
    var Prof = crePro;


    //alert (Ci);
    //if ($('#Cityy').val()=="DEFAULT") {
    //alert('Debe seleccionar una opción');

    // } else {
    //   alert('Campo correcto');
    //}

    // console.log(Ci);
    //var Gen=$('input:button[name=Gender]').val();
    //if(Gen==1)
    //{
    //  console.log("it is a man!");
    // }
    //alert(Gen+"  "+"   "+Rol);
    //alert ("Desde enviar:"+Ci);
    //console.log(Na+" "+Na1+" "+LaNa+" "+LaNa1+" "+Maill+" "+Fna+" "+Us+"  "+Ps+"Gender is:"+Gen+"Rol " +" "+Rol+"The city is: "+" ");
    //var Dataa = 'Name=' + Na + '&Pass=' + Pass;
    //console.log(Dataa);
    //alert(Ps);
    //var Url = 'Users.php';
    //alert(Ci);
    //Ci=$("#Cityy").val($("select[name=Cityy]").val(0));

    //if (Ci=="0")
    //{
    //  alert ("indefinida!");
    // }

    var Dataa = 'Name=' + Na + '&Name1=' + Na1 + '&LaNa=' + LaNa + '&LaNa1=' + LaNa1 + '&Maill=' + Maill + '&Fna=' + Fnac + '&Userr=' + Us + '&Pass=' + Ps + '&Genero=' + Gen + '&Rol=' + Rol + '&Cityy=' + Ci + '&Tp=' + Tp + '&NoDoc=' + NoDoc + '&Prof=' + Prof;
    console.log(Dataa);
    $.ajax({
        type: 'post',
        url: '../php/Users.php',
        data: Dataa,
        beforeSend: function() {
            console.log('Antes de procesar');
        },
        success: function(response) {
            if (response == 1) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.warning('Por favor diligencia los campos');
            }
            if (response == 2) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.error('El  usuario o correo ya se encuentran registrador, lo sentimos');
            }
            if (response == 5) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.success('El  usuario se ha creado correctamente');

            }

        }

    });

});

function Exitt() {
    //alert ("Hey, you are exiting...");

}

$('#CreCity').click(function() {
    //alert('Click in create city');
    console.log('Create City!');
    //alert(MyCyty);
    NameCty = $("#Namecys").val();
    var UrlCity = '../php/Citys.php';
    console.log(NameCty);
    var Datactys = 'Namecys=' + NameCty;
    console.log(Datactys);

    $.ajax({
        type: 'post',
        url: UrlCity,
        data: Datactys,
        beforeSend: function() {
            console.log('Antes de procesar');
        },
        success: function(response) {
            if (response == 1) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.warning('Por favor diligencia los campos');
            }
            if (response == 2) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.error('La ciudad ya se encuentra registrada, lo sentimos');
            }
            if (response == 5) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.success('LA ciudad se ha creado correctamente');
            }
        }
    });
});

$('#Exi').click(function() {
    //alert('Click in the close session');
    var Close="Close";
    var DataE = 'Close=' + Close;
    $.ajax({
        type: 'post',
        url:  '../php/closeSesion.php',
        data: DataE,
        beforeSend: function() {
            console.log('Cerrar Sesion');
        },
        success: function(response) {
            if (response == 5) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.success('Sesion cerrada de manera satisfactoria');
               // window.locationf = '../index.php';

                window.location.href = '../index.php';
            }
        }
    });
});