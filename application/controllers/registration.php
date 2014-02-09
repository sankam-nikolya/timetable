<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //Просто выводим форму регистрации
    public function show_reg()
    {
        if (!$this->ion_auth->logged_in()) {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->view('header_view');
            $this->load->view('menu_view');
            $this->load->view('registration/registration_user_view');
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url());
        }
    }

    public function add_user()
    {
        //проверяем зарегистрированн ли пользователь\

        if (!$this->ion_auth->logged_in()) {
            $username = $this->input->post('login');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $additional_data = array();

            if ($this->ion_auth->register($username, $password, $email, $additional_data)) {
                $this->load->view('header_view');
                $this->load->view('menu_view');
                $this->load->view('registration/success_reg_view');
                $this->load->view('footer_view');
            } else {
                $this->load->view('header_view');
                $this->load->view('menu_view');
                $this->load->view('registration/fail_reg_view');
                $this->load->view('footer_view');
            }
        } else {
            header("Location: " . base_url());
        }

    }
    //add

}
/* End of file welcome.php */