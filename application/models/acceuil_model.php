<?php

class Acceuil_model extends CI_Model {

    public function total_appel($daty){

        $totappels = $this->db->query("SELECT count(*) as toppel
        FROM ct_NOMINATION_AUDE where typecall is not null and calling_date = '$daty'");
        $totappel = $totappels->result();
        //var_dump($vendus);die();
         return $totappel;
    }

    public function appel_qualifié($daty){
        $aqualifies = $this->db->query("SELECT COUNT(*) as aqualifie
        FROM ct_NOMINATION_AUDE where typecall = '571_QUALIFICATION_TOTALE' and calling_date = '$daty'"); 
        $aqualifie = $aqualifies->result();
        return $aqualifie;
    }

    public function appel_test($daty){
        $tests = $this->db->query("SELECT COUNT(*) as test
        FROM ct_NOMINATION_AUDE where typecall = '571_TEST' and calling_date = '$daty'"); 
        $test = $tests->result();
        return $test;
    }

    public function repondeur($daty){
        $repondeurs = $this->db->query("SELECT COUNT(*) as repondeur
        FROM ct_NOMINATION_AUDE where typecall = '571_REPONDEUR' and calling_date = '$daty'"); 
        $repondeur = $repondeurs->result();
        return $repondeur;
    }

    public function rappel($daty){
        $rappels = $this->db->query("SELECT COUNT(*) as rappel
        FROM ct_NOMINATION_AUDE where typecall like '571_RAPPEL%' and calling_date = '$daty'"); 
        $rappel = $rappels->result();
        return $rappel;
    }
    

    public function injoignable($daty){
        $injoigns = $this->db->query("SELECT COUNT(*) as injoign
        FROM ct_NOMINATION_AUDE where typecall = '571_INJOIGNABLE' and calling_date = '$daty'"); 
        $injoign = $injoigns->result();
        return $injoign;
    }

    
    
    public function filtre($daty){
        $agents = $this->db->query(" SELECT 
        all_appel.agentname,tous, qualifie, repondeur, injoignable, rappel,rappelp
        FROM
        (
            select COUNT(typecall) as tous , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' and agentname is not null
             group by agentname 
           ) all_appel
        left join (
        select COUNT(typecall) qualifie , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' 
             and typecall = '571_QUALIFICATION_TOTALE'
             group by agentname
        ) qualifie on all_appel.agentname = qualifie.agentname
         left join (
        select COUNT(typecall) repondeur , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' 
            and typecall = '571_REPONDEUR'
             group by agentname
        ) repondeur on all_appel.agentname = repondeur.agentname
        left join (
        select COUNT(typecall) injoignable , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' 
            and typecall = '571_INJOIGNABLE'
             group by agentname
        ) injoignable on all_appel.agentname = injoignable.agentname
        left join (
        select COUNT(typecall) rappel , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' 
            and typecall = '571_RAPPEL'
             group by agentname
        ) rappel on all_appel.agentname = rappel.agentname
        left join (
        select COUNT(typecall) rappelp , agentname
             FROM ct_NOMINATION_AUDE where calling_date = '$daty' 
            and typecall = '571_RAPPEL_PROGRAMME'
             group by agentname
        ) rappelp on all_appel.agentname = rappelp.agentname
        order by qualifie desc");
        $agent = $agents->result();
        return $agent;
    }

    

    public function agent(){
        $noms = $this->db->query("select distinct agentname from [easy].[dbo].[ct_NOMINATION_AUDE] where agentname is not null");
        $nom = $noms->result();
        return $nom;
    }

    /*public function produit(){
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

    public function filtre_par_date($daty){
        $date = array();
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('client', 'commande.matricule_client = client.matricule_client');
        $this->db->where('commande.date_commande', $daty['date_commande']);
        
        $q = $this->db->get();
        $date = $q->result_array();

        return $date;

    }*/


}


