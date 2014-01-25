<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function check_username($username) {
        $query = $this->db->select('user_ID')->from('users')
                ->where('nick_name', $username);
        $results = $query->get()->result();
        //Ja nav šāda lietotājvārda atgriž FALSE
        if (count($results) == 0)
            return FALSE;
        else
            return TRUE; //Ja jau nav šāds lietotājvārds
    }

    public function check_email($email) {
        $query = $this->db->select('user_ID')->from('users')
                ->where('email', $email);
        $results = $query->get()->result();
        //Ja nav šāda lietotājvārda atgriž FALSE
        if (count($results) == 0)
            return FALSE;
        else
            return TRUE; //Ja jau nav šāds lietotājvārds
    }

    function save_user($username, $password, $email) {
        $data = array(
            'nick_name' => $username,
            'password' => $this->_prep_password($password),
            'email' => $email
        );
        $this->db->insert('users', $data);
    }

    function login($username, $password) {
        //Meklēju lietotāju, pēc lietotājvārda un paroles
        $query = $this->db->select('user_ID')->from('users')
                ->where('nick_name', $username)
                ->where('password', $this->_prep_password($password))
                ->limit(1, 0);
        $results = $query->get()->result();

        if (count($results) > 0) {
            //Sessijas datu sagatavošana
            $newdata = array(
                'username' => $username,
                'user_ID' => $results[0]->user_ID,
                'logged_in' => TRUE
            );
            //Sessijas izveidošana
            $this->session->set_userdata($newdata);


            return true;
        }
        //Ja lietotājs nav atrasts atgriežu FALSE
        return false;
    }

    
    
      function _prep_password($password) {
        return sha1($password . $this->config->item('encryption_key'));
    }
    
      public function get_user_data_by_ID($user_ID) {
        $query = $this->db->select('nick_name, email, info_about, info_job, gender, name, surname, birthday, show_age, adress, reg_date, pic_url')
                        ->from('users')->where('user_ID', $user_ID)->limit(1, 0);
        $results = $query->get()->result();
        if (count($results) > 0) {//lietotājs ir atrasts
            $this->nick_name = $results[0]->nick_name;
            $this->email = $results[0]->email;
            $this->info_about = $results[0]->info_about;
            $this->info_job = $results[0]->info_job;
            $this->name = $results[0]->name;
            $this->gender = $results[0]->gender;
            $this->surname = $results[0]->surname;
            $this->birthday = $results[0]->birthday;
            $this->show_age = $results[0]->show_age;
            $this->adress = $results[0]->adress;
            $this->reg_date = $results[0]->reg_date;
            $this->pic_url = $results[0]->pic_url;
        }else
            $this->username = 0;
        return $this;
    }
    public function update_user_info($user_ID, $name, $surname){
        $this->db->set('name', $name)->where('user_ID', $user_ID);
    }
    
    
    
}

?>