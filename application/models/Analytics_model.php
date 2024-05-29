<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Analytics_model extends CI_Model {
        
        function gettestcentre() {
            $this->db->distinct('id');
            $qry1 = $this->db->get('tbl_testcenterlist');
            $rowcount1 = $qry1->num_rows();

            return $rowcount1;
        }

        function totaladmins() {
            $this->db->distinct();
			$this->db->where('status','1');
            $qry2 = $this->db->get('registrar');
            $rowcount2 = $qry2->num_rows();

            return $rowcount2;
        }

		function totaladmincount() {
            $this->db->distinct();
			$this->db->where('status','1');
            $qry11 = $this->db->get('rangeadmins');
            $rowcount11 = $qry11->num_rows();

            return $rowcount11;
        }
		
        function totalcandidates() {
            $this->db->distinct();
			$this->db->where('status','1');
            $qry3 = $this->db->get('tbl_users');
            $rowcount3 = $qry3->num_rows();

            return $rowcount3;
        }

        function getadmitcardcount() {
            $this->db->distinct();
            $qry4 = $this->db->get_where('tbl_users', ['testcode <>'=>null, 'status'=>'1']);
            $rowcount4 = $qry4->num_rows();

            return $rowcount4;
        }

        // count number of passed candidates
        function countpassedcandidates() {
            $this->db->distinct('user_id');
            $qry5 = $this->db->get('tbl_testresult');
            $rowcount5 = $qry5->num_rows();

            $passed_count = array();
            $failed_count = array();

            if($rowcount5 > 0) {
                $res   = $qry5->result_array();

                foreach($res as $val) {                   

                    $total_marks = ($val['correctanswers'] * 1) - ($val['wronganswers'] * 0.25);
                    $passing_score = EXAM_QUESTIONS / 2;

                    if($total_marks >= $passing_score) {
                        $passed_count[] = $val['user_id'];
                    } else if($total_marks < $passing_score) {
                        $failed_count[] = $val['user_id'];
                    }
                }
            }

            $result_array['passed_count'] = $passed_count;
            $result_array['failed_count'] = $failed_count;


            return $result_array;
        }

    }