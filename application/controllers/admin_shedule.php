<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shedule extends CI_Controller {

    public function index()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->model('statistics_model');
            $data['short_num_pars'] = $this->statistics_model->get_short_num_pars();
            $data['short_group_num_pars'] = $this->statistics_model->get_short_group_num_pars();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/index_view', $data);

            $this->load->view('footer_view');
        }
    }

    public function add_datepick_view()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/add_datepick_view');
            $this->load->view('footer_view');
        }
    }

    function add_shedule_view()
    {
        $this->load->model('admin_model');

        $data['subjects'] = $this->admin_model->get_subjects();
        $data['timing'] = $this->admin_model->get_time();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        for ($i = 0; $i < count($data['groups']); $i++)
        {
            $data['bindingSubjectGroup'][$i] = $this->admin_model->get_bindingSubjectGroup($data['groups'][$i]['idgroups']);
        }
        if (isset($_POST['datepick']))
        {
            $datepick = $_POST['datepick'];
            $from_to = explode(":", $datepick);
            $date_end = $from_to[1];
            $date_start = $from_to[0];
            while($date_start <= $date_end)
            {
                $date_start = date('Y-m-d', strtotime($date_start));
                $array_date = array('date' => $date_start);
                $this->admin_model->insert_days($array_date);
                $date_start = date('Y-m-d', strtotime($date_start) + 86400);
            }
            $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
            $this->load->view('admin/shedule/add_view', $data);
        }
    }

    function edit_datepick_view()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/edit_datepick_view');
            $this->load->view('footer_view');
        }
    }

    function edit_shedule_view()
    {
        $this->load->model('admin_model');

        $data['subjects'] = $this->admin_model->get_subjects();
        $data['timing'] = $this->admin_model->get_time();
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');

        for ($i = 0; $i < count($data['groups']); $i++)
        {
            $data['bindingSubjectGroup'][$i] = $this->admin_model->get_bindingSubjectGroup($data['groups'][$i]['idgroups']);
        }
        if (isset($_POST['datepick']))
        {
            $datepick = $_POST['datepick'];
            $from_to = explode(":", $datepick);
            $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
            $data['bindings'] = $this->admin_model->get_binding_info($data['days'][0]['iddays'], end($data['days'])['iddays']);
            $this->load->view('admin/shedule/edit_view', $data);
        }
        $this->load->view('footer_view');
    }

    function add_db_binding()
    {
        $this->load->model('admin_model');
        $bindings = $this->input->post('binding_select');
        $exploded = array();
        foreach ($bindings as $item)
        {
            array_push($exploded , explode(":", $item));
        }
        foreach ($exploded as $item)
        {
            $data = array(
                'iddays' => $item[0],
                'idgroups' => $item[1],
                'idlessons_time' => $item[2],
                'type' => $item[3],
                'idsubjects' => $item[4]
            );
            $this->admin_model->insert_binding($data);
        }
        header("Location: ".base_url().'admin/shedule/add');
    }

    function update_db_binding()
    {
        $this->load->model('admin_model');
        $bindings = $this->input->post('binding_select');
        $bindings_audit = $this->input->post('binding_audit_select');
        $exploded = array();
        foreach ($bindings as $item)
        {
            array_push($exploded , explode(":", $item));
        }
        foreach ($exploded as $item)
        {
            $this->admin_model->delete_iddays_from_bidning($item[0]);
        }
        foreach ($exploded as $item)
        {
            $data = array(
                'iddays' => $item[0],
                'idgroups' => $item[1],
                'idlessons_time' => $item[2],
                'type' => $item[3],
                'idsubjects' => $item[4]
            );
            $this->admin_model->insert_binding($data);
        }
        header("Location: ".base_url().'admin/shedule/edit/?response=success');
    }

    function teachers_list_view()
    {
        $this->load->model('admin_model');
        $data['teachers'] = $this->admin_model->get_teachers();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/teachers_list_view', $data);
        $this->load->view('footer_view');
    }

    function teacher_edit_view()
    {
        $this->load->model('admin_model');
        $data['info'] = $this->admin_model->get_teacher_info($this->input->get('id'));
        $data['subjects'] = $this->admin_model->get_subjects();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/edit_teacher_view', $data);
        $this->load->view('footer_view');
    }

    function teacher_add_view()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/add_teacher_view');
        $this->load->view('footer_view');
    }

    function subjects_list_view()
    {
        $this->load->model('admin_model');
        $data['subjects'] = $this->admin_model->get_subjects();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/subjects_list_view', $data);
        $this->load->view('footer_view');
    }

    function subject_edit_view()
    {
        $this->load->model('admin_model');
        $data['info'] = $this->admin_model->get_subject_info($this->input->get('id'));
        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/edit_subject_view', $data);
        $this->load->view('footer_view');
    }

    function subject_add_view()
    {
        $this->load->model('admin_model');

        $data['groups'] = $this->admin_model->get_groups();

        $this->load->view('admin/header_view');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/lists/add_subject_view', $data);
        $this->load->view('footer_view');
    }

    function update_db_subject()
    {
        $this->load->model('admin_model');

        $data = array(
            'full_name' => $this->input->post('full_name'),
            'name'      => $this->input->post('name'),
            'active'    => $this->input->post('active')
        );
        $this->admin_model->update_subject($this->input->get('id'), $data);
        header("Location: ".base_url().'admin/subjects/?response=success');
    }

    function add_db_subject()
    {
        $this->load->model('admin_model');

        $data = array(
            'full_name' => $this->input->post('full_name'),
            'name'      => $this->input->post('name'),
            'active'    => $this->input->post('active')
        );
        $this->admin_model->insert_subject($data);
        header("Location: ".base_url().'admin/subjects/?response=success');
    }

    function delete_db_subject()
    {
        $this->load->model('admin_model');
        $this->admin_model->delete_subject($this->input->get('id'));
        header("Location: ".base_url().'admin/subjects/?response=delete_success');
    }

    function update_db_teacher()
    {
        $this->load->model('admin_model');

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'patronymic' => $this->input->post('patronymic'),
            'visibility' => $this->input->post('visibility'),
        );
        $this->admin_model->update_teacher($this->input->get('id'), $data);
        header("Location: ".base_url().'admin/teachers/?response=success');
    }

    function add_db_teacher()
    {
        $this->load->model('admin_model');

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'patronymic' => $this->input->post('patronymic'),
            'visibility' => $this->input->post('visibility'),
        );
        $this->admin_model->insert_teacher($data);
        header("Location: ".base_url().'admin/teachers/?response=success');
    }

    function delete_db_teacher()
    {
        $this->load->model('admin_model');
        $this->admin_model->delete_teacher($this->input->get('id'));
        header("Location: ".base_url().'admin/teachers/?response=delete_success');
    }

    public function announcements()
    {
        if ($this->tank_auth->get_user_id() == 1)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('footer_view');
        }
    }
}