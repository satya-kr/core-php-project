<?php
include("../includes/conn.php");


echo "hello";
exit;

// public function show_customers()
// 	{
// 		$draw = intval($this->input->get("draw"));
// 		$start = intval($this->input->get("start"));
// 		$length = intval($this->input->get("length"));
// 		$this->load->model('Customers_model');
// 		$d_work= $this->Customers_model->show_customers();
		
// 		$data = array();
// 		$baseurl=base_url();
// 		foreach($d_work as $r) {
				
// 				$data[] = array(
// 					'<span style="font-size:15px">'.strtoupper($r->cust_first_name).' '.strtoupper($r->cust_middle_name).' '.strtoupper($r->cust_last_name).'</span>',
// 					'<span style="font-size:15px">'.strtoupper($r->cust_gurdian_name).'</span>',
// 					'<span style="font-size:15px">'.strtoupper($r->cust_vill).'</span>',
// 					'<span style="font-size:15px">'.$r->cust_contact_no.'</span>',
// 					'<span style="font-size:15px"><a href="'.base_url().'Users/customer_profile/'.$r->cust_id.'" class="btn btn-primary">Edit Product and Profile Details</a></span>'
// 				);
// 		}
// 		$output = array(
// 				"draw" => $draw,
// 				"data" => $data
// 			);
// 		echo json_encode($output);
// 		exit();	
// 	}



?>