
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0">Data Kategori</h3>
			</div>
		</div>
		<div class="content-body">
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								<a class="btn btn-primary" href="" data-toggle="modal" data-target="#modalAdd">Tambah Data</a></h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<p>
										<?php if($this->session->flashdata('success')){ ?>
											<div class="alert alert-success">
												<a href="#" class="close" data-dismiss="alert">&times;</a>
												<strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
											</div>
										<?php } else if($this->session->flashdata('error')){?>
											<div class="alert alert-warning">
												<a href="#" class="close" data-dismiss="alert">&times;</a>
												<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
											</div>
										<?php }?>
									</p>

									<div class="table-responsive">
										<table class="table table-striped table-bordered complex-headers">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Keterangan</th>
													<th>Gambar</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($kategori as $i)  : ?>
													<tr>
														<td><?php echo $i['kategori_nama'];?></td>
														<td><?php echo $i['kategori_ket'];?></td>
														<td>    <img class="card-img-top img-fluid" src="<?php echo base_url().'assets/images/'.$i['kategori_gambar'];?>" alt="Card image cap" style="width:50px;height: 50px"></td>
														<td class=" text-center">
															<div class="btn-group mr-1 mb-1">
																<button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['kategori_id']; ?>">Edit</a>
																	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['kategori_id']; ?>">Hapus</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel34">Tambah Kategori</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url()?>BackendC/save_kategori" method="POST" enctype="multipart/form-data">
						<div class="modal-body">

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Judul Kategori: </label>
										<input type="text" placeholder="kategori_nama" name="kategori_nama" class="form-control">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Keterangan: </label>
										<textarea name="keterangan" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Gambar: </label>
										<input type="file" name="filefoto" class="dropzone dropzone-area col-12" id="dpz-single-file">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
							<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php foreach ($kategori as $i)  : ?>
			<div class="modal fade text-left" id="modalEdit<?php echo $i['kategori_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Edit Kategori</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>BackendC/edit_kategori" method="POST" enctype="multipart/form-data">
							<div class="modal-body">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Kategori Nama: </label>
											<input type="text" placeholder="Kategoriname" name="kategori_nama" class="form-control" value="<?php echo $i['kategori_nama']; ?>" >
											<input type="hidden" placeholder="Kategoriname" name="kategori_id" class="form-control" value="<?php echo $i['kategori_id']; ?>" readonly="readonly">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Keterangan: </label>
											<textarea name="keterangan" class="form-control"><?php echo $i['kategori_ket']; ?></textarea>
										</div>
									</div>
								</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Gambar: </label>
										<input type="file" name="filefoto" class="dropzone dropzone-area col-12" id="dpz-single-file">
									</div>
								</div>
							</div>
							</div>
							<div class="modal-footer">
								<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
								<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>


			<?php
		endforeach;
		foreach ($kategori as $i)  : 
			?>

			<div class="modal fade text-left" id="modalHapus<?php echo $i['kategori_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo base_url()?>BackendC/delete_kategori" method="POST">
							<div class="modal-body bg-danger">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" name="kategori_id" value="<?php echo $i['kategori_id'];?>">
											<label class="text-center text-white">Anda yakin ingin menghapus kategori <b><?php echo $i['kategori_nama']; ?></b> ?</label>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
								<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>

		<?php endforeach; ?>
