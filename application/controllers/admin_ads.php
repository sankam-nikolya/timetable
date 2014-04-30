<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ads extends CI_Controller
{
	function index()
    {
        if ($this->ion_auth->is_admin()) {
        	$this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

			$config['per_page'] = 10;
            $this->load->model('admin_ads_model');
            $data['ads'] = $this->admin_ads_model->get_ads($config['per_page'], $this->uri->segment(3));

            $this->load->library('pagination');
            $config['base_url'] = base_url().'admin/announcements';
			$config['total_rows'] = $this->admin_ads_model->count_ads();
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['cur_tag_open'] = '<li><a style="background-color: #eeeeee">';
            $config['cur_tag_close'] = '</li></a>';
            $config['num_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();


            $this->load->view('admin/announcements/index_view', $data);


            $this->load->view('footer_view');

        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

            $this->load->view('admin/announcements/create_view');

            $this->load->view('footer_view');

        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_db()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_ads_model');

            $this->admin_ads_model->add_ads($this->input->post());
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function edit_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

            $this->load->view('admin/announcements/edit_view');

            $this->load->view('footer_view');

        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function edit_data_json($id)
    {
        if ($this->ion_auth->is_admin()) {

            $this->load->model('admin_ads_model');
            $data = $this->admin_ads_model->get_ad($id);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));



        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function update_db($id)
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_ads_model');

            $this->admin_ads_model->update_ad($id, $this->input->post());
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function delete_db($id)
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_ads_model');

            $this->admin_ads_model->delete_ad($id);
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }
}
