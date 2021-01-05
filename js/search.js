$(function() 
{
	//alert("here!");
});

function Get_Rows()
{
	//Job = $('#SeJob').val();
	//alert (Job);
	/*
	$.ajax
	({
		url		: '../php/SearchJob.php',
		dataType: 'POST',
		dataType: 'html',
		data: {My_Data : My_Data}
	})
	.done(function  (result)
	{
		$('#LoadJobss').html(result);
	})*/
}

$('#SearchJob').click(function()
{
	Get_Rows();
});

function  getIdJob()
{

}

var Idd;
function Id_Job(IdJo)
{
	Idd = IdJo;
}

$('#ApliJob').click(function()
{
	//alert (Idd);
	var pryce = $('#ConOfe').val();
	var msg = $('#msgJob').val();
	console.log("id: "+Idd +"pryce: "+pryce + "msg: " + msg + "");
	Dataa = "Idd=" + Idd+ "&pryce=" +pryce + "&msg=" +msg;

	$.ajax({
        type: 'post',
        url: '../php/ApliJob.php',
        data: Dataa,
        beforeSend: function() {
            console.log('Antes de procesar aplicacion empleo');
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
                alertify.error('El  usuario ya aplico al cargo!');
            }
            if (response == 3) {
                //$('#Res').show();
                //console.log("Es uno");
                alertify.success('Su aplicacion al cargo ha sido un exito!');
            }

        }

    });




});