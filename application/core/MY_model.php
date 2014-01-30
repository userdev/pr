<?php

class MY_model extends CI_Model {

    function __construct() {
        parent::__construct();

        
    }
    
    public function check_username($username) {
        $query = $this->db->select('user_id')->from('users')
                ->where('nick', $username);
        $results = $query->get()->result();
        //Ja nav šāda lietotājvārda atgriž FALSE
        if (count($results) == 0)
            return FALSE;
        else
            return TRUE; //Ja jau nav šāds lietotājvārds
    }

    public function check_email($email) {
        $query = $this->db->select('user_id')->from('users')
                ->where('email', $email);
        $results = $query->get()->result();
        //Ja nav šāda lietotājvārda atgriž FALSE
        if (count($results) == 0)
            return FALSE;
        else
            return TRUE; //Ja jau nav šāds lietotājvārds
    }
    
    
}