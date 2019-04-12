
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<div class="jumbotron" style="background-color : #1E90FF">

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
<div class="container-fluide" style="font_size :10px;">

    <div class="row" style="padding :50px;">
            <div class="col-sm-7">
            <div class="row" style="font-size :12px; overflow : auto;">
            <?php foreach ($valeur as $resultat): ?>

                <div class="col-3">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
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
            

            <div class="col-sm-5">
                    <div class="card  mx-sm p-3" style="height : 100%; overflow : auto;">

                    <h4 style=" color :#778899"> Detail Commande par produit </h4>

                        <form method="post">
                
                        <select id="filtre">
                        <?php foreach($detail as $details) : ?>
                            <option id="produit" value="<?php echo $details->designation_produit?>"><?php echo $details->designation_produit?></option>
                        <?php endforeach;?>  
                        </select>

                        </form>
                        <br>
                            <table id="prod" class="table table-sm" > 
                                <thead style="background-color: #FFC0CB ;color: white; ">
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
            </div> 
    </div>         
</div>
    

        

    
</div>
<script>
$(document).ready(function(){

$('#filtre').change(function(){
  var designation_produit  = $(this).val();

  $.ajax({
    url: '<?php echo base_url();?>acceuil/filtre',
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















