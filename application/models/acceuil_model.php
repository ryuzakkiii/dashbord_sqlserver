<?php

class Acceuil_model extends CI_Model {

    public function produit_and_reste(){


        $vendu = $this->db->query("SELECT c.quantite_vendu as quantite_vendu ,p.quantite as quantite, p.quantite-c.quantite_vendu as reste
        FROM [wallboard].[dbo].[commande] c
        INNER JOIN [wallboard].[dbo].[produit] p ON c.designation_produit = p.designation_produit");
        $vendus = $vendu->result();
        //var_dump($vendus);die();
        
        $valeur = $this->db->query("SELECT  [designation_produit],[quantite] FROM [wallboard].[dbo].[produit]");
        $result =  $valeur->result();
        $data = array_merge($result,$vendus);

        var_dump($data);die();

        return $data;
    }
}


