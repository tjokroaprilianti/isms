<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.category-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
</style>
<div class="card card-outline rounded-0 card-teal">
	<div class="card-header">
		<h3 class="card-title">List of Cost Unit</h3>
		<!-- <div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="table-responsive">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
					<col width="100%">
				</colgroup>
				<thead>
					<tr>
						<th>id</th>
						<!-- <th>id_project_list</th>
						<th>Cost Center id</th>
						<th>Cost Unit id</th> -->
						<th>Nama Pelanggan</th>
						<th>Jenis Pembayaran</th>
						<th>Penanggung Jawab</th>
						<th>Status Progres</th>
						<th>status</th>
						<th>judul kontrak</th>
						<th>Nilai Kontrak</th>
						<th>Nomor Kontrak</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Berakhir</th>
						<th>Tanggal Tanda Tangan</th>
						<th>Upload Kontrak</th>
						<th>Nama Pic</th>
						<!-- <th>delete flag</th> -->
						<th>Tanggal Update</th>
						<th>Progres</th>
						<th>Kode Progres</th>
						<th>Action</th>
						<!-- <th>Nama Progres</th>
						<th>Status Progres</th> -->
						<!-- <th>delete flag progres</th> -->
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `history` where delete_flag = 0 order by `id` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<!-- <td class="text-center"><?php echo $i++; ?></td> -->
							<td class=""><?= $row['id_project_list'] ?></td>
							<!-- <td class=""><?= $row['cost_center_id'] ?></td>
							<td class=""><?= $row['cost_unit_id'] ?></td> -->
							<td class=""><?= $row['nama_pelanggan_id'] ?></td>
							<td class=""><?= $row['penanggungjawab_id'] ?></td>
							<td class=""><?= $row['status_progres_id'] ?></td>
							
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class=""><?= $row['judul_kontrak'] ?></td>
							<td class=""><?= $row['nilai_kontrak'] ?></td>
							<td class=""><?= $row['nomor_kontrak'] ?></td>
							<td class=""><?= $row['tanggal_mulai'] ?></td>
							<td class=""><?= $row['tanggal_berakhir'] ?></td>
							<td class=""><?= $row['tanggal_tanda_tangan'] ?></td>
							<td class=""><?= $row['upload_kontrak'] ?></td>
							<td class=""><?= $row['nama_pic'] ?></td>
							<!-- <td class=""><?= $row['delete_flag'] ?></td> -->
							<td class=""><?= $row['tanggal_update'] ?></td>
							<td class=""><?= $row['id_progres'] ?></td>
							<td class=""><?= $row['kode_progres'] ?></td>
							<td class=""><?= $row['name_progres'] ?></td>
							<td class=""><?= $row['status_progres'] ?></td>
							<!-- <td class=""><?= $row['delete_flag_progres'] ?></td> -->
							
							<!-- <td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td> -->
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
			_conf("Are you sure to delete this costunit permanently?","delete_costunit",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add New History ","costunit/manage_history.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Add New costunit ","costunit/manage_history.php?id="+$(this).attr('data-id'))
		})
		$('.view-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> History Details ","Costunit/view_hystory.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_costunit($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_costunit",
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