<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ads extends CI_Controller
{
	function index()
    {
        if ($this->ion_auth->is_admin()) {
        	$this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

			$config['per_page'] = 2;
            $this->load->model('admin_ads_model');
            $data['ads'] = $this->admin_ads_model->get_ads($config['per_page'], $this->uri->segment(3));
            
            $this->load->library('pagination');
            $config['base_url'] = base_url().'admin/announcements/page';
			$config['total_rows'] = 3;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();


            $this->load->view('admin/announcements/index_view', $data);


            $this->load->view('footer_view');

        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }
}