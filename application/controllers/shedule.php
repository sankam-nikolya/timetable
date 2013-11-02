<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shedule extends CI_Controller {

    public function index()
    {
        date_default_timezone_set('Asia/Yekaterinburg');
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        if (!isset($_GET['filter']))
        {
            $_GET['filter'] = 'all_day';
        }
        if (!isset($_GET['view']))
        {
            $_GET['view'] = 'vcolumn';
        }
        
        if (isset($_GET['s']))
        {
            $this->subject_info();
        }
        else 
        {
            $this->load->view('header_view');
            $this->load->view('menu_view');
            $this->load->view('filter_view');

            $this->load->model('shedule_model');

            $data['days'] = $this->shedule_model->get_days($_GET['filter']);
            $data['pars_timing'] = $this->shedule_model->get_time();
            $data['groups'] = $this->shedule_model->get_groups();

            $data['subjects'] = array();
            foreach ($data['days'] as $day)
            {
                $data['day_for_now'] = $day;
                $this->load->view('shedule_blank_view', $data);
                foreach ($data['groups'] as $group)
                {
                    $data['group_for_now'] = $group['name'];
                    $data['pars'] = $this->shedule_model->get_pars($day['date'], $group['idgroups']);

                    $data['pars_rendered'] = array(count($data['pars_timing']));
                    for ($i = 0; $i < count($data['pars_timing']); $i++)
                    {
                        $data['pars_rendered'][$i] = '<td class="cell">';
                        foreach ($data['pars'] as $pars)
                        {
                            if ($pars['num']-1 == $i && $pars['type'] == 0)
                            {
                                $data['pars_rendered'][$i] .= '<span title="Общая пара">'.$pars['subject'].'</span> <span class="clr">'. $pars['cabinet'] .'</span>';
                            }
                            if ($pars['num']-1 == $i && ($pars['type'] == 1 || $pars['type'] == 2))
                            {
                                if ($pars['type'] == 1)
                                {
                                    $data['pars_rendered'][$i] .= '<span class="wordup" title="Верхняя подгруппа">'. $pars['subject'] .'</span> <span class="clr_for_small">'. $pars['cabinet'] .'</span>';
                                }
                                if ($pars['type'] == 2)
                                {
                                    $data['pars_rendered'][$i] .= '<br><span class="wordbottom" title="Нижняя подгруппа">'. $pars['subject'] .'</span> <span class="clr_for_small">'. $pars['cabinet'] .'</span>';
                                }
                            }
                        }
                        $data['pars_rendered'][$i] .= '</td>';
                    }
                    $this->load->view('shedule_groups_view', $data);
                }
            }
            $this->load->view('shedule_bottom_view', $data);
            $this->load->view('footer_view');
        }

        $this->load->library('table');

        $tmpl = array (
            'table_open'          => '<table border="1" cellpadding="4" cellspacing="0">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr>',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
        );

        $this->table->set_template($tmpl);

        $data = array(
            array('Name', 'Color', 'Size'),
            array('Fred', 'Blue', 'Small'),
            array('Mary', 'Red', 'Large'),
            array('John', 'Green', 'Medium')
        );

        echo $this->table->generate($data);

        
    }

    public function subject_info()
    {
        $this->load->view('header_view');
        $this->load->view('menu_view');
        $this->load->view('subject_info_view');
    }
}