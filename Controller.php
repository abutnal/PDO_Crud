<?php
require_once('Model.php');

class Controller{
	
	public function create($table, $data){
		$objModel =new crudOperation();
		$data = $objModel->create($table, $data);
		print_r($data);
	}

	public function update($table, $data, $where){
		$objModel =new crudOperation();
		$status = $objModel->update($table, $data, $where);
		print_r($status);
	}

    public function read_All($table){
    	$objModel = new crudOperation();
    	$data = $objModel->read_All($table);
			$count=1;    	
			$html="";    	
			$html .='<table class="table table-bordered">';
			$html .='<thead>';
			$html .='<th>SL</th>';
			$html .='<th>Name</th>';
			$html .='<th>Phone</th>';
			$html .='<th>Email</th>';
			$html .='<th>Password</th>';
			$html .='<th>Action</th>';
			$html .='</thead>';
			    	foreach ($data as $row) {
			$html .='<tr>';
			$html .='<td>'.$count++.'</td>';
			$html .='<td>'.$row->name.'</td>';
			$html .='<td>'.$row->phone.'</td>';
			$html .='<td>'.$row->email.'</td>';
			$html .='<td>'.$row->password.'</td>';
			$html .='<td><a href="" class="btn btn-xs btn-primary" id="edit" data-id="'.$row->user_id.'">Edit</a>&nbsp;&nbsp;<a href="" id="delete" data-id="'.$row->user_id.'" class="btn btn-xs btn-danger">Delete</a></td>';
			$html .='</tr>';
    	}
			$html .='</table>';
			echo json_encode($html);
    }

    public function read_One($table, $where){
    	$objModel =new crudOperation();
		$data = $objModel->read_One($table, $where);
		echo json_encode($data);
    }

    public function delete($table, $where){
    	$objModel =new crudOperation();
		$data = $objModel->delete($table, $where);
		echo json_encode($data);
    }

}



if (isset($_POST['create'])) {
	$data = [];
	$data = $_POST;
	unset($data['create']);
	$objController = new Controller();
	$objController->create('user_tbl', $data);
}


if (isset($_POST['update'])) {
	$data = [];
	$data = $_POST;
	$where = ['user_id'=>$data['user_id']];
	unset($data['update']);
	unset($data['user_id']);
	$objController = new Controller();
	$objController->update('user_tbl', $data, $where);
}


if (isset($_POST['showAlldata'])) {
	$objController = new Controller();
	$objController->read_All('user_tbl');
}


if (isset($_POST['editData'])) {
	$where = ['user_id'=>$_POST['user_id']];
	$objController = new Controller();
	$objController->read_One('user_tbl', $where);
}


if (isset($_POST['deleteData'])) {
	$where = ['user_id'=>$_POST['user_id']];
	$objController = new Controller();
	$objController->delete('user_tbl', $where);
}


