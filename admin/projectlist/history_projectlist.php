<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT i.*, c.*, d.*, c.name as `cost_center`, d.name as `cost_unit` , e.name as `namapelanggan` , f.name as jenispembayaran , g.name as penanggungjawab , h.name as `statusprogres`
    	from `history` i 
    	join cost_center_list c on i.cost_center_id = c.id 
    	join cost_unit_list d on i.cost_unit_id = d.id 
    	join nama_pelanggan_list e on i.nama_pelanggan_id = e.id
    	join jenis_pembayaran_list f on i.jenis_pembayaran_id = f.id 
		join penanggungjawab_list g on i.penanggungjawab_id = g.id
		join status_progres_list h on h.id = i.status_progres_id
    	where i.id_project_list = '{$_GET['id']}' and i.delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
		echo '<script>alert("Belum ada history nih."); location.replace("./?page=projectlist")</script>';
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
						<td align=center>Tanggal Perjanjian</td>
						<td align=center>Tanggal Update</td>
						<td align=center>Lama Proses</td>
						<td align=center>Upload Kontrak</td>
						<td align=center>Nama PIC</td>
						<td align=center>Status</td>
						
						
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						/*$qry = $conn->query("SELECT i.*, c.name as `cost_center_list``cost_unit_list``nama_pelanggan_list``jenis_pembayaran_list` `penanggungjawab_list``status_progres_list`from `project_list` i inner join project_list c on i.project_list_id = c.id where i.delete_flag = 0 order by i.`name` asc ");*/
						
						//join project_list h on h.id=
						$qry1 = $conn->query("SELECT i.*, c.*, d.*, c.name as `cost_center`, d.name as `cost_unit` , e.name as `namapelanggan` , f.name as jenispembayaran , g.name as penanggungjawab , h.name as `statusprogres`
				    	from `history` i 
				    	join cost_center_list c on i.cost_center_id = c.id 
				    	join cost_unit_list d on i.cost_unit_id = d.id 
				    	join nama_pelanggan_list e on i.nama_pelanggan_id = e.id
				    	join jenis_pembayaran_list f on i.jenis_pembayaran_id = f.id 
						join penanggungjawab_list g on i.penanggungjawab_id = g.id
						join status_progres_list h on h.id = i.status_progres_id
				    	where i.id_project_list = '{$_GET['id']}' and i.delete_flag = 0 ");
						while($row = $qry1->fetch_assoc()):
					?>
					<tr>
					
							<td class="" align=center>
								<div style="line-height:1em">
									<div><?= $row['id_project_list'] ?> </div>
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
									<div><?= $row['namapelanggan'] ?> </div>
									
								</div> 
							</td>

							<td class="">
								<div style="line-height:1em">
									<div><?= $row['jenispembayaran'] ?> </div>
									
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
										<div><?= $row['statusprogres'] ?> </div>
										
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
							<td><?php echo date("Y-m-d H:i",strtotime($row['tanggal_update'])) ?></td>




							<td>

													<?php
													$diff = (new DateTime($history_projectlist[$arr - 1]->tanggal_update))->diff(new DateTime($history_projectlist[$arr]->tanggal_update));
													echo $diff->d . " hari /" . $diff->h . " jam /" . $diff->i . " menit /" . $diff->s . " detik";
													
													?>
												</td>

							<!-- Awal Lama Proses -->

							<!-- <?php if (($h->status_histori == 'MENUNGGU')) { ?>
												<td>
													<?php $diff = (new DateTime($h->created_at_histori))->diff($date2);
													echo  $diff->d . " hari /" . $diff->h . " jam /" . $diff->i . " menit /" . $diff->s . " detik";
													//$date_awal = (new DateTime($h->created_at_histori));
													?>
												</td>
											<?php } elseif ((($h->status_histori == 'DITERIMA') || ($h->status_histori == 'DITOLAK')) && (($countHistory + 1) > 0)) {  // 
											?>
												<td>

													<?php
													$diff = (new DateTime($histori[$arr - 1]->created_at_histori))->diff(new DateTime($histori[$arr]->created_at_histori));
													echo $diff->d . " hari /" . $diff->h . " jam /" . $diff->i . " menit /" . $diff->s . " detik";
													
													?>
												</td>


											<?php } elseif (($h->status_histori == 'DI PROSES') && ($countHistory + 1) > 0 && $arr != 0) {  // 
												
											?>
												<td>

													<?php
													$diff = (new DateTime($histori[$arr - 1]->created_at_histori))->diff(new DateTime($histori[$arr]->created_at_histori));
													echo $diff->d . " hari /" . $diff->h . " jam /" . $diff->i . " menit /" . $diff->s . " detik";

													?>
												</td>
											<?php } elseif (($h->status_histori == 'DI PROSES') && ($countHistory + 1) > 0 && $arr == 0) {  // 
											?>
												<td>

													<?php
													$diff = (new DateTime($histori[$arr]->created_at_histori))->diff($date2);
													echo $diff->d . " hari /" . $diff->h . " jam /" . $diff->i . " menit /" . $diff->s . " detik";
													?>
												</td>

											<?php } elseif ($h->status_histori == 'SELESAI') {
											?>
												<td>
													<?php
													?>
												</td>
											<?php  }
											?> -->



							<!-- Akhir Lama Proses -->

						
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

							

							
							
							
						</tr>
					<?php 
					$i++;
				endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

	
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>