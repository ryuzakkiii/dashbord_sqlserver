<?php

class Acceuil_model extends CI_Model {

    public function produit_and_reste(){


        $vendu = $this->db->query("SELECT COALESCE(c.[designation_produit], p.[designation_produit]) as designation_produit
        ,COALESCE(SUM(c.[quantite_vendu]), 0) as quantite_vendu,
        p.[quantite],   
        COALESCE(p.quantite-SUM(c.[quantite_vendu]), p.quantite) as reste,
        COALESCE(p.prix_unitaire*SUM(c.[quantite_vendu]), 0) as montant
        FROM [wallboard].[dbo].[commande] c full outer join [wallboard].[dbo].[produit] 
        p on c.designation_produit = p.designation_produit
        group by p.quantite, p.designation_produit, c.designation_produit, p.prix_unitaire");
        $vendus = $vendu->result();
        //var_dump($vendus);die();
         return $vendus;
    }
}


