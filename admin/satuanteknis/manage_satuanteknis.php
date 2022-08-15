<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `satuan_teknis` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="satuanteknis-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<!-- Bates ID -->
		<div class="form-group">
			<label for="cc" class="control-label">Cost Center</label>
			<?php 
				$x=0;
				$items = $conn->query("SELECT * FROM `cost_center_list` where delete_flag = 0 and `status` = 1 ");
				while($row1= $items->fetch_assoc()):
				if(empty($cc)){
					$x++;
					if($x==1){ ?>
						<select name="cc" id="cc" class="form-control form-control-sm rounded-0"  required="required">
						<option value="" <?= isset($cc) ? 'selected' : '' ?>></option>
					<?php 
					$items1 = $conn->query("SELECT * FROM `cost_center_list` where delete_flag = 0 and `status` = 1 ");
					while($row= $items1->fetch_assoc()):

				?>
				<option value="<?= $row['id'] ?>" <?php echo isset($meta['type']) && $meta['type'] == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
					
				<?php
					endwhile;
				?>
				</select>
				<?php
				}}
				if( (!empty($cc)) && (($row1['id']) == ($cc)) ){
				?>
					
						<select name="cc" id="cc" class="form-control form-control-sm rounded-0"   >
						
					<option value="<?= $row1['id'] ?>" selected><?= $row1['name'] ?></option>
					</select>
					<?php
				}
				
				 endwhile; 
				?>

		</div>
		<!-- Bates CC -->

		<div class="form-group">
			<label for="cu" class="control-label">Cost Unit</label>
			
				<?php 
				$x=0;
				$items_cu = $conn->query("SELECT * FROM `cost_unit_list` where delete_flag = 0 and `status` = 1 ");
				while($row21= $items_cu->fetch_assoc()):
				if( (!empty($cu)) && (($row21['id']) == ($cu)) ){
				?>
					<select name="cu" id="cu" class="form-control form-control-sm rounded-0"  >
						
					<option value="<?= $row21['id'] ?>" selected><?= $row21['name'] ?></option>
					</select>
					<?php
				}if(empty($cu)){
					$x++;
					if($x==1){ ?>
						<select name="cu" id="cu" class="form-control form-control-sm rounded-0"  required="required">
						<option value="" <?= isset($cu) ? 'selected' : '' ?>></option>
					<?php 
					$items_cu1 = $conn->query("SELECT * FROM `cost_unit_list` where delete_flag = 0 and `status` = 1 ");
					while($row2= $items_cu1->fetch_assoc()):

				?>
				
						
						<option value="<?= $row2['id'] ?>" <?php echo isset($meta['type']) && $meta['type'] == $row2['id'] ? 'selected' : '' ?>><?= $row2['name'] ?></option>
					
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
		<!-- Batas CU -->

		<div class="form-group">
			<label for="pelanggan" class="control-label">Nama Pelanggan</label>
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

		<!-- BATAS PELANGGAN -->

		<div class="form-group">
			<label for="kode" class="control-label">NAMA PROJECT</label>
			<input type="text" name="nama_project" id="nama_project" class="form-control form-control-sm rounded-0" value="<?php echo isset($nama_project) ? $nama_project : ''; ?>"  required/>
		</div>

		<!-- BATAS NAMA PROJECT -->

		<div class="form-group">
			<label for="name" class="control-label">NILAI KONTRAK</label>
			<textarea rows="3" name="nilai_kontrak" id="nilai_kontrak" class="form-control form-control-sm rounded-0" required><?php echo isset($nilai_kontrak) ? $nilai_kontrak : ''; ?></textarea>
		</div>
		<!-- BATAS NILAI KONTRAK -->

		<div class="form-group">
			<label for="skema_pembayaran" class="control-label">SKEMA PEMBAYARAN</label>
			<?php 
				$x=0;
				$items_np = $conn->query("SELECT * FROM `jenis_pembayaran_list` where delete_flag = 0 and `status` = 1 ");
				while($row31= $items_np->fetch_assoc()):
				
				if( (!empty($skema_pembayaran)) && (($row31['id']) == ($skema_pembayaran)) ){
				?>
					<select name="skema_pembayaran" id="skema_pembayaran" class="form-control form-control-sm rounded-0"  >
				
						
					<option value="<?= $row31['id'] ?>" selected><?= $row31['name'] ?></option>
					</select>
					<?php
				}if(empty($skema_pembayaran)){
					$x++;
					if($x==1){ ?>
						<select name="skema_pembayaran" id="skema_pembayaran" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($skema_pembayaran) ? 'selected' : '' ?>></option>
					<?php 
					$items_np1 = $conn->query("SELECT * FROM `jenis_pembayaran_list` where delete_flag = 0 and `status` = 1 ");
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

		<!-- BATAS SKEMA PEMBAYARAN -->

		<div class="form-group">
			<label for="pic" class="control-label">PIC</label>
			<textarea rows="3" name="pic" id="pic" class="form-control form-control-sm rounded-0" required><?php echo isset($pic) ? $pic : ''; ?></textarea>
		</div>
		<!-- BATAS PIC -->

		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#satuanteknis-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_satuanteknis",
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
						uni_modal("<i class='fa fa-th-list'></i> Satuan Teknis Details ","satuanteknis/view_satuanteknis.php?id="+resp.cid)
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