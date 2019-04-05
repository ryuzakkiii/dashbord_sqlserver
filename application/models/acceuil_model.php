<?php

class Acceuil_model extends CI_Model {

    public function produit_and_reste(){


        $vendu = $this->db->query("SELECT COALESCE(c.designation_produit,p.designation_produit) as produit, p.prix_unitaire ,p.quantite,
      COALESCE(c.quantite_vendu , 0) as quantite_vendu ,
      COALESCE(p.quantite-c.quantite_vendu, p.quantite) as reste
    FROM [wallboard].[dbo].[produit] p full outer join [wallboard].[dbo].[commande] c on p.designation_produit = c.designation_produit ");
        $vendus = $vendu->result();
        //var_dump($vendus);die();
         return $vendus;
    }
}


