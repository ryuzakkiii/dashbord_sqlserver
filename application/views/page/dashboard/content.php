<style>
.card{
    width : 200px;
    text-align : center;
}
.card:hover{
    background-color : #C3D7D7;
    width : 210px;
    height : 110px;
    cursor : pointer ;
}
</style>
<div class="container">
    <div>
    <form method="post">
    
        <select name="choix[]">
        <?php foreach($detail as $details) : ?>
            <option value="<?php echo $details->designation_produit?>"><?php echo $details->designation_produit?></option>
        <?php endforeach;?>  
        </select>
        <input type = 'submit' name = 'submit' value = "voir">
    
    </form>

    <?php
        if  (isset($_POST['submit']))
        {
            if (isset($_POST['choix'])){
                foreach ($_POST['choix'] as $choix):
                    echo('you selected '.$choix);
                endforeach;
            }
        }
    
    
    ?>
    
    
            
    </div>
    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Stock</th>
                <th scope="col">Vendu</th>
                <th scope="col">Montant</th>
                <th scope="col">Reste</th>   
            </tr>
        </thead>
        <?php foreach ($valeur as $resultat): ?>
            <tbody>
            <tr>
                <td><?php echo $resultat->designation_produit;?></td>
                <td><?php echo $resultat->quantite;?></td>
                <td><?php echo $resultat->quantite_vendu;?></td>
                <td><?php echo $resultat->montant;?></td>
                <td><?php echo $resultat->reste;?></td>   
            </tr> 
            </tbody>
         <?php endforeach;?>
    </table>

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
        <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">Total Stock</h5>
                    <p class="card-text"><?php echo $total_stock;?></p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">Total Vendu</h5>
                    <p class="card-text"><?php echo $total_vendu;?></p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title"> Montant Total</h5>
                    <p class="card-text"><?php echo $total_montant;?> Ariary</p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">reste stock</h5>
                    <p class="card-text"><?php echo $total_reste;?></p>
                </div>
                </div>
            </div>
        </div>          
        </div>       
</div>
