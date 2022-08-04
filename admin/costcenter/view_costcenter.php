<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `cost_center_list` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("Cost Center ID is not valid."); location.replace("./?page=costcenter")</script>';
	}
}else{
	echo '<script>alert("Cost Center ID is Required."); location.replace("./?page=costcenter")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>

		<dt class="text-muted">Id</dt>
		<dd class="pl-4"><?= isset($id) ? $id : "" ?></dd>
		<dt class="text-muted">Kode</dt>
		<dd class="pl-4"><?= isset($kode) ? $kode : "" ?></dd>
		<dt class="text-muted">Nama</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
		<!-- <dt class="text-muted">Date Created</dt>
		<dd class="pl-4"><?= isset($date_created) ? $date_created : "" ?></dd> -->
		<dt class="text-muted">Date Updated</dt>
		<dd class="pl-4"><?= isset($date_updated) ? $date_updated : "" ?></dd>
		

		<!-- <dt class="text-muted">Description</dt>
		<dd class="pl-4"><?= isset($description) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($description)) : '' ?></dd> -->
		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<?php if($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd>
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>