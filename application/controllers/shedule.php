<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shedule extends CI_Controller
{

    function index()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        $this->load->model('shedule_model');

        if (!isset($_GET['filter'])) {
            $_GET['filter'] = 'currently';
            $data['days'] = $this->shedule_model->get_days('currently');
        } elseif (isset($_GET['filter'])) {
            $data['days'] = $this->shedule_model->get_days($this->input->get('filter'));
        }

        if (isset($_GET['from']) && isset($_GET['to'])) {
            $data['days'] = $this->shedule_model->get_days_f_t($_GET['from'], $_GET['to']);
        }

        $this->load->view('header_view');
        $this->load->view('menu_view');




        $data['pars_timing'] = $this->shedule_model->get_time();
        $data['groups'] = $this->shedule_model->get_groups();
        //$data['days'] = $this->shedule_model->get_days($this->input->get('filter'));
        $data['subjects'] = array();
        foreach ($data['days'] as $day) {
            $data['day_for_now'] = $day;
            $this->load->view('shedule_blank_view', $data);
            foreach ($data['groups'] as $group) {
                $data['group_for_now'] = $group['name'];
                $data['event'] = $this->shedule_model->get_event($day['iddays'], $group['idgroups']);
                if (count($data['event']) > 0) {
                    $data['pars_rendered'][0] = '<td colspan="' . count($data['pars_timing']) . '">' . $data['event'][0]['txtEvent'] . '</td>';
                } else {
                    $data['pars'] = $this->shedule_model->get_pars($day['date'], $group['idgroups']);
                    $data['pars_rendered'] = array(count($data['pars_timing']));
                    for ($i = 0; $i < count($data['pars_timing']); $i++) {
                        $data['pars_rendered'][$i] = '<td class="cell">';
                        foreach ($data['pars'] as $pars) {
                            $data['TeacherSubject'] = $this->shedule_model->get_TeacherSubject($pars['idsubects']);
                            if ($pars['num'] - 1 == $i && $pars['type'] == 0) {
                                $data['pars_rendered'][$i] .= '<p>';
                                $data['pars_rendered'][$i] .= '<span title="Общая пара. Преподаватель: ';

                                foreach ($data['TeacherSubject'] as $ts) {
                                    $data['pars_rendered'][$i] .= $ts['first_name'];
                                    $data['pars_rendered'][$i] .= ' ';
                                    $data['pars_rendered'][$i] .= $ts['patronymic'] . '; ';
                                }
                                $data['pars_rendered'][$i] .= '">' . $pars['subject'] . '</span> <span class="clr">' . $pars['cabinet'] . '</span></p>';
                            }
                            if ($pars['num'] - 1 == $i && ($pars['type'] == 1 || $pars['type'] == 2)) {
                                if ($pars['type'] == 1) {
                                    $data['pars_rendered'][$i] .= '<p>';
                                    $data['pars_rendered'][$i] .= '<span class="wordup" title="Верхняя подгруппа. Преподаватель: ';

                                    foreach ($data['TeacherSubject'] as $ts) {
                                        $data['pars_rendered'][$i] .= $ts['first_name'];
                                        $data['pars_rendered'][$i] .= ' ';
                                        $data['pars_rendered'][$i] .= $ts['patronymic'] . '; ';
                                    }
                                    $data['pars_rendered'][$i] .= '">' . $pars['subject'] . '</span> <span class="clr">' . $pars['cabinet'] . '</span></p>';
                                }
                                if ($pars['type'] == 2) {
                                    $data['pars_rendered'][$i] .= '<p>';
                                    $data['pars_rendered'][$i] .= '<span class="wordbottom" title="Нижняя подгруппа. Преподаватель: ';

                                    foreach ($data['TeacherSubject'] as $ts) {
                                        $data['pars_rendered'][$i] .= $ts['first_name'];
                                        $data['pars_rendered'][$i] .= ' ';
                                        $data['pars_rendered'][$i] .= $ts['patronymic'] . '; ';
                                    }
                                    $data['pars_rendered'][$i] .= '">' . $pars['subject'] . '</span> <span class="clr">' . $pars['cabinet'] . '</span></p>';
                                }
                            }
                        }
                        $data['pars_rendered'][$i] .= '</td>';
                    }
                }
                $this->load->view('shedule_groups_view', $data);
            }
            $this->load->view('shedule_bottom_view');
        }
        $this->load->view('footer_view');
    }


    public function subject_info()
    {
        $this->load->view('header_view');
        $this->load->view('menu_view');
        $this->load->view('subject_info_view');
    }
}