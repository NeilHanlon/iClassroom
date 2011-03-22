<?php

class Register extends Controller {
    function __construct() {
        parent::Controller();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
    }
    function index() {
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('register');
    }
    function submit() {
        $config = array(
                array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'trim|required|max_length[10]|callback_username_check'
                ),
                array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'required|matches[password_check]'
                ),
                array(
                        'field'   => 'password_check',
                        'label'   => 'Password Confirmation',
                        'rules'   => 'required'
                ),
                array(
                        'field'   => 'fname',
                        'label'   => 'First Name',
                        'rules'   => 'trim|required'
                ),
                array(
                        'field'   => 'lname',
                        'label'   => 'Last Name',
                        'rules'   => 'trim|required'
                ),
                array(
                        'field'   => 'email',
                        'label'   => 'Email',
                        'rules'   => 'trim|required|valid_email|callback_email_check'
                ),
                array(
                        'field'   => 'key',
                        'label'   => 'Class Key',
                        'rules'   => 'required|callback_key_check'
                ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "iClassroom - Register | Development";
            $this->load->view('header',$data);
            $this->load->view('register');
        }
        else {
            $this->load->database();
            $user = set_value('username');
            $pass = set_value('password');
            $pass = md5($pass);
            $fname = set_value('fname');
            $lname = set_value('lname');
            $email = set_value('email');
            $passchk = set_value('passwordcheck');
            $key = set_value('key');
            $t = $this->db->query('SELECT `id` FROM `classes` WHERE `key` = "' . $key . '"');
            $class = $t->row('id');
            $this->db->query("INSERT INTO `users1` (username, password, first, last, email, classes) VALUES ('$user','$pass','$fname','$lname','$email', '$class' ) ");
            $q = $this->db->query('SELECT `username` from `users1` WHERE username = "' . $user . '"');
            if($q->num_rows() > 0) {
                redirect('/register/complete');
            }
            else {
                redirect('/register/error/1');
            }
        }



    }
    function username_check($str) {
        $check = $this->db->query('SELECT `username` FROM `users1` WHERE `username` = "' . $str . '"');
        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('username_check', $str . ' is already in use. Please choose another username.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    function email_check($str) {
        $check = $this->db->query('SELECT `email` FROM `users1` WHERE `email` = "' . $str . '"');
        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('email_check', $str . ' is already in use. Please use a different email.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    function key_check($str) {
        $check = $this->db->query('SELECT `key` FROM `classes` WHERE `key` = "' . $str . '"');
        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('key_check', $str . " isn't a valid key. Please check that it is spelled correctly. It <strong>IS</strong> case-sensitive.");
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    function error($num) {
        switch ($num) {
            case 1:
                $data['message'] = $this->lang->line('registration_failure');
                break;
            default:
                $data = null;
                break;
        }
        $data['title'] = "iClassroom - Error | Development";
        $this->load->view('header',$data);
        $this->load->view('index',$data);
    }
    function complete() {
        $data['title'] = "iClassroom - Registration Success! | Development";
        $data['message'] = "Registration Complete! You may now " . anchor('index','Login') . ".";
        $data['registered'] = true;
        $this->load->view('header',$data);
        $this->load->view('register',$data);
    }


}
?>
