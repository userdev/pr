<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
    }

    public function index() {

        $this->load->view('header');
        $data['user'] = $this->profile_model->get_user_data_by_ID($this->session->userdata('user_id'));
        $data['countries'] = $this->profile_model->get_all_countries();
        $data['cities'] = $this->profile_model->get_all_cities($data['user']->country_id);
        // $this->load->view('user/user_left_sitebar');
        $this->load->view('profile/profile_edit', $data);
        $this->load->view('footer');
    }

    public function saveuser() {
        //Ievadlauku nosacījumi
        $this->form_validation->set_rules('name', 'Vārds', 'trim|min_length[3]|max_length[45]|xss_clean');
        $this->form_validation->set_rules('surname', 'Uzvārds', 'trim|min_length[3]|max_length[45]|xss_clean');
        $data['person'] = new stdClass();
        $data['person']->name = $this->input->post('name');
        $data['person']->surname = $this->input->post('surname');
        $data['person']->birth = $this->input->post('birth');
        $data['person']->sex = $this->input->post('sex');
        $data['person']->job = $this->input->post('job');
        $data['person']->position = $this->input->post('position');
        $data['person']->education = $this->input->post('education');
        $data['person']->profession = $this->input->post('profession');
        $data['person']->country_id = $this->input->post('country');
        $data['person']->city_id = $this->input->post('city');
        $data['person']->adress_line = $this->input->post('adress_line');
        $this->profile_model->update_user_info($data);
    }

}

?>
