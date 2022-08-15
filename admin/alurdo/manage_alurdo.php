<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `alur_do` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="alurdo-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		
		<!-- AWAL NAMA PROJECT -->
		<div class="form-group">
			<div class="form-group">
			<label for="project_do" class="control-label">NAMA PROJECT</label>
			<input type="text" name="project_do" id="project_do" class="form-control form-control-sm rounded-0" value="<?php echo isset($project_do) ? $project_do : ''; ?>"  required/>
		</div>
		
		<!-- BATAS NAMA PROJECT -->
		
		<div class="form-group">
			<div class="form-group">
			<label for="kode_project" class="control-label">KODE PROJECT</label>
			<input type="text" name="kode_project" id="kode_project" class="form-control form-control-sm rounded-0" value="<?php echo isset($kode_project) ? $kode_project : ''; ?>"  required/>
		</div>
		
		<!-- BATAS KODE PROJECT -->
		
			<label for="pelanggan" class="control-label">NAMA PELANGGAN</label>
			<?php 
				$x=0;
				$items_np = $conn->query("SELECT * FROM `nama_pelanggan_list` where delete_flag = 0 and `status` = 1 ");
				while($row31= $items_np->fetch_assoc()):
				
				if( (!empty($pelanggan)) && (($row31['id']) == ($pelanggan)) ){
				?>
					<select name="pelanggan" id="pelanggan" class="form-control form-control-sm rounded-0"  >
				
						
					<option value="<?= $row31['id'] ?>" selected><?= $row31['name'] ?></option>
					</select>
					<?php
				}if(empty($pelanggan)){
					$x++;
					if($x==1){ ?>
						<select name="pelanggan" id="pelanggan" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($pelanggan) ? 'selected' : '' ?>></option>
					<?php 
					$items_np1 = $conn->query("SELECT * FROM `nama_pelanggan_list` where delete_flag = 0 and `status` = 1 ");
					while($row3= $items_np1->fetch_assoc()):

				?>
					<option value="<?= $row3['id'] ?>" <?php echo isset($meta['type']) && $meta['type'] == $row3['id'] ? 'selected' : '' ?>><?= $row3['name'] ?></option>
				<?php
					endwhile;
				?>
					</select>
				<?php
					}
				}
				 endwhile; 
				?>

		</div>

		<!-- Batas NAMA PELANGGAN --> 

		<div class="form-group">
			<label for="status" class="control-label">BAPL</label>
			<select name="bapl" id="bapl" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($bapl) && $bapl == 1 ? 'selected' : '' ?>>ADA</option>
				<option value="0" <?= isset($bapl) && $bapl == 0 ? 'selected' : '' ?>>TIDAK ADA</option>
			</select>
		</div>

		<!-- BATAS BAPL -->

		<div class="form-group">
			<label for="status" class="control-label">BAPP</label>
			<select name="bapp" id="bapp" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($bapp) && $bapp == 1 ? 'selected' : '' ?>>ADA</option>
				<option value="0" <?= isset($bapp) && $bapp == 0 ? 'selected' : '' ?>>TIDAK ADA</option>
			</select>
		</div>

		<!-- BATAS BAPP -->

		<div class="form-group">
			<label for="ba_eval" class="control-label">BA EVAL</label>
			<select name="ba_eval" id="ba_eval" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($ba_eval) && $ba_eval == 1 ? 'selected' : '' ?>>ADA</option>
				<option value="0" <?= isset($ba_eval) && $ba_eval == 0 ? 'selected' : '' ?>>TIDAK ADA</option>
			</select>
		</div>

		<!-- BATAS BA EVAL -->

		<div class="form-group">
			<label for="status" class="control-label">STATUS</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>
		</div>
		<!-- <div class="form-group">
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
			
			<input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control form-control-sm rounded-0" value="<?php echo date('Y-m-d',strtotime($tanggal_mulai)) ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Tanggal Berakhir</label>
			<input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control form-control-sm rounded-0" value="<?php echo date('Y-m-d',strtotime($tanggal_berakhir)) ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Tanggal Perjanjian</label>
			<input type="date" name="tanggal_tanda_tangan" id="tanggal_tanda_tangan" class="form-control form-control-sm rounded-0" value="<?php echo date('Y-m-d',strtotime($tanggal_tanda_tangan)) ?>"  required/>
		</div>
		
		<div class="form-group">
			<label for="name" class="control-label">Upload Kontrak </label>
			<input type="file" name="upload_kontrak" id="upload_kontrak" class="form-control form-control-sm rounded-0" value="<?php echo isset($upload_kontrak)  ?>"  required/>
		</div>

		<div class="form-group">
			<label for="name" class="control-label">Nama PIC</label>
			<input type="text" name="nama_pic" id="nama_pic" class="form-control form-control-sm rounded-0" value="<?php echo isset($nama_pic) ? $nama_pic : ''; ?>"  required/>
		</div>
	</form>
</div> -->

		
<script>
	$(document).ready(function(){
		/*$('#uni_modal').on('shown.bs.modal', function(){
			$('#category_id').select2({
				placeholder:"Select Category Here",
				width:'100%',
				containerCssClass:'form-control form-control-sm rounded-0',
				dropdownParent:$('#uni_modal')
			})
		})*/
		$('#alurdo-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_alurdo",
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
						uni_modal("<i class='fa fa-th-list'></i> ALUR DO Details ","alurdo/view_alurdo.php?id="+resp.id)
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