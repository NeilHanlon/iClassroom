<?php

class Index extends Controller {
    function __construct() {
        parent::Controller();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
    }
    function index() {
        $data['title'] = 'iClassroom | Development';
        $this->load->view('header',$data);
        $this->load->view('index');
    }
    function loggedout() {
        $data['title'] = 'iClassroom | Development';
        $data['loggedout'] = true;
        $this->load->view('header',$data);
        $this->load->view('index',$data);
    }
    function submit() {
        $data['title'] = 'iClassroom | Development';
        $this->load->database();
        $config = array(
                array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'trim|required'
                ),
                array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'trim|required|md5'
                ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header',$data);
            $this->load->view('index');
        }
        else {
            $this->load->helper('cookie');
            $user = set_value('username');
            $pass = set_value('password');
            $q = $this->db->query('SELECT `username`,`password`,`email`,`classes`,`userlevel` FROM `users1` WHERE username="' . $user . '" AND password="' . $pass . '" LIMIT 1');
            if ($q->num_rows() > 0) {
                $session = array(
                        'username'  => $q->row('username'),
                        'email'     => $q->row('email'),
                        'logged_in' => TRUE,
                        'classes'   => $q->row('classes'),
                        'userlevel' => $q->row('userlevel')

                    );

                $this->session->set_userdata($session);
                redirect('/members');
            }
            else {
                redirect('/index/error/2');
            }
        }
    }
    function error($num=null) {
        switch ($num) {
            case 1:
                $data['message'] = $this->lang->line('error_not_logged_in');
                break;
            case 2:
                $data['message'] = $this->lang->line('error_incorrect_login');
                break;
            default:
                $data = null;
                break;
        }
        $data['title'] = "iClassroom - Error | Development";
        $this->load->view('header',$data);
        $this->load->view('index',$data);

    }

}
