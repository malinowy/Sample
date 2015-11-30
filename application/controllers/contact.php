<?php
    class Contact extends CI_Controller {
        function index() {
           // main_content is the variable that will be passed to template.php for $this->load->view($main_content)
           //login_form is passed through $data['main_content']  to template located in view/includes
           $data['main_content'] = 'contact_form';
           $this->load->view('includes/template', $data);
        }

        function submit() {

            $this->input->post('name');

           $data['main_content'] = 'contact_submitted';

            //if ajax is loaded  then we load only contact_submitted.php without header and footer
            if ($this->input->post('ajax')) {
                $this->load->view($data['main_content']);
            } // if not then the template with contact_form.php
             else {
               $this->load->view('includes/template', $data);
            }
        }

    }
 ?>