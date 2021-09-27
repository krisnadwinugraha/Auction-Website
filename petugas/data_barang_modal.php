<!-- The Modal -->
<div class="modal fade" id="Profile">
			<div class="modal-dialog">
				<div class="modal-content">
      
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">
							Akun&nbsp;
							<a class="badge badge-success" href="edit_data_umum.php?id_petugas=<?php echo $data['id_petugas']; ?>">
								Edit
							</a>
						</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
        
					<!-- Modal body -->
					<div class="modal-body">
						<center>
							<strong><?php echo $username; ?></strong>
							<br>
                            <?php 
                                if($level==1)
                                {
                                    echo "Administrator";
                                }
                                else if($level==2)
                                {
                                    echo "Petugas";
                                }
                                else
                                {
                                    echo "User";
                                }
                            ?>
						</center>
						<hr>
						<strong>Data Umum</strong>
                        <br>
						<?php
							echo "<strong>Nama Lengkap:</strong> ";
							echo $data['nama_petugas'];
						?>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<a href="../logout.php">
							<button type="button" class="btn btn-danger" onclick="return confirm('Yakin anda ingin Keluar?')">
								Keluar
							</button>
						</a>
					</div>
        
				</div>
			</div>
		</div>

		<!-- The Modal -->
		<div class="modal fade" id="TambahData">
			<div class="modal-dialog">
				<div class="modal-content">
      
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data Barang</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
        
					<!-- Modal body -->
					<div class="modal-body">
						<form action="simpan_data.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama_barang">Nama Barang:</label>
								<input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" required>
							</div>
							<div class="form-group">
								<label for="tgl">Tanggal:</label>
								<input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo date('Y-m-d'); ?>" required>
							</div>
							<div class="form-group">
								<label for="harga_awal">Harga Awal:</label>
								<input type="text" class="form-control" name="harga_awal" id="harga_awal" placeholder="Harga Awal" required>
							</div>
							<div class="form-group">
								<label for="foto">Foto:</label>
								<input type="file" class="form-file" name="foto" id="foto" placeholder="Foto">
							</div>
							<div class="form-group">
								<label for="deskripsi_barang">Deskripsi Barang:</label>
								<textarea name="deskripsi_barang" class="form-control" id="deskripsi_barang" cols="10" rows="5"></textarea>
							</div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
						</form>
					</div>
        
					<!-- Modal footer -->
					<div class="modal-footer">
					</div>
        
				</div>
			</div>
		</div>