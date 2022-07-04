<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `project_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="item-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<!-- <div class="form-group">
			<label for="category_id" class="control-label">Category</label>
			<select name="category_id" id="category_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($category_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div> -->

		<!-- Batas Categori -->
		<div class="form-group">
			<label for="cost_center_id" class="control-label">Cost Center</label>
			<select name="cost_center_id" id="cost_center_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($cost_center_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `cost_center_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($cost_center_id) && $cost_center_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<!-- Batas CC -->
		<div class="form-group">
			<label for="cost_unit_id" class="control-label">Cost Unit</label>
			<select name="cost_unit_id" id="cost_unit_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($cost_unit_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `cost_unit_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($cost_unit_id) && $cost_unit_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<!-- Batas CU -->
		<div class="form-group">
			<label for="nama_pelanggan_id" class="control-label">Nama Pelanggan</label>
			<select name="nama_pelanggan_id" id="nama_pelanggan_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($nama_pelanggan_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `nama_pelanggan_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($nama_pelanggan_id) && $nama_pelanggan_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<!-- Batas NP -->
		<div class="form-group">
			<label for="jenis_pembayaran_id" class="control-label">Jenis Pembayaran</label>
			<select name="jenis_pembayaran_id" id="jenis_pembayaran_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($jenis_pembayaran_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `jenis_pembayaran_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($jenis_pembayaran_id) && $jenis_pembayaran_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<!-- Batas JP -->
		<div class="form-group">
			<label for="penanggungjawab_id" class="control-label">Penanggungjawab</label>
			<select name="penanggungjawab_id" id="penanggungjawab_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($penanggungjawab_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `penanggungjawab_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($penanggungjawab_id) && $penanggungjawab_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>
		<!-- Batas PJ -->
		<div class="form-group">
			<label for="status_progres_id" class="control-label">Status Progres</label>
			<select name="status_progres_id" id="status_progres_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($status_progres_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `status_progres_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($status_progres_id) && $status_progres_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Judul Kontrak</label>
			<input type="text" name="judul_kontrak" id="judul_kontrak" class="form-control form-control-sm rounded-0" value="<?php echo isset($judul_kontrak) ? $judul_kontrak : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="unit" class="control-label">Nilai Kontrak</label>
			<input type="text" name="nilai_kontrak" id="nilai_kontrak" class="form-control form-control-sm rounded-0" value="<?php echo isset($nilai_kontrak) ? $nilai_kontrak : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Nomor Kontrak</label>
			<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="form-control form-control-sm rounded-0" value="<?php echo isset($nomor_kontrak) ? $nomor_kontrak : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Tanggal Mulai</label>
			<input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control form-control-sm rounded-0" value="<?php echo isset($tanggal_mulai) ? $tanggal_mulai : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Tanggal Berakhir</label>
			<input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control form-control-sm rounded-0" value="<?php echo isset($tanggal_berakhir) ? $tanggal_berakhir : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Tanggal Tanda Tangan</label>
			<input type="date" name="tanggal_tanda_tangan" id="tanggal_tanda_tangan" class="form-control form-control-sm rounded-0" value="<?php echo isset($tanggal_tanda_tangan) ? $tanggal_tanda_tangan : ''; ?>"  required/>
		</div>
		
		<div class="form-group">
			<label for="name" class="control-label">Upload Kontrak </label>
			<input type="file" name="upload_kontrak" id="upload_kontrak" class="form-control form-control-sm rounded-0" value="<?php echo isset($upload_kontrak) ? $upload_kontrak : ''; ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Nama PIC</label>
			<input type="text" name="nama_pic" id="nama_pic" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
	</form>
</div>

		
<script>
	$(document).ready(function(){
		$('#uni_modal').on('shown.bs.modal', function(){
			$('#category_id').select2({
				placeholder:"Select Category Here",
				width:'100%',
				containerCssClass:'form-control form-control-sm rounded-0',
				dropdownParent:$('#uni_modal')
			})
		})
		$('#item-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_item",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						// location.reload()
						alert_toast(resp.msg, 'success')
						uni_modal("<i class='fa fa-th-list'></i> item Details ","items/view_item.php?id="+resp.iid)
						$('#uni_modal').on('hide.bs.modal', function(){
							location.reload()
						})
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").scrollTop(0);
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>