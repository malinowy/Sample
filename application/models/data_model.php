<?php

class Data_model extends CI_Model {
  /*
    function getAll() {
        $q = $this->db->query("SELECT * FROM data");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    } */
    ############################################################
    /*
    * Same result through get() as we would use query("SELECT * FROM data");
    *
    */
   /*
    function getAll() {
        $q = $this->db->get("data");

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    } */

    ############################################################
    /*
    * Same result through if we would like to select a certain rows: title and contents
    *
    */
    /*
    function getAll() {
        $this->db->select("title, contents");
        $q = $this->db->get("data");

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    } */
    ############################################################
    /*
    * Using query method
    *
    */
    /*
    function getAll() {
         /*
         * ? - will be replaced with the data that we need
         */
        /*$sql  = "SELECT title, author, contents FROM data WHERE id = ?";
        // this is the case when we retrieve title, author and contents where id = 2
        $q = $this->db->query($sql, 2); */
        /*
        $sql  = "SELECT title, author, contents FROM data WHERE id = ? AND author = ?";
        // this is the case when we retrieve title, author and contents where id = 2 and author = "Jeffrey Way"
        $q = $this->db->query($sql, array(2, "Jeffrey Way"));

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

    }*/
    ############################################################
    /*
    * Using another query method
    *
    */
    function getAll() {
        $this->db->select('title, contents');
        $this->db->from("data");
        $this->db->where('id', 4);

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


}