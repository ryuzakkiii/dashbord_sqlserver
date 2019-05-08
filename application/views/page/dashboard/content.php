
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Wallboard - Nomination_Aude</title>
</head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<!--recap-->
    <div class="jumbotron" style="background-color : none !important;">
        <div class="container-fluide">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color : #32CD32  !important; border-radius : 10px; ">
                                <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px; position:absolute;left:35%;top:-40px;border-radius:50%;"><img src="./public/images/call1.png" alt=""></div>
                                <div class="text-info text-center mt-3"><h4 style="color: white;">Total appel</h4></div>
                                <div class="text-info text-center mt-2" id="totappel"><p style="color: white;">0</p></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color :  #FF8C00  !important;border-radius : 10px; ">
                        
                            <div class="text-info text-center mt-3" ><h4 style="color: white;">Appel Qualifié</h4></div>
                            <div class="text-info text-center mt-2" id="aqualifie"><p style="color: white;">0</p></div>
                            <p class="pourcentage"></p>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color :  #FF6347  !important; border-radius : 10px; " >
                            <div class="text-info text-center mt-3"><h4 style="color: white;">Répondeur</h4></div>
                            <div class="text-info text-center mt-2" id="repondeur"><p style="color: white;">0</p></div>
                            <p class="pourcentage"></p>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color :  #4682B4  !important; border-radius : 10px; ">
                            <div class="text-info text-center mt-3"><h4 style="color: white;">Rappel</h4></div>
                            <div class="text-info text-center mt-2" id="rappel"><p style="color: white;">0</p></div>
                            <p class="pourcentage"></p>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color :  #808080  !important; border-radius : 10px;">
                            <div class="text-info text-center mt-3"><h4 style="color: white;">Injoignable</h4></div>
                            <div class="text-info text-center mt-2" id="injoign"><p style="color: white;">0</p></div>
                            <p class="pourcentage"></p>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-light mx-sm-1 p-3" style="background-color :  #3f2204  !important; border-radius : 10px;">
                            <div class="text-info text-center mt-3"><h4 style="color: white;">Test</h4></div>
                            <div class="text-info text-center mt-2" id="test"><p style="color: white;">0</p></div>
                            <p class="pourcentage"></p>

                        </div>
                    </div>
                </div>  
                
        
        </div>
        <input type="date" id="date" value="2018-10-05">

    </div>


    <!--filtre par produit-->
    <div class="row" style="padding : 20px;">
        <div class="col-1">
            <div class="container" id="card">
                <div class="row">

                </div>
            </div>
        </div>   
    </div>


<script>

$(document).ready(function(){

$('#date').change(function(){
    var daty = $(this).val();

    $.ajax({
    url : '<?php echo base_url();?>acceuil/filtre',
        method : "POST",
        data : {daty : daty},
        dataType: 'json',
        error : function(){
            alert('something wrong');
        },
        success : function(data){
            $('#totappel').find('p').remove();
            $('#totappel').append('<p style="color: white;"></p>');
            $('#totappel').find('p').remove();
            $('#totappel').append('<p style="color: white;"></p>'); 
            $('#aqualifie').find('p').remove();
            $('#aqualifie').append('<p style="color: white;"></p>');
            $('#repondeur').find('p').remove();
            $('#repondeur').append('<p style="color: white;"></p>');
            $('#rappel').find('p').remove();
            $('#rappel').append('<p style="color: white;"></p>');
            $('#injoign').find('p').remove();
            $('#injoign').append('<p style="color: white;"></p>');
            $('#test').find('p').remove();
            $('#test').append('<p style="color: white;"></p>');
            $('#totappel p').append(data['totappel'][0]['toppel']);
            $('#aqualifie p').append(data['aqualifie'][0]['aqualifie']);
            $('#repondeur p').append(data['repondeur'][0]['repondeur']);
            $('#rappel p').append(data['rappel'][0]['rappel']);
            $('#injoign p').append(data['injoign'][0]['injoign']);
            $('#test p').append(data['test'][0]['test']);
            $("#card .row").remove();
            $("#card").append('<div class="row"></div>');
            $.each(data['agent'], function(index, agent){
                console.log(agent);
                $('#card .row').append('<div class="col-2" ><div class="card border-info mb-3 text-center" id="kaka"><div class="card-body text-dark"><h4 class="card-title">' + agent['agentname'] + '</h4><h3 style="color: #3f2204;" class="card-text">' +  agent['qualifie'] + '</h3><p class="card-text">'+ agent['tous'] +'</p></div></div></div>'
                ) ;
            });
        }     

    })

});

});

</script>


