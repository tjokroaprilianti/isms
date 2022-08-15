<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT i.*, i.id as id_projectlist, c.*, d.*, c.name as `cost_center`, d.name as `cost_unit` , e.name as `namapelanggan` , f.name as jenispembayaran , g.name as penanggungjawab , h.name as `statusprogres`
    	from `project_list` i 
    	join cost_center_list c on i.cost_center_id = c.id 
    	join cost_unit_list d on i.cost_unit_id = d.id 
    	join nama_pelanggan_list e on i.nama_pelanggan_id = e.id
    	join jenis_pembayaran_list f on i.jenis_pembayaran_id = f.id 
		join penanggungjawab_list g on i.penanggungjawab_id = g.id
		join status_progres_list h on h.id = i.status_progres_id
    	where i.id = '{$_GET['id']}' and i.delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("item ID is not valid."); location.replace("./?page=alurdo")</script>';
	}
}else{
	echo '<script>alert("item ID is Required."); location.replace("./?page=alurdo")</script>';
}
?>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">NAMA PROJECT</dt>
		<dd class="pl-4"><?= isset($project_do) ?$project_do : "" ?></dd>

		<dt class="text-muted">KODE PROJECT</dt>
		<dd class="pl-4"><?= isset($kode_project) ? $kode_project : "" ?></dd>

		<dt class="text-muted">PELANGGAN</dt>
		<dd class="pl-4"><?= isset($pelanggan) ? $pelanggan : "" ?></dd>

		<dt class="text-muted">BAPL</dt>
		<dd class="pl-4"><?= isset($bapl) ? $bapl : "" ?></dd>

		<dt class="text-muted">BAPP</dt>
		<dd class="pl-4"><?= isset($bapp) ? $bapp : "" ?></dd>

		<dt class="text-muted">BA EVAL</dt>
		<dd class="pl-4"><?= isset($ba_eval) ? $ba_eval : "" ?></dd>

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