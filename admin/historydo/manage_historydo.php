<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){

    /*$qry = $conn->query("SELECT * from `item_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");
*/
    $qry = $conn->query("SELECT * from `cost_unit_list` where id = '{$_GET['id']}' and `delete_flag` = 0 ");

    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">

	<form action="" id="history-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="project_list_id" class="control-label">Nama Kontrak</label>
			<select name="project_list_id" id="project_list_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($project_list_id) ? 'selected' : '' ?>></option>
				<?php 
				$history = $conn->query("SELECT * FROM `project_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $history->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($project_list_id) && $project_list_id == $row['namakontrak'] ? 'selected' : '' ?>><?= $row['namakontrak'] ?></option>
				<?php endwhile; ?>
			</select>
		</div>


		input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="project_list_id" class="control-label">Nama Kontrak</label>
			<select name="project_list_id" id="project_list_id" class="form-control form-control-sm rounded-0" required="required">
				<option value="" <?= isset($category_id) ? 'selected' : '' ?>></option>
				<?php 
				$items = $conn->query("SELECT * FROM `category_list` where delete_flag = 0 and `status` = 1 ");
				while($row= $items->fetch_assoc()):
				?>
				<option value="<?= $row['id'] ?>" <?= isset($category_id) && $category_id == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
				<?php endwhile; ?>
			</select>
		</div> 
		<div class="form-group">
			<label for="name" class="control-label">Nama Kontrak</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="unit" class="control-label">Status Progres</label>
			<input type="text" name="unit" id="unit" class="form-control form-control-sm rounded-0" value="<?php echo isset($unit) ? $unit : ''; ?>"  required/>
		</div>
		<!-- <div class="form-group">
			<label for="description" class="control-label">Description</label>
			<textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea> -->

	<form action="" id="costunit-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="kode" class="control-label">Kode</label>
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

		$('#uni_modal').on('shown.bs.modal', function(){
			$('#category_id').select2({
				placeholder:"Select Category Here",
				width:'100%',
				containerCssClass:'form-control form-control-sm rounded-0',
				dropdownParent:$('#uni_modal')
			})
		})
		$('#item-form').submit(function(e){

		$('#costunit-form').submit(function(e){

			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({

				url:_base_url_+"classes/Master.php?f=save_item",

				url:_base_url_+"classes/Master.php?f=save_costunit",

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

						uni_modal("<i class='fa fa-th-list'></i> Costunit Details ","costunit/view_costunit.php?id="+resp.cid)

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