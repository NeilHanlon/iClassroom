<?php

class Members extends Controller {

    function __construct() {
        parent::Controller();
    }
    function index() {
        $data['title'] = 'iClassroom - Members | Development';
        if($this->session->userdata('logged_in') != true) {
            redirect('/index/error/1');
        }
        else {
            $this->load->view('members/header',$data);
            $this->load->view('members');
        }
    }
    function logout() {
        $data['title'] = 'iClassroom - Members | Development';
        if($this->session->userdata('logged_in') == true) {
            $this->session->sess_destroy();
            redirect('/index/loggedout');
        }
        else {
            $data['message'] = "Not logged in!";
            redirect('/index/error/1');
        }

    }
    function classes() {
        $data['title'] = "iClassroom - Your Classes | Development";
        $this->load->database();
        $list = explode(',',$this->session->userdata('classes'));
        $class = array(
                'classes' => array(),
        );
        $i = 0;
        foreach($list as $id) {
            $q = $this->db->query('SELECT `name`,`owner` FROM `classes` WHERE `id` = "' . $id . '"');
            $name = $q->row('name');
            $owner = $q->row('owner');
            $class['classes'][$i] = array("class" => $name, "teacher" => $owner);
            $i++;
        }

        $this->load->view('members/header',$data);
        $this->load->view('members/classes',$class);
    }
    function addclass() {
        $data['title'] = "iClassroom - Your Classes | Development";
        $this->load->library('form_validation');
        $this->load->database();
        $this->form_validation->set_rules('key', 'Key', 'required|trim|callback_key_check|callback_exists_check');
        if ($this->form_validation->run() == FALSE) {
            $list = explode(',',$this->session->userdata('classes'));
            $data = array(
                    'classes' => array(),
            );
            $i = 0;
            foreach($list as $id) {
                $q = $this->db->query('SELECT `name`,`owner` FROM `classes` WHERE `id` = "' . $id . '"');
                $name = $q->row('name');
                $owner = $q->row('owner');
                $data['classes'][$i] = array("class" => $name, "teacher" => $owner);
                $i++;
            }
            $data['title'] = "iClassroom - Your Classes | Development";
            $this->load->view('members/header',$data);
            $this->load->view('members/classes');
        }
        else {
            $key = set_value('key');
            echo $key;
            $user = $this->session->userdata('username');
            $classes = $this->session->userdata('classes');
            $q = $this->db->query('SELECT `id` FROM `classes` WHERE `key` = "' . $key . '"');
            //$q = $this->db->query('SELECT `id` FROM `classes` WHERE `key` = "test12"');
            $classid = $q->row('id');
            echo "CLASSID:";
            print($classid);
            $classes .= ',' . $classid;
            $this->db->query('UPDATE `users1` SET `classes` = "' . $classes . '" WHERE `username` = "' . $user . '"');
            //
            //$r = $this->db->query('SELECT `classes` FROM `users1` WHERE `username` = "' . $user . '"');
            //
            $this->session->set_userdata('classes', $classes);
            $list = explode(',',$this->session->userdata('classes'));
            $data = array(
                    'classes' => array(),
            );
            $i = 0;
            foreach($list as $id) {
                $q = $this->db->query('SELECT `name`,`owner` FROM `classes` WHERE `id` = "' . $id . '"');
                $name = $q->row('name');
                $owner = $q->row('owner');
                $data['classes'][$i] = array("class" => $name, "teacher" => $owner);
                $i++;
            }
            $data['title'] = "iClassroom - Your Classes | Development";
            $data['message'] = "Class added!";
            $this->load->view('members/header',$data);
            $this->load->view('members/classes',$data);

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
    function exists_check($str) {
        $user = $this->session->userdata('username');
        $q = $this->db->query('SELECT `id` FROM `classes` WHERE `key` = "' . $str . '"');
        $id = $q->row('id');
        $r = $this->db->query('SELECT `classes` FROM `users1` WHERE `username` = "' . $user . '"');
        $classes = explode(',', $r->row('classes'));
        foreach($classes as $c) {
            $run = 0;
            $count = count($classes);
            while($run != $count) {
                if($c == $id) {
                    //$this->form_validation->set_message('key_check',"You're already in a class with that key!");
                    echo "In the class";
                }
                else {
                    $run++;
                    echo "clear";
                }
            }
        }
    }

}


?>
