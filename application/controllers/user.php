<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('user/index');
        $this->load->view('footer');
    }

    public function saveuser() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        if ($this->user_model->check_username($username))
            $username = FALSE;
        if ($this->user_model->check_email($email))
            $email = FALSE;
        //Ievadlauku nosacījumi
        $this->form_validation->set_rules('username', 'Lietotājvārds', 'trim|required|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Parole', 'trim|required');
        $this->form_validation->set_rules('email', 'E-pasts', 'trim|required|valid_email');
        //Ja nav izpildījušies ievadlauku nosacījumu vai epasts vai lietotājvārds jau ir aiņemts
        if ($this->form_validation->run() == FALSE || $username == FALSE || $email == FALSE) {
            $this->load->view('header');
            $data['user']->username = $username;
            $data['user']->email = 'E-pasts';
            // $data['user']->password = 'Parole';
            $this->load->view('left_sitebar');
            $this->load->view('user/index', $data);
            $this->load->view('footer');
        } else {   //Izsaucu saglabāšanas metodi
            $this->user_model->save_user($username, $this->input->post('password'), $email);
            //Login and session
            $this->user_model->login($username, $this->input->post('password'));
            redirect('/my_profile');
        }
    }

    public function takelogin() {
        //POST datu saņemšana
        $username = $this->input->post('username_log');
        $password = $this->input->post('password_log');
        //Formas nosacījumi
        $this->form_validation->set_rules('username_log', 'Lietotājvārds', 'trim|required|min_length[3]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password_log', 'Parole', 'trim|required');
        //Ja nosacījumi nav izpildījušies
        if ($this->form_validation->run() == FALSE || $this->user_model->login($username, $password) == FALSE) {
            $this->load->view('header');
            $data['user']->username = $username;
            $this->load->view('user/index', $data);
            $this->load->view('footer');
        } else {
            //Medode, kas pārbauda vai ir šāds lietotājs un izveido sessiju

            redirect('/profile');
        }
    }

    public function logout() {
        //Dzēšam sessiju
        $this->session->sess_destroy();
        //Pāradresē uz ielogošanos
        redirect('/user/index');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
