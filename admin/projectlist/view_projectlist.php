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
		<dd class="pl-4"><?= isset($cost_center) ?$cost_center : "" ?></dd>

		<dt class="text-muted">Cost Unit</dt>
		<dd class="pl-4"><?= isset($cost_unit) ? $cost_unit : "" ?></dd>

		<dt class="text-muted">Nama Pelanggan</dt>
		<dd class="pl-4"><?= isset($namapelanggan) ? $namapelanggan : "" ?></dd>

		<dt class="text-muted">Jenis Kontrak</dt>
		<dd class="pl-4"><?= isset($jenispembayaran) ? $jenispembayaran : "" ?></dd>

		<dt class="text-muted">Penanggungjawab</dt>
		<dd class="pl-4"><?= isset($penanggungjawab) ? $penanggungjawab : "" ?></dd>

		<dt class="text-muted">Progres Terkini</dt>
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
		<dd class="pl-4"><?= isset($judul_kontrak) ? $judul_kontrak : "" ?></dd>

		<dt class="text-muted">Nilai Kontrak</dt>
		<dd class="pl-4"><?= isset($nilai_kontrak) ? $nilai_kontrak : "" ?></dd>

		<dt class="text-muted">Nomor Kontrak</dt>
		<dd class="pl-4"><?= isset($nomor_kontrak) ? $nomor_kontrak : "" ?></dd>

		<dt class="text-muted">Tanggal Mulai</dt>
		<dd class="pl-4"><?= isset($tanggal_mulai) ? $tanggal_mulai : "" ?></dd>

		<dt class="text-muted">Tanggal Berakhir</dt>
		<dd class="pl-4"><?= isset($tanggal_berakhir) ? $tanggal_berakhir : "" ?></dd>

<<<<<<< Updated upstream
		<dt class="text-muted">Tanggal Perjanjian</dt>
=======
		<dt class="text-muted">Last Updated</dt>
>>>>>>> Stashed changes
		<dd class="pl-4"><?= isset($tanggal_tanda_tangan) ? $tanggal_tanda_tangan : "" ?></dd>

		<!-- <dt class="file">Upload Kontrak</dt>
		<a href="<?= ("../".$upload_kontrak)?>" class="pl-4"><?= ($upload_kontrak) ? $upload_kontrak : "" ?></a>

		<dt class="text-muted">Nama PIC</dt>
		<dd class="pl-4"><?= isset($nama_pic) ? $nama_pic : "" ?></dd> -->

		<!-- <dt class="text-muted">Description</dt>
		<dd class="pl-4"><?= isset($description) ? str_replace(["\n\r", "\n", "\r"],"<br>", htmlspecialchars_decode($description)) : '' ?></dd> -->
		
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>