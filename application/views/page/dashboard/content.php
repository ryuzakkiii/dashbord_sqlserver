
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Document</title>
</head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="jumbotron" style="background-color : #1E90FF;">

<!--recap-->

<?php        
        $total_stock = 0;
        $total_vendu = 0;
        $total_montant = 0;
        $total_reste = 0;
        foreach ($valeur as $value): 
            $total_stock += $value->quantite;
            $total_vendu += $value->quantite_vendu;
            $total_montant += $value->montant;
            $total_reste += $value->reste; 
        endforeach;
    ?>
        <div class="container-fluide">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px; position:absolute;left:35%;top:-40px;border-radius:50%;"><img src="./public/images/stocks.png" alt=""></div>
                            <div class="text-info text-center mt-3"><h4>Stock</h4></div>
                            <div class="text-info text-center mt-2"><?php echo $total_stock;?></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px;position:absolute;left:35%;top:-40px;"><img src="./public/images/vendu.jpg" style="height : 100%;width :100%; alt=""></div>
                            <div class="text-info text-center mt-3"><h4>Total Vendu</h4></div>
                            <div class="text-info text-center mt-2"><?php echo $total_vendu;?></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px; position:absolute;left:35%;top:-40px;border-radius:50%;"><img src="./public/images/money.png" alt=""></div>
                            <div class="text-info text-center mt-3"><h4>Caisse</h4></div>
                            <div class="text-info text-center mt-2"><?php echo $total_montant;?></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px; position:absolute;left:35%;top:-40px;"><img src="./public/images/reste_stock.jpg" alt=""></div>
                            <div class="text-info text-center mt-3"><h4>Reste Stock</h4></div>
                            <div class="text-info text-center mt-2"><?php echo $total_reste;?></div>
                        </div>
                    </div>
                </div>          
        </div>
        </div>

        <!--filtre par produit-->


        <div class="container-fluide">
            <div class="row">
            <div class="col-4">                
                    <h4> Detail Commande par produit </h4>

                    <div class="card  mx-sm p-3" id="filtre_prod">


                                <form method="post">
                        
                                <select id="filtre">
                                <?php foreach($detail as $details) : ?>
                                    <option id="produit" value="<?php echo $details->designation_produit?>"><?php echo $details->designation_produit?></option>
                                <?php endforeach;?>  
                                </select>

                                <br>
                                    <table id="prod" class="table table-sm" > 
                                        <thead>
                                            <tr>
                                                <th>Nom client</th>
                                                <th>Produit</th>
                                                <th>Nombre</th>
                                                <th>Date commande</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <tr>
                                    
                                            </tr>
                                        </tbody>
                                    </table> 
                                </form>
                    </div> 

                <!--filtre par date-->

                    <h4> Detail Commande par date </h4>

                    <div class="card  mx-sm p-3" id="filtre_date">
                        <form method="post">                        
                            <input type="date" id="date"  value="2019-04-29">
                                    <table id="prod_date" class="table table-sm" > 
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Produit</th>
                                                <th>Nom client</th>
                                                <th>Nombre</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <tr>
                                    
                                            </tr>
                                        </tbody>
                                    </table> 
                        </form>
                    </div> 
                </div>
                <div class="col-8">
                    <h4 data-toggle="collapse" href="#collapse1"><button type="button" class="list-group-item list-group-item-action active">
                    Detail Produit
                    </button></h4>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                            <div class="row" id="recap_prod">
                                <?php foreach ($valeur as $resultat): ?>

                                    <div class="col-2">
                                        <div class="card bg-light mb-3">
                                            <div class="card-header"><?php echo $resultat->designation_produit;?></div>
                                            <div class="card-body">
                                                <p>Stock : <?php echo $resultat->quantite;?></p>
                                                <p>Vendu : <?php echo $resultat->quantite_vendu;?></p>
                                                <p>Montant : <?php echo $resultat->montant;?></p>
                                                <p>Reste : <?php echo $resultat->reste;?></p>
                                            </div>
                                        </div>            
                                    </div>
                                <?php endforeach;?>            

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        </div>
</div>   

    
</div>
<script>

//filtre par date
$(document).ready(function(){

$('#date').change(function(){
    var  date_commande = $(this).val();

    $.ajax({
        url : '<?php echo base_url();?>acceuil/filtre_par_date',
        method : "POST",
        data : {date_commande: date_commande},
        dataType: 'json',
        error : function(){
            alert('something wrong');
        },
        success : function(date){
            $('#prod_date').find('tbody').remove();
            $('#prod_date').append('<tbody style="font-size : 12px;"></tbody>');
            $.each(date,function(index,data){  
                $('#prod_date').find('tbody').append('<tr><td>' + data['date_commande'] + '</td><td>' + data['designation_produit'] + '</td><td>' + data['nom_client'] + '</td><td>' + data['quantite_vendu'] + '</td></tr>') ;
        });        
        }
        

    })

});
$('#filtre').change(function(){
  var designation_produit  = $(this).val();

  $.ajax({
    url: '<?php echo base_url();?>acceuil/filtre_par_produit',
    method : "POST",
    data : {designation_produit: designation_produit},
    dataType : 'json',
    error: function() {
      alert('Something is wrong');
    },
    success: function(valeur){
      $('#prod').find('tbody').remove();
      $('#prod').append('<tbody style="font-size : 12px;"></tbody>');
      $.each(valeur,function(index,data){  
        $('#prod').find('tbody').append('<tr><td>' + data['nom_client'] + '</td><td>' + data['designation_produit'] + '</td><td>' + data['quantite_vendu'] + '</td><td>' + data['date_commande'] + '</td></tr>') ;
      });
      
    }
  });

});
});
</script>
