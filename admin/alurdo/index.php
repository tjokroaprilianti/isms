
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.item-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
</style>
<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">LIST OF ALUR MONDOC</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered table-striped table-bordered" id="list">
				<colgroup>
					<col width="7%">
					<col width="35%">
					<col width="15%">
					<col width="45%">
					<col width="100%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
					
				</colgroup>
				<thead>
					<tr>
						<th scope="col" align=center>id</th>
						<td align=center>NAMA PROJECT</td>
						<td align=center>KODE PROJECT</td>
						<td align=center>PELANGGAN</td>
						<td align=center>BAPL</td>
						<td align=center>BAPP</td>
						<td align=center>BA EVAL</td>
						<td align=center>DATE UPDATED
						<td align=center>Status</td>
						<td align=center>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `alur_do` where delete_flag = 0 order by `id` asc ");
						while($row = $qry->fetch_assoc()):
					?>
					<tr>
					
							<td class="" align=center>
								<div style="line-height:1em">
									<div><?= $row['id'] ?> </div>
								</div>
							</td>
							<td class="">
								<div style="line-height:1em">
									<div><?= $row['project_do'] ?> </div>
									
								</div> 
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['kode_project'] ?> </div>
									
								</div>
							</td>
							<td class="">
								<div style="line-height:1em">
									<div><?= $row['pelanggan'] ?> </div>
									
								</div>
							</td>
								<td class="">
									<div style="line-height:1em">
										<div><?= $row['bapl'] ?> </div>
										
									</div>
								</td>

                            <td class="">
								<div style="line-height:1em">
									<div><?= $row['bapp'] ?>  </div>
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['ba_eval'] ?>  </div> 
									
								</div>
							</td>	
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_updated'])) ?></td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Paid</span>
                                <?php endif; ?>
                            </td>

							

							
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id_alur_do'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item history-data" href="javascript:void(0)" data-id="<?php echo $row['id_alur_do'] ?>"><span class="fa fa-eye text-dark"></span> History</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id_alur_do'] ?>"><span class="fa fa-edit text-primary"></span> Update</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id_alur_do'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
							
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Item permanently?","delete_alurdo",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add New Item ","alurdo/manage_alurdo.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Edit Item ","alurdo/manage_alurdo.php?id="+$(this).attr('data-id'))
			
		})
		$('.view-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> ALUR DO  Details ","alurdo/view_alurdo.php?id="+$(this).attr('data-id'))
		})
		$('.history-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> ALUR DO History Details ","alurdo/history_alurdo.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_item($id){ 
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_alurdo",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>