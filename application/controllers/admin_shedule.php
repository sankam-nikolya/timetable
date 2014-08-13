<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_shedule extends CI_Controller
{    
    function index()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('statistics_model');
            $data['short_num_pars'] = $this->statistics_model->get_short_num_pars();
            $data['short_group_num_pars_0'] = $this->statistics_model->get_short_group_num_pars_0();
            $data['short_group_num_pars_1'] = $this->statistics_model->get_short_group_num_pars_1();
            $data['short_group_num_pars_2'] = $this->statistics_model->get_short_group_num_pars_2();

            $data['n_short_num_pars'] = $this->statistics_model->n_get_short_num_pars();
            $data['n_short_group_num_pars_0'] = $this->statistics_model->n_get_short_group_num_pars_0();
            $data['n_short_group_num_pars_1'] = $this->statistics_model->n_get_short_group_num_pars_1();
            $data['n_short_group_num_pars_2'] = $this->statistics_model->n_get_short_group_num_pars_2();

            
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/index_view', $data);

            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_datepick_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/add_datepick_view');
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_shedule_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data['subjects'] = $this->admin_model->get_subjects();
            $data['timing'] = $this->admin_model->get_time();
            $data['groups'] = $this->admin_model->get_groups();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');

            for ($i = 0; $i < count($data['groups']); $i++) {
                $data['bindingSubjectGroup'][$i] = $this->admin_model->get_bindingSubjectGroup($data['groups'][$i]['idgroups']);
            }
            if (isset($_POST['datepick'])) {
                $datepick = $_POST['datepick'];
                $from_to = explode(":", $datepick);
                $date_end = $from_to[1];
                $date_start = $from_to[0];

                while ($date_start <= $date_end) {
                    $date_start = date('Y-m-d', strtotime($date_start));
                    $array_date = array('date' => $date_start);
                    if (count($data['days'] = $this->admin_model->get($date_start, $date_start)) > 0) {

                    } else {
                        $this->admin_model->insert_days($array_date);
                    }
                    $date_start = date('Y-m-d', strtotime($date_start) + 86400);
                }
                $data['days'] = $this->admin_model->get($from_to[0], $from_to[1]);
                $end = end($data['days']);
                if ($end['iddays'] < $data['days'][0]['iddays']) {
                    $data['bindings'] = $this->admin_model->get_binding_info($end['iddays'], $data['days'][0]['iddays']);
                } else {
                    $data['bindings'] = $this->admin_model->get_binding_info($data['days'][0]['iddays'],$end['iddays']);
                }
                $data['pars'] = array();
                $this->load->view('admin/shedule/edit_view', $data);
            }
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function edit_datepick_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/shedule/edit_datepick_view');
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }


    function edit_shedule_view()
    {
        if ($this->ion_auth->is_admin()) 
        {
            $this->load->model('admin_model');

            $data['timing']   = $this->admin_model->get_time();
            $data['groups']   = $this->admin_model->get_groups();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            if (isset($_GET['from'])) 
            {
                $data['days'] = $this->admin_model->get($_GET['from'], $_GET['to']);
                $data['pars'] = $this->admin_model->get_binding_info($_GET['from'], $_GET['to']);
                $data['events'] = $this->admin_model->get_event($_GET['from'], $_GET['to']);
                $this->load->view('admin/shedule/edit_view', $data);
            }
            $this->load->view('footer_view');
        } 
        else 
        {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function update_db_binding()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'iddays'            => $_POST['iddays'],
                'idgroups'          => $_POST['idgroups'],
                'idlessons_time'    => $_POST['idlessons_time'],
                'idsubjects'        => $_POST['idsubjects'],
                'type'              => $_POST['type'],
                'idcabinets'        => $_POST['idcabinets']
            );
            $this->admin_model->insert_binding($data);  
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function db_binding_clear()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'iddays'            => $_POST['iddays'],
                'idgroups'          => $_POST['idgroups'],
                'idlessons_time'    => $_POST['idlessons_time']
            );
            $this->admin_model->delete_from_bidning_0($data);
            $this->admin_model->insert_binding($data);  
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function update_db_events()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            if ($_POST['txtEvent'] == '') {
                $action = 'delete';
                $data = array(
                    'idDay' => $_POST['idDay'],
                    'idGroup' => $_POST['idGroup']
                );
                $this->admin_model->update_event($data, $action);
            } else {
                $action = 'insert';
                $data = array(
                    'idDay' => $_POST['idDay'],
                    'idGroup' => $_POST['idGroup'],
                    'txtEvent' => $_POST['txtEvent']
                );
                $this->admin_model->update_event($data, $action);
            }
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function get_events()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'idDay' => $_POST['idDay'],
                'idGroup' => $_POST['idGroup']
            );

            print_r($this->admin_model->get_event($data));

        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function teachers_list_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $data['teachers'] = $this->admin_model->get_teachers();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/teachers_list_view', $data);
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function teacher_edit_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $data['info'] = $this->admin_model->get_teacher_info($this->input->get('id'));
            $data['subjects'] = $this->admin_model->get_subjects();
            $data['bindingTeacherSubject'] = $this->admin_model->get_binding_TeacherSubject($this->input->get('id'));

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/edit_teacher_view', $data);
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function teacher_add_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/add_teacher_view');
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function subjects_list_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $data['subjects'] = $this->admin_model->get_subjects();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/subjects_list_view', $data);
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function subject_edit_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $data['info'] = $this->admin_model->get_subject_info($this->input->get('id'));
            $data['groups'] = $this->admin_model->get_groups();
            $data['BindingSubjectGroup'] = $this->admin_model->get_binding_SubjectGroup($this->input->get('id'));

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/edit_subject_view', $data);
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function subject_add_view()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data['groups'] = $this->admin_model->get_groups();

            $this->load->view('admin/header_view');
            $this->load->view('admin/menu_view');
            $this->load->view('admin/lists/add_subject_view', $data);
            $this->load->view('footer_view');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function update_db_subject()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'full_name' => $this->input->post('full_name'),
                'name' => $this->input->post('name'),
                'active' => $this->input->post('active')
            );
            $this->admin_model->update_subject($this->input->get('id'), $data);

            $this->admin_model->delete_binding_SubjectGroup($this->input->get('id'));
            if (isset($_POST['groups'])) {
                foreach ($_POST['groups'] as $group) {
                    $this->admin_model->insert_binding_SubjectGroup($this->input->get('id'), $group);
                }
            }
            header("Location: " . base_url() . 'admin/subjects/?response=success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_db_subject()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'full_name' => $this->input->post('full_name'),
                'name' => $this->input->post('name'),
                'active' => $this->input->post('active')
            );
            $this->admin_model->insert_subject($data);
            header("Location: " . base_url() . 'admin/subjects/?response=success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function delete_db_subject()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $this->admin_model->delete_subject($this->input->get('id'));
            header("Location: " . base_url() . 'admin/subjects/?response=delete_success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function update_db_teacher()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'patronymic' => $this->input->post('patronymic'),
                'visibility' => $this->input->post('visibility'),
            );
            $this->admin_model->update_teacher($this->input->get('id'), $data);

            $this->admin_model->delete_binding_TeacherSubject($this->input->get('id'));
            if (isset($_POST['subjects'])) {
                foreach ($_POST['subjects'] as $subject) {
                    $this->admin_model->insert_binding_TeacherSubject($this->input->get('id'), $subject);
                }
            }
            header("Location: " . base_url() . 'admin/teachers/?response=success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function add_db_teacher()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'patronymic' => $this->input->post('patronymic'),
                'visibility' => $this->input->post('visibility'),
            );

            $this->admin_model->insert_teacher($data);
            header("Location: " . base_url() . 'admin/teachers/?response=success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function delete_db_teacher()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');
            $this->admin_model->delete_teacher($this->input->get('id'));
            header("Location: " . base_url() . 'admin/teachers/?response=delete_success');
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function delete_db_day()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->model('admin_model');

            $data = array(
                'id' => (int)$_POST['id']
            );
            $this->admin_model->delete_day($data);
        } else {
            header("Location: " . base_url() . 'auth/login');
        }
    }

    function popup_edit()
    {
        if ($this->ion_auth->is_admin()) 
        {            
            $this->load->model('admin_model');
            $data['subjects']   = $this->admin_model->get_bindingSubjectGroup($this->input->get('group'));
            $data['audits']     = $this->admin_model->get_audits();

            $data['pars']       = $this->admin_model->get_binding_info_for_popup($this->input->get());

            $this->load->view('admin/shedule/popup_subjects_view', $data);
        }
    }

    function delete_binding()
    {
        if ($this->ion_auth->is_admin()) 
        {            
            $this->load->model('admin_model');
            $data = array(
                'iddays' => (int)$_POST['iddays'],
                'idgroups' => (int)$_POST['idgroups'],
                'idlessons_time' => (int)$_POST['idlessons_time']
            );
            $this->admin_model->delete_binding($data);
        }
    }

    function get_short_binding()
    {
        if ($this->ion_auth->is_admin()) 
        {            
            $this->output->set_content_type('application/json');
            $this->load->model('admin_model');
            $data = array(
                'day' => (int)$_POST['iddays'],
                'group' => (int)$_POST['idgroups'],
                'lt' => (int)$_POST['idlessons_time']
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($this->admin_model->get_binding_info_for_popup($data)));
        }
    }
}