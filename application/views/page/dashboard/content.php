<div class="container">
    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Stock</th>
                <th scope="col">Vendu</th>
                <th scope="col">Montant</th>
                <th scope="col">Reste</th>     
                <th scope="col">Client</th>                         
            </tr>
        </thead>
        <?php if( isset($valeur) && count($valeur) ): ?>
        <?php foreach ($valeur as $resultat): ?>
            <tbody>
            <tr>
                <td><?php echo $resultat->produit;?></td>
                <td><?php echo $resultat->quantite;?></td>
                <td><?php echo $resultat->quantite_vendu;?></td>
                <td><?php echo $resultat->montant;?></td>
                <td><?php echo $resultat->reste;?></td>   
                <td><?php echo $resultat->nom_client;?></td>   
                               
            </tr> 
            </tbody>
         <?php endforeach;?>
        <?php endif;?>
    </table>
</div>




