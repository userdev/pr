<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index($username = '', $email = '', $type = '', $logged = '') {
        $this->load->view('header');
        $data['user'] = new stdClass();
        if ($type == 'login') {
            $data['user']->username_log = $username;
            $data['user']->email = $email;
        } else {
            $data['user']->username_log = $username;
            $data['user']->email = $email;
        }
        $this->load->view('user/index', $data);
        $this->load->view('footer');
    }

    public function saveuser() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        //second validation if username or email is taken
        if ($this->user_model->check_username($username))
            $username = FALSE;
        if ($this->user_model->check_email($email))
            $email = FALSE;
        //Ievadlauku nosacījumi
        $this->form_validation->set_rules('username', 'Lietotājvārds', 'trim|required|min_length[3]|max_length[45]|xss_clean');
        $this->form_validation->set_rules('password', 'Parole', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email', 'E-pasts', 'trim|required|valid_email');
        //Ja nav izpildījušies ievadlauku nosacījumu vai epasts vai lietotājvārds jau ir aiņemts
        if ($this->form_validation->run() == FALSE || $username == FALSE || $email == FALSE) {
            $this->load->view('header');
            $data['user'] = new stdClass();
            $data['user']->username = $username;
            $data['user']->email = $email;
            $this->load->view('user/index', $data);
            $this->load->view('footer');
        } else {   //Izsaucu saglabāšanas metodi
            $this->user_model->save_user($username, $this->input->post('password'), $email);
            //Login and session
            $this->user_model->login($username, $this->input->post('password'));
            redirect('/profile');
        }
    }

    public function takelogin() {
        $username = $this->input->post('username_log');
        $password = $this->input->post('password_log');
        //Validation rules
        $this->form_validation->set_rules('username_log', 'Lietotājvārds', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password_log', 'Parole', 'trim|required');
        $userFound = TRUE;
        $formValidation = $this->form_validation->run();
        if ($formValidation) {
            $userFound = $this->user_model->login($username, $password);
        }
        if (!$userFound || !$formValidation) {
            $this->load->view('header');
            $data['user'] = new stdClass();
            $data['user']->username_log = $username;
            if (!$userFound) {
                $data['user']->userFound = FALSE;
            }
            $this->load->view('user/index', $data);
            $this->load->view('footer');
        } else {
            redirect('/profile');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/user/index');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
