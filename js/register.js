$(function() 
{
	//alert ('Here!');
	 //listado de tipos de documento
    $("#formReg").hide(); 
    $("#formCom").hide();
    $("select[name=CreTpR").change(function() {
        cretpr = $(this).val();
    });
    $.ajax({
        type: 'post',
        url: 'php/GetListTp.php',
        success: function(response) {
            $('.selector-tpR select').html(response).fadeIn();
        }
    })
    //Tipo de documento
    //select listrado de profesiones
    $("select[name=CreProR").change(function() {
        crePror = $(this).val();
    });

    $.ajax({
        type: 'post',
        url: 'php/GetListPro.php',
        success: function(response) {
            $('.selector-professionsR select').html(response).fadeIn();
        }
    });
    //generos
    $.ajax({
        type: 'post',
        url: 'php/GetListGe.php',
        success: function(response) {
            $('.selector-gender select').html(response).fadeIn();
        }
    })
    $("select[name=CreGen").change(function() {
        generR = $(this).val();
    });
    //Citys:
    $.ajax({
        type: 'post',
        url: 'php/GetListCitys.php',
        success: function(response) {
            $('.selector-cityr select').html(response).fadeIn();
        }
    });
    $("select[name=CityR").change(function() {
        CityRP = $(this).val();
    });  
    //economicActivityes
    $.ajax({
        type: 'post',
        url: 'php/GetListEco.php',
        success: function(response) {
            $('.selector-ActiEcoo select').html(response).fadeIn();
        }
    });
    $("select[name=ActyEcoo").change(function() {
        Activity = $(this).val();
    });
});

$(".btn-default").click(function(event) 
{
    // alert("Here");
    var status = $(this).attr('id');
    console.log("que accion: "+status);
    if (status == "Perso") {
        $("#Emplo").css("border", "none");
        $("#Perso").css("border", "1px solid blue");
        $("#formCom").fadeOut(); 
        $("#formReg").fadeIn(); 
        //alert("here");
        //$("#BtnSx2").attr("disabled",true);

        //console.log("desde btnsx1: "+Gen);
    } else if (status == "Emplo") {
        $("#Perso").css("border", "none");
        $("#Emplo").css("border", "1px solid blue");
        $("#formReg").fadeOut(); 
        $("#formCom").fadeIn(); 
        // alert("F");
    }
   
});

$("#CreatePp").click(function() 
{
  	//alert("Click in create person in index!");
  
    
  	/////////////////////////////////////////////////////////////////////////
    
  	var Na = $("#NameR").val();
    var Na1 = $("#NameR1").val();
    var LaNa = $("#LaNar").val();
    var LaNa1 = $("#LaNar1").val();
    var Maill = $("#MaillR").val();
    //var fadeIn = $("#FnaR").val();
    var Us = $("#userpp").val();
    var Ps = $("#pasPP").val();
    var Gen = generR;
    var Rol = 1;
    var Ci = CityRP;
    var Fna = $('#Fnaa').val();
    var Tp = cretpr;
    var NoDoc = $('#NroDocc').val();
    var Prof = crePror;
    var Dataa = 'Name=' + Na + '&Name1=' + Na1 + '&LaNa=' + LaNa + '&LaNa1=' + LaNa1 + '&Maill=' + Maill + '&Fna=' + Fna + '&Userr=' + Us + '&Pass=' + Ps + '&Genero=' + Gen + '&Rol=' + Rol + '&Cityy=' + Ci + '&Tp=' + Tp + '&NoDoc=' + NoDoc + '&Prof=' + Prof;
    console.log(Dataa);
  



  	$.ajax({
        type: 'post',
        url: 'php/Users.php',
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

$("#CreateCom").click(function(){
    //get variables:
    var NameCompanyy = $("#Nameco").val();
    var UserCompany   = $("#Usco").val();
    var MailCompany   = $("#Maicom").val();
    var PassCompany = $("#Passcom").val();
    var Activityy  = Activity;
    var Roll    = 1;
    var TpDocu  = 2;
    var dataCompany = "NameCompanyy=" +NameCompanyy + "&UserCompany=" + UserCompany + "&MailCompany=" + MailCompany + "&PassCompany=" +PassCompany +"&Activityy=" + Activityy +"&Roll=" +Roll+ "&TpDocu=" +TpDocu ;
    console.log(dataCompany);

    //Send by ajax
    $.ajax({
        type: 'post',
        url: 'php/Companys.php',
        data: dataCompany,
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
                alertify.error('La empresa o correo ya se encuentran registrador, lo sentimos');
            }
            if (response == 5) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.success('La empresa se ha creado correctamente');
            }

        }

    });

});