// Shorthand for $( document ).ready()
$(function() {
    //console.log("ready!");
    //alert("REady!");
    $("#Res").hide();
    $("#Sign").click(function() {
        //alert("pinchado!");
        var Na = $('#Name').val();
        var Pass = $('#Pass').val();
        console.log("Password:" + Pass + "Name:" + Na);
        //console.log(Na + " " + Na1 + " " + LaNa + " " + LaNa1 + " " + Usr + " " + Mil + " " + Ae + " " + Gs);
        var Dataa = 'Name=' + Na + '&Pass=' + Pass;
        console.log(Dataa);
        var Url = 'php/Login.php';


        $.ajax({
            type: 'post',
            url: Url,
            data: Dataa,
            beforeSend: function() {
                console.log('Antes de procesar');
            },
            success: function(response) {
                if (response == 0) {
                    //$('#Res').show();
                    //console.log("Es uno");
                    alertify.warning('Por favor diligencia los campos');
                }
                if (response == 1) {
                    //$('#Res').html("El correo ya se encuentra registrado!");
                    alertify.error('El correo o usuario No se encuentran registrados!');
                }
                if (response == 3) {
                    //$('#Res').html("registrado!");
                    alertify.success('Sos el admin!');
                    //alert("here")

                    function EnterAdmin() {

                        console.log("Aqui!");
                        location.href = "Views/Admon.php";
                    }
                    setTimeout(EnterAdmin, 1000);

                }
                if (response == 4) {
                    //$('#Res').html("registrado!");
                    alertify.success('Sos un usuario!');
                    function EnterUser() {

                        console.log("Aqui!");
                        location.href = "Views/usersView.php";
                    }
                    setTimeout(EnterUser, 1000);
                }
            }

        });
    });
});