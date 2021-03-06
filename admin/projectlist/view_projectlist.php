<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT i.*, i.id as id_projectlist, c.*, d.*, c.name as `cost_center`, d.name as `cost_unit`  from `project_list` i join cost_center_list c on i.cost_center_id = c.id join cost_unit_list d on i.cost_unit_id = d.id where i.id = '{$_GET['id']}' and i.delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("item ID is not valid."); location.replace("./?page=projectlist")</script>';
	}
}else{
	echo '<script>alert("item ID is Required."); location.replace("./?page=projectlist")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">Cost Center</dt>
		<dd class="pl-4"><?= isset($cost_center_list) ? $name : "" ?></dd>

		<dt class="text-muted">Cost Unit</dt>
		<dd class="pl-4"><?= isset($cost_unit) ? $name : "" ?></dd>

		<dt class="text-muted">Nama Pelanggan</dt>
		<dd class="pl-4"><?= isset($namapelanggan) ? $namapelanggan : "" ?></dd>

		<dt class="text-muted">Jenis Pembayaran</dt>
		<dd class="pl-4"><?= isset($jenispembayaran) ? $jenispembayaran : "" ?></dd>

		<dt class="text-muted">Penanggungjawab</dt>
		<dd class="pl-4"><?= isset($penanggungjawab) ? $penanggungjawab : "" ?></dd>

		<dt class="text-muted">Status Progres</dt>
		<dd class="pl-4"><?= isset($statusprogres) ? $statusprogres : "" ?></dd>

		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<?php if($status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?>
		</dd>

		<dt class="text-muted">Judul Kontrak</dt>
		<dd class="pl-4"><?= isset($judulkontrak) ? $name : "" ?></dd>

		<dt class="text-muted">Nilai Kontrak</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="text-muted">Nomor Kontrak</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="text-muted">Tanggal Mulai</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="text-muted">Tanggal Berakhir</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="text-muted">Tanggal Tanda Tangan</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="file">Upload Kontrak</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<dt class="text-muted">Nama PIC</dt>
		<dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>

		<!-- <dt class="text-muted">Description</dt>
		<dd class="pl-4"><?= isset($description) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($description)) : '' ?></dd> -->
		
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>