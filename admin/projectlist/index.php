
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
		<h3 class="card-title">List of Project</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered table-striped table-bordered" id="list">
				<colgroup>
					<col width="20%">
					<col width="10%">
					<col width="20%">
					<col width="20%">
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
						<th scope="col" align=center>id</th>
						<td align=center>Status Kontrak</td>
						<td align=center>Cost Center</td>
						<td align=center>Cost Unit</td>
						<td align=center>Nama Pelanggan</td>
						<td align=center>Jenis Pembayaran</td>
						<td align=center>Penanggung Jawab</td>
						<td align=center>Status Progres</td>
						
						<td align=center>Judul Kontrak</td>
						<td align=center>Nilai Kontrak</td>
						<td align=center>Nomor Kontrak</td>
						<td align=center>Tanggal Mulai</td>
						<td align=center>Tanggal Berakhir</td>
						<td align=center>Tanggal Tanda Tangan</td>
						<td align=center>Upload Kontrak</td>
						<td align=center>Nama PIC</td>
						<td align=center>Status</td>
						<td align=center>Action</td>
						
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						/*$qry = $conn->query("SELECT i.*, c.name as `cost_center_list``cost_unit_list``nama_pelanggan_list``jenis_pembayaran_list` `penanggungjawab_list``status_progres_list`from `project_list` i inner join project_list c on i.project_list_id = c.id where i.delete_flag = 0 order by i.`name` asc ");*/
						$qry = $conn->query("SELECT i.*, i.id as id_projectlist, c.*, d.*, c.name as `cost_center`, d.name as `cost_unit` , e.name as nama_pelanggan , f.name as jenis_pembayaran , g.name as penanggungjawab ,  i.tanggal_mulai as tanggal_mulai_project , h.name as status_progres
							from `project_list` i 
							join cost_center_list c on i.cost_center_id = c.id 
							join cost_unit_list d on i.cost_unit_id = d.id 
							join nama_pelanggan_list e on i.nama_pelanggan_id = e.id 
							join jenis_pembayaran_list f on i.jenis_pembayaran_id = f.id 
							join penanggungjawab_list g on i.penanggungjawab_id = g.id
							join status_progres_list h on h.id = i.status_progres_id
							
							order by `id_projectlist` asc");
						$qry2 = $conn->query("SELECT * from status_progres_list

						 Order by  `id` DESC LIMIT 1 ");
						//join project_list h on h.id=
						while($row = $qry->fetch_assoc()):
					?>
					<tr>
					
							<td class="" align=center>
								<div style="line-height:1em">
									<div><?= $row['id_projectlist'] ?> </div>
								</div>
							</td>
							<td class="" align=center>
								<?php
									if($row['status_progres_id']<6){
										$status_selesai = "selesai";
										?>
										<svg height="20" width="20">
										  <circle cx="10" cy="10" r="8" stroke="black" stroke-width="1" fill="red" />
										</svg>
										<?php
									}
									elseif($row['status_progres_id']<14){
										$status_selesai = "PROGRESS";
										?>
										<svg height="20" width="20">
										  <circle cx="10" cy="10" r="8" stroke="black" stroke-width="1" fill="yellow" />
										</svg>
										<?php
									}
									elseif($row['status_progres_id']>13){
										$status_selesai = "PROGRESS";
										?>
										<svg height="20" width="20">
										  <circle cx="10" cy="10" r="8" stroke="black" stroke-width="1" fill="green" />
										</svg>
										<?php
									}else {
										$status_selesai = "PROGRESS";
										?>
										
										
										<?php
									}
								?>
								
								
							</td>
							<td class="" align=center>
								<div style="line-height:1em">
									<div><?= $row['cost_center'] ?> </div>
									
								</div>
							</td>

							<td class="" align=center>
								<div style="line-height:1em">
									<div><?= $row['cost_unit'] ?> </div>
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['nama_pelanggan'] ?> </div>
									
								</div> 
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['jenis_pembayaran'] ?> </div>
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['penanggungjawab'] ?> </div>
									
								</div>
							</td>
							<?php
							/*$rowcount=mysqli_num_rows($qry2);
							$name_progres="";
							if($rowcount > 0){
										
									
									while($row2 = $qry2->fetch_assoc()):
									
									
										$name_progres=$row2['name'];
									endwhile; 
									}if($rowcount == 0){
										$name_progres = "-";
									}*/
							?>
								
								<!-- <td class="">
									<div style="line-height:1em">
										<div><?= $name_progres ?> </div>
										
									</div>
								</td> -->
								<td class="">
									<div style="line-height:1em">
										<div><?= $row['status_progres'] ?> </div>
										
									</div>
								</td>
							

							
							


                            <td class="">
								<div style="line-height:1em">
									<div><?= $row['judul_kontrak'] ?>  </div>
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['nilai_kontrak'] ?>  </div> 
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['nomor_kontrak'] ?> </div>
									
								</div>
							</td>
							


							<!-- <td class="text-center"><?php //echo $i++; ?></td> -->
							<td><?php echo date("Y-m-d H:i",strtotime($row['tanggal_mulai'])) ?></td>
							
							<!-- <td class="text-center"><?php //echo $i++; ?></td> -->
							<td><?php echo date("Y-m-d H:i",strtotime($row['tanggal_berakhir'])) ?></td>

							<!-- <td class="text-center"><?php //echo $i++; ?></td> -->
							<td><?php echo date("Y-m-d H:i",strtotime($row['tanggal_tanda_tangan'])) ?></td>

							<td class="">
								<div style="line-height:1em">
									<div><a href="<?= ("../".$row['upload_kontrak'])?>" class="pl-4"><?= ($row['upload_kontrak']) ? $row['upload_kontrak'] : "" ?></a> </div>
									
								</div>
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['nama_pic'] ?>  </div>
									
								</div>
							</td>
							<td class="text-center">
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            </td>

							

							
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id_projectlist'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id_projectlist'] ?>"><span class="fa fa-edit text-primary"></span> Update</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id_projectlist'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
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
			_conf("Are you sure to delete this Item permanently?","delete_projectlist",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='far fa-plus-square'></i> Add New Item ","projectlist/manage_projectlist.php")
		})
		$('.edit-data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Edit Item ","projectlist/manage_projectlist.php?id="+$(this).attr('data-id'))
			
		})
		$('.view-data').click(function(){
			uni_modal("<i class='fa fa-th-list'></i> Project  Details ","projectlist/view_projectlist.php?id="+$(this).attr('data-id'))
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
			url:_base_url_+"classes/Master.php?f=delete_projectlist",
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