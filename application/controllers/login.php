<?php
/*
* This controller launches the Login form and Sign Up form
*
*/
class Login extends CI_Controller {

    function index() {
        // main_content is the variable that will be passed to template.php for $this->load->view($main_content)
        //login_form is passed through $data['main_content']  to template located in view/includes
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);

    }
    // http://localhost:8888/ci_2/index.php/login/validate_credentials - from form action
    // 1 -> login controller and inside of login controller looks for validate_credentials method
    //after user login al his data will be validated through this method
    function validate_credentials(){

        //call model: membership_model and the method validate
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();


            //if user credentials are validated...
            if ($query  == true) {
                $data = array(
                        // we do not add any rules (cleaning) for post method because we set the XSS filtering to TRUE in config.php
                        // $config['global_xss_filtering'] = TRUE;
                        'username' => $this->input->post('username'),
                        'is_logged_in' => true
                    );

                // in order to use session we need to add it in autoloader $autoload['libraries'] = array('database', 'session');
                $this->session->set_userdata($data);
                // redirect to site controller -> method members_area
                redirect('site/members_area');
            }

            else {
                // if credentials are not corret, the index method will called, the form will be loaded again
                $this->index();
            }
    }

    function signup() {
        //signup_form is passed through $data['main_content']  to template located in view/includes
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);

    }

    function create_member() {
        $this->load->library('form_validation');

        //field name, error message, validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $this->signup();

        }

        else {
            //call model: membership_model.php and the method create_member.php
            $this->load->model('membership_model');
                if ($query = $this->membership_model->create_member()) {

                      $data['main_content'] = 'signup_successful';
                      $this->load->view('includes/template', $data);
                }
                else {
                    $this->signup();
                }
        }
    }

}