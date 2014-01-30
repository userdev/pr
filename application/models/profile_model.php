<?php

class Profile_model extends MY_model {

    function __construct() {
        parent::__construct();
    }

    function update_user_info($person) {
        echo $this->session->userdata('user_id');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $person['person']);
    }

    function save_user($username, $password, $email) {
        $data = array(
            'nick_name' => $username,
            'password' => $this->_prep_password($password),
            'email' => $email
        );
        $this->db->insert('users', $data);
    }

    public function get_user_data_by_ID($user_ID) {
        $query = $this->db->select('nick, email, name, surname, birth, sex, reg_date, job, position, profession, education, pic_url')
                        ->from('users')->where('user_ID', $user_ID)->limit(1, 0);
        $results = $query->get()->result();
        if (count($results) == 0) {//user is found
            $this->username = 0;
        }
        return $results[0];
    }

}
