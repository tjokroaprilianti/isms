<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function delete_img(){
		extract($_POST);
		if(is_file($path)){
			if(unlink($path)){
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete '.$path;
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown '.$path.' path';
		}
		return json_encode($resp);
	}
	function save_category(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `category_list` where `name` = '{$name}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Category already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `category_list` set {$data} ";
		}else{
			$sql = "UPDATE `category_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Category successfully saved.";
			else
				$resp['msg'] = " Category successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	function delete_category(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `category_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Category successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

	//cost center
	function save_costcenter(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `cost_center_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Cost Center already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `cost_center_list` set {$data} ";
		}else{
			$sql = "UPDATE `cost_center_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Cost Center successfully saved.";
			else
				$resp['msg'] = " Cost Center successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

//cost unit
	function save_costunit(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `cost_unit_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Cost Unit already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `cost_unit_list` set {$data} ";
		}else{
			$sql = "UPDATE `cost_unit_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Cost Unit successfully saved.";
			else
				$resp['msg'] = " Cost Unit successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	//nama pelanggan
	function save_namapelanggan(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `nama_pelanggan_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Nama Pelanggan already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `nama_pelanggan_list` set {$data} ";
		}else{
			$sql = "UPDATE `nama_pelanggan_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Nama Pelanggan successfully saved.";
			else
				$resp['msg'] = " Nama Pelanggan successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	//Batas Nama Pelanggan

	//Jenis Pembayaran
	function save_jenispembayaran(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `jenis_pembayaran_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Jenis Pembayaran already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `jenis_pembayaran_list` set {$data} ";
		}else{
			$sql = "UPDATE `jenis_pembayaran_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Jenis Pembayaran successfully saved.";
			else
				$resp['msg'] = "Jenis Pembayaran successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	//Batas Jenis Pembayaran

	//Penanggung Jawab
	function save_penanggungjawab(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `penanggungjawab_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Penanggungjawab already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `penanggungjawab_list` set {$data} ";
		}else{
			$sql = "UPDATE `penanggungjawab_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Penanggungjawab successfully saved.";
			else
				$resp['msg'] = "Penanggungjawab successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	//Batas Penanggung Jawab

	//Status Progres
	function save_statusprogres(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `status_progres_list` where `kode` = '{$kode}' and `name` = '{$name}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		/*$check = $this->conn->query("SELECT * FROM `status_progres_list` where `kode` = '{$kode}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;*/
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Status Progres already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `status_progres_list` set {$data} ";
			//$sql = "INSERT INTO `history` set {$data} ";
		}else{
			$sql = "UPDATE `status_progres_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['cid'] = $cid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Status Progres successfully saved.";
			else
				$resp['msg'] = "Status Progres successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		// if($resp['status'] == 'success')
		// 	$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}

	//Batas Status Progres

	//awal item list

	function save_item(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `item_list` where `name` = '{$name}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Item already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `item_list` set {$data} ";
		}else{
			$sql = "UPDATE `item_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$id = !empty($id) ? $id : $this->conn->insert_id;
			$resp['id'] = $id;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New item successfully saved.";
			else
				$resp['msg'] = " item successfully updated.";

				if(!empty($_FILES['img']['tmp_name'])){
					$img_path = "uploads/items/";
					if(!is_dir(base_app.$img_path)){
						mkdir(base_app.$img_path);
					}
					$accept = array('image/jpeg','image/png');
					if(!in_array($_FILES['img']['type'],$accept)){
						$resp['msg'] += " Image file type is invalid";
					}else{
						if($_FILES['img']['type'] == 'image/jpeg')
							$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
						elseif($_FILES['img']['type'] == 'image/png')
							$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
						if(!$uploadfile){
							$resp['msg'] +=  " Image is invalid";
						}else{
							list($width, $height) =getimagesize($_FILES['img']['tmp_name']);
							if($width > 250 || $height > 250){
								if($width > $height){
									$perc = ($width - 250) / $width;
									$width = 250;
									$height = $height - ($height * $perc);
								}else{
									$perc = ($height - 250) / $height;
									$height = 250;
									$width = $width - ($width * $perc);
								}
							}
							$temp = imagescale($uploadfile,$width,$height);
							$spath = $img_path.'/'.$_FILES['img']['name'];
							$i = 1;
							while(true){
								if(is_file(base_app.$spath)){
									$spath = $img_path.'/'.($i++).'_'.$_FILES['img']['name'];
								}else{
									break;
								}
							}
							if($_FILES['img']['type'] == 'image/jpeg')
							$upload = imagejpeg($temp,base_app.$spath,60);
							elseif($_FILES['img']['type'] == 'image/png')
							$upload = imagepng($temp,base_app.$spath,6);
							if($upload){
								$this->conn->query("UPDATE item_list set image_path = CONCAT('{$spath}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}' ");
							}
	
							imagedestroy($temp);
						}
					}
				}
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	

	//batas item list

	//Awal Project List

	function save_projectlist(){
		extract($_POST);
		$data = "";
		
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=","; 
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
				
			}
		}
		

		$check = $this->conn->query("SELECT * FROM `project_list` where `judul_kontrak` = '{$judul_kontrak}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Project list already exists.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `project_list` set {$data} ";
			//$id_proj = SELECT LAST_INSERT_ID();
			$id_proj = $this->conn->insert_id;
			//$data2 .= " `id_project_list`='$id_proj' ";
			//$sql2 = "INSERT INTO `history` set id_project_list='$id_proj', {$data} ";
		}else{
			$sql = "UPDATE `project_list` set {$data} where id = '{$id}' ";
			//$data2 .= " `id_project_list`='{$id}' ";
			//$sql2 = "INSERT INTO `history` set id_project_list='{$id}', {$data}  ";
		}
			$save = $this->conn->query($sql);
			//$save2 = $this->conn->query($sql2);
		if($save /*&& $save2*/){
			$id = !empty($id) ? $id : $this->conn->insert_id;
			$sql2 = "INSERT INTO `history` set id_project_list='$id', {$data} ";
			$save2 = $this->conn->query($sql2);
			if($save2){
				$this->settings->set_flashdata('success',$resp['msg']);
			}
			$resp['id'] = $id;
			if(!empty($_FILES['upload_kontrak']['tmp_name'])){
					if(!is_dir(base_app."uploads/file_upload"))
						mkdir(base_app."uploads/file_upload");
					$type_file=$_FILES['upload_kontrak']['type'];
					//$ext = pathinfo($_FILES['upload_kontrak']['name'], PATHINFO_EXTENSION);
					$ext = strtolower(pathinfo($_FILES['upload_kontrak']['name'],PATHINFO_EXTENSION));
					$fname = "uploads/file_upload/$id.$ext";
					$accept = array('image/jpeg','image/png','pdf');
					if(!in_array($_FILES['upload_kontrak']['type'],$accept)){
						$err = "Image file type is invalid";
					}
					if($_FILES['upload_kontrak']['type'] == 'image/jpeg')
						$uploadfile = imagecreatefromjpeg($_FILES['upload_kontrak']['tmp_name']);
						/*$temp = imagescale($uploadfile,200,200);
						if(is_file(base_app.$fname))
						unlink(base_app.$fname);
						$upload =imagepng($temp,base_app.$fname);*/
						//$fname2="uploads/file_upload/$id.jpeg";
					if($_FILES['upload_kontrak']['type'] == 'image/png')
						$uploadfile = imagecreatefrompng($_FILES['upload_kontrak']['tmp_name']);
						/*$temp = imagescale($uploadfile,200,200);
						if(is_file(base_app.$fname))
						unlink(base_app.$fname);
						$upload =imagepng($temp,base_app.$fname);*/
						//$fname2="uploads/file_upload/$id.png";
					if($ext == 'pdf')
						$uploadfile = ($_FILES['upload_kontrak']['tmp_name']);
						/*$flok = "uploads/file_upload/";
						if (move_uploaded_file($_FILES["upload_kontrak"]["tmp_name"], $flok)) {*/
						//$fname2="uploads/file_upload/$id.pdf";
					if(!$uploadfile){
						$err = "File is invalid";
					}
					if(( ($_FILES['upload_kontrak']['type'] == 'image/png') || ($_FILES['upload_kontrak']['type'] == 'image/jpeg')) ){
						$temp = imagescale($uploadfile,200,200);
						if(is_file(base_app.$fname))
						unlink(base_app.$fname);
						$upload =imagepng($temp,base_app.$fname);
					}
					/*if (move_uploaded_file($_FILES["upload_kontrak"]["tmp_name"], $fname)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["upload_kontrak"]["name"])). " has been uploaded.";
    				$this->conn->query("UPDATE `project_list` set `upload_kontrak` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}'");
						if($this->settings->userdata('id') == $id)
						$this->settings->set_userdata('upload_kontrak',$fname."?v=".time());
					}*/
					if(( ($_FILES['upload_kontrak']['type'] == 'image/png') || ($_FILES['upload_kontrak']['type'] == 'image/jpeg')) && $upload){
						$this->conn->query("UPDATE `project_list` set `upload_kontrak` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}'");
						if($this->settings->userdata('id') == $id)
						$this->settings->set_userdata('upload_kontrak',$fname."?v=".time());
					}
					if(($ext == 'pdf' || $ext == 'PDF' ) && (move_uploaded_file($_FILES["upload_kontrak"]["tmp_name"], base_app.$fname))){
						$this->conn->query("UPDATE `project_list` set `upload_kontrak` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}'");
						if($this->settings->userdata('id') == $id)
						$this->settings->set_userdata('upload_kontrak',$fname."?v=".time());
					}
					imagedestroy($temp);
				}
		
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = "New Project List successfully saved.";
			else
				$resp['msg'] = " Project List successfully updated.";
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success',$resp['msg']);
			return json_encode($resp);
	}
	function delete_item(){
		extract($_POST);
		$del = $this->conn->query("UPDATE `project_list` set `delete_flag` = 1 where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," item successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_stockin(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `stockin_list` set {$data} ";
		}else{
			$sql = "UPDATE `stockin_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success'," Stock-in Data has been added successfully.");
			else
				$this->settings->set_flashdata('success'," Stock-in Data successfully updated");
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_stockin(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `stockin_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Stock-in Data has been deleted successfully.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_stockout(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `stockout_list` set {$data} ";
		}else{
			$sql = "UPDATE `stockout_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success'," Stock-out Data has been added successfully.");
			else
				$this->settings->set_flashdata('success'," Stock-out Data successfully updated");
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_stockout(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `stockout_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Stock-out Data has been deleted successfully.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_waste(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$v = htmlspecialchars($this->conn->real_escape_string($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `waste_list` set {$data} ";
		}else{
			$sql = "UPDATE `waste_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$cid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success'," Waste Data has been added successfully.");
			else
				$this->settings->set_flashdata('success'," Waste Data successfully updated");
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_waste(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `waste_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Waste Data has been deleted successfully.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'delete_img':
		echo $Master->delete_img();
	break;
	case 'save_category':
		echo $Master->save_category();
	break;
	case 'delete_category':
		echo $Master->delete_category();
	break;
	case 'save_item':
		echo $Master->save_item();
	break;
	case 'delete_item':
		echo $Master->delete_item();
	break;
	case 'save_stockin':
		echo $Master->save_stockin();
	break;
	case 'delete_stockin':
		echo $Master->delete_stockin();
	break;
	case 'save_stockout':
		echo $Master->save_stockout();
	break;
	case 'delete_stockout':
		echo $Master->delete_stockout();
	break;
	case 'save_waste':
		echo $Master->save_waste();
	break;
	case 'delete_waste':
		echo $Master->delete_waste();
	break;
	//fungsi case
	case 'save_costcenter':
		echo $Master->save_costcenter();
	break;
	case 'save_costunit':
		echo $Master->save_costunit();
	break;
	case 'save_namapelanggan':
		echo $Master->save_namapelanggan();
	break;
	case 'save_jenispembayaran':
		echo $Master->save_jenispembayaran();
	break;
	case 'save_penanggungjawab':
		echo $Master->save_penanggungjawab();
	break;
	case 'save_statusprogres':
		echo $Master->save_statusprogres();
	break;
	case 'save_projectlist':
		echo $Master->save_projectlist();
	break;

	default:
		// echo $sysset->index();
		break;
}