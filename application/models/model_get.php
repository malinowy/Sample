<?php

    class Model_get extends CI_Model {
        function getData($page) {
            // geting result from DB pageData from row $page
            $query = $this->db->get_where("pageData", array("page" => $page ));
            return $query->result();
        }
    }