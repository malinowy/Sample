<?php

class Site extends CI_Controller {

// verify if session is set colling method is_logged_in()
    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }

    function index() {
        $this->load->model('data_model');
        $data["rows"] = $this->data_model->getAll();

        $this->load->view('home', $data);
    }

    function pagination() {
        $this->load->library('pagination');
        //in order to display data in a table we need to use HTML table class
        //we need to load this library here in order to make it work in site_view.php
        $this->load->library('table');

        // to name the Headings of the table
        $this->table->set_heading('Id', 'The Title', 'Author', 'The Content');

        //do not confuse this base_url with that one from config: $config['base_url'] = 'http://localhost:8888/ci_2/';
        $config['base_url'] = 'http://localhost:8888/ci_2/index.php/site/pagination';
        // how many rows recieved from the query
        $config['total_rows'] = $this->db->get('data')->num_rows();
        // how many results to display per page
        $config['per_page'] = 10;
        // the number of links to show: 1,2,3 - are pages
        $config['num_links'] = 20;

        //add a div with id=pagination to the pagination links, so we can style them
        //here we open the div tag
        $config['full_tag_open'] = '<div id="pagination">';
        //here we close the div tag
        $config['full_tag_close'] = '</div>';

        //now we pass all configuration items to initialize
        $this->pagination->initialize($config);

        // second parameter tells how many rows to retrieve form DB
        $data['records'] = $this->db->get('data', $config['per_page'], $this->uri->segment(3));

        $this->load->view('site_view', $data);


    }

    function about() {
        $this->load->view('about');
    }

    // get data from DB ad load options_view.php
    function options() {
        $data = array();

        if ($query = $this->site_model->get_records()){
            $data['records'] = $query;
        }

        $this->load->view('options_view', $data);
    }


    //create a new entry in DB and load options_view.php through options method
    function create() {
        $data = array(
                // same as $_POST['title']
                'title' => $this->input->post('title'),
                'contents' => $this->input->post('contents')
            );
        // in order to call site_model we open the autoload.php from config folder
        // find the line $autoload['model'] = array('site_model');
        $this->site_model->add_record($data);
        // we reload the options_view.php file
        $this->options();
    }

    // update the entry, using data from update method
    // need to work on this
    function update(){
        $data = array(
                'title' => 'My freshley Updated Title',
                'contents' => 'Content should be here; it is updated.'
            );

        $this->site_model->update_record($data);

        // we reload the options_view.php file
        $this->options();
    }

    // delete the entry by id and reload the options_view.php file
    function delete() {
        $this->site_model->delete_row();
         $this->options();
    }

    function members_area() {
        $this->load->view('members_area');
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {

            //this is not a right wa to do, need to work on it.
            echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
            die();
        }
    }


}