<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `status_progres_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="statusprogres-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="kode" class="control-label">Kode Project</label>
			<!-- <select name="kode" id="kode" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($kode) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `project_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?php echo isset($meta['type']) && $meta['type'] == $row['id'] ? 'selected' : '' ?>><?= $row['judul_kontrak'] ?></option>
				<?php endwhile; ?>
			</select> -->
			<input type="text" name="kode" id="kode" class="form-control form-control-sm rounded-0" value="<?php echo isset($kode) ? $kode : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Nama</label>
			<textarea rows="3" name="name" id="name" class="form-control form-control-sm rounded-0" required><?php echo isset($name) ? $name : ''; ?></textarea>
		</div>
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
		$('#statusprogres-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_statusprogres",
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
						uni_modal("<i class='fa fa-th-list'></i> Statusprogres Details ","statusprogres/view_statusprogres.php?id="+resp.cid)
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