<?php

class Email extends CI_Controller {
   /* function __construct(){
        parent::CI_Controller();

    }*/

    function  index(){
        $this->load->view('newsletter');
    }

    function send(){
       // echo "Hello from send"; die();
       /* this can be added to the Config Folder
         * by creating the email.php file.
        $config = Array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'ssl://smtp.googlemail.com',
                 'smtp_port' => 465,
                 'smtp_user' => 'artvekinc@gmail.com',
                 'smtp_pass' => 'Galina1949!',
                 'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wardwrap' => TRUE
            ); */
        /*
        *Validation form
        */
        $this->load->library('form_validation');

        /*
        *Set the rules
        *field name, error message, vlidation rules
        */
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

        /*
        *Run validation method
        */
        if ($this->form_validation->run() == FALSE){
            $this->load->view('newsletter');
        }
        else {
            //validation has passed. Now send the email
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            //echo $email; die();

            //fwe do not need here $config variable if we moved all $config array to config folder->email.php
        $this->load->library('email');
        $this->email->set_newline("\r\n");

        $this->email->from('example@gmail.com', 'Sergiu Caraus');
        $this->email->to($email);
        $this->email->subject('Sign Up confirmation test');
        $this->email->message('Sign Up is working. Great!');

        $path = $this->config->item('server_root');
        $file = $path . '/ci_2/attachments/yourinfo.txt';

        $this->email->attach($file);

        if ($this->email->send()) {
            //echo 'Your email was sent, fool.';
            $this->load->view('signup_confirmation_view');
        }
        else {
            show_error($this->email->print_debugger());

        }

        }

        //field name
        /*
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('example@gmail.com', 'Sergiu Caraus');
        $this->email->to('example@yahoo.com');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');

        $path = $this->config->item('server_root');
        $file = $path . '/ci_2/attachments/yourinfo.txt';

        $this->email->attach($file);

        if ($this->email->send()) {
            echo 'Your email was sent, fool.';
        }
        else {
            show_error($this->email->print_debugger());
        } */

    }
}