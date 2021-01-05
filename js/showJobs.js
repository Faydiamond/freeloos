   var profesion=1;
            $("select[name=Howprof").change(function()
            {
                profesion = $(this).val();
                console.log("profesion " + profesion );
                Load_Jobs (0,profesion);
            });
        $(function() 
        {
            Load_Jobs (0,profesion);
            
        });

        //$(document).ready();
        function Load_Jobs(limit,pro)
        {
             //change profession
             if (pro == "DEFAULT") 
             {
                alertify.warning('Por favor elige una profesion');
             }else if (pro != "")
             {
                //alert ("limit: "+ limit);
                var DataJo = "limit=" + limit+ "&pro=" +pro;
                console.log("DataJo: " + DataJo) ;
                //parameter : value
                $.ajax
                ({
                    type: 'post',
                    url: '../php/LoadJobs.php',
                    data: DataJo,
                    beforeSend: function()
                    {
                        console.log('Antes de procesar'+ DataJo );
                    },
                    success: function(response) 
                    {
                        $('#LoadJobss').html(response) ;
                    }
                });
             }
           
            
    


        }