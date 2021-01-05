$(function() 
{
  	//select city
    $.ajax({
        type: 'post',
        url: '../php/GetListCitys.php',
        success: function(response) {
            $('.HowCity select').html(response).fadeIn();
        }
    });
    //Change City
    $("select[name=Hocity").change(function() {
        Cityy = $(this).val();
        console.log("Cityy " + Cityy );
    });
    //select listrado de profesiones
    $.ajax({
        type: 'post',
        url: '../php/GetListPro.php',
        success: function(response) {
            $('.HowProf select').html(response).fadeIn();
        }
    });
   
});