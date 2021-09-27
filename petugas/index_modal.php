<!-- The Modal -->

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
						<h4 class="modal-title">Tambah Data Lelang</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
        
					<!-- Modal body -->
					<div class="modal-body">
						<form action="simpan_data_lelang.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="id_barang">ID Barang:</label>
								<input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="ID Barang" value="<?php if(empty($_GET['barang'])){ echo ""; }else{ echo $_GET['barang']; } ?>" required>
							</div>
							<div class="form-group">
								<label for="tgl_lelang">Tanggal:</label>
								<input type="date" class="form-control" name="tgl_lelang" id="tgl_lelang" value="<?php echo date('Y-m-d'); ?>" required>
							</div>
							<div class="form-group">
								<label for="harga_akhir">Harga Akhir:</label>
								<input type="text" class="form-control" name="harga_akhir" id="harga_akhir" placeholder="Harga Akhir" value="<?php if(empty($_GET['harga'])){ echo ""; }else{ echo $_GET['harga']; } ?>" required>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="ID User" required>
							</div>
							<div class="form-group">
								<label for="id_petugas">ID Petugas:</label>
								<input type="text" class="form-control" name="id_petugas" id="id_petugas" placeholder="ID Petugas" value="<?php echo $data['id_petugas']; ?>" required>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="status" id="status" placeholder="Status" required>
							</div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
						</form>
					</div>
        
					<!-- Modal footer -->
					<div class="modal-footer">
					</div>
        
				</div>
			</div>
	