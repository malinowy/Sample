<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

        public  function index() {
            $this->home();
        }

         public  function home() {
            // colling model model_get.php
            $this->load->model("model_get");
            // arrat 'results' will store all data from row 'home' from DB
            $data["results"] = $this->model_get->getData("home");

            $this->load->view('site_header');
            $this->load->view('site_nav');
            $this->load->view('content_home', $data); //adding to content_home all data from DB
            $this->load->view('site_footer');

        }

        public  function about() {
            // colling model model_get.php
            $this->load->model("model_get");
            // arrat 'results' will store all data from row 'home' from DB
            $data["results"] = $this->model_get->getData("about");
            $this->load->view('site_header');
            $this->load->view('site_nav');
            $this->load->view('content_about', $data);
            $this->load->view('site_footer');

        }

        public function contact() {

            $this->load->view('site_header');
            $this->load->view('site_nav');
            $this->load->view('content_contact');
            $this->load->view('site_footer');
        }

        public function send_email() {
            $this->load->library("form_validation");

            //xss_clean codition prevent anyone doing crosssite scrpting into input fields - for security - for some reason it does not work
            /*$this->form_validation->set_rules("fullName", "Full Name", "required|trim|alpha|xss_clean");
            $this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email|xss_clean");
            $this->form_validation->set_rules("message", "Message", "required|trim|xss_clean");*/

            $this->form_validation->set_rules("fullName", "Full Name", "required");
            $this->form_validation->set_rules("email", "Email Address", "required");
            $this->form_validation->set_rules("message", "Message", "required");

                if ($this->form_validation->run() == FALSE) {
                    $data["message"] = "";

                    $this->load->view('site_header');
                    $this->load->view('site_nav');
                    $this->load->view('content_contact', $data);
                    $this->load->view('site_footer');
                }
                  else {
                       $data["message"] = "The email has successfully been sent!";

                       // to send emails
                       $this->load->library("email");

                       $this->email->from(set_value("email"), set_value("fullName"));
                       $this->email->to("artvekinc@yahoo.com");
                       $this->email->subject("Mesage from website");
                       $this->email->message(set_value("message"));

                       $this->email->send();

                       echo $this->email->print_debugger();


                       $this->load->view('site_header');
                       $this->load->view('site_nav');
                       $this->load->view('content_contact', $data);
                       $this->load->view('site_footer');
                  }
        }



 }