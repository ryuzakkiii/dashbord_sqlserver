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

    public function produit(){
        $detail = $this->db->query("SELECT [designation_produit]
        ,[prix_unitaire]
        ,[quantite]
    FROM [wallboard].[dbo].[produit]");

    $details = $detail->result();
    return $details;  
    }


    public function filtre_par_produit($var){
        $valeur = array();
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('client', 'commande.matricule_client = client.matricule_client');
        $this->db->join('produit', 'produit.designation_produit = commande.designation_produit');
        $this->db->where('produit.designation_produit' , $var['designation_produit']);
        $this->db->order_by('date_commande', 'DESC');
        $q = $this->db->get();

        $valeur = $q->result_array();

        return $valeur;

    
    }

    public function filtre_par_date($dates){
        $date = array();
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('client', 'commande.matricule_client = client.matricule_client');
        $this->db->where('commande.date_commande', $dates['date_commande']);
        
        $q = $this->db->get();
        $date = $q->result_array();

        return $date;

    }


}


