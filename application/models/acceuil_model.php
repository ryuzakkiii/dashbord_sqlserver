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

    public function filtre(){
        $detail = $this->db->query("SELECT [designation_produit]
        ,[prix_unitaire]
        ,[quantite]
    FROM [wallboard].[dbo].[produit]");

    $details = $detail->result();
    return $details;  
    }

    public function montre(){
        $montre = $this->db->query("SELECT [prenom_client]
        ,c.[designation_produit]
        ,c.[quantite_vendu]
        ,c.[date_commande]
    FROM [wallboard].[dbo].[commande] c 
    inner join [wallboard].[dbo].[client] cl on 
    cl.matricule_client = c.matricule_client
    inner join [wallboard].[dbo].[produit] p
      on p.designation_produit = c.designation_produit 
      and p.designation_produit = 'montre'");

      $montres = $montre->result();
      return $montres;
    }
}


