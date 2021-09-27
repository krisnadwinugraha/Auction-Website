<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include('./head.php')
		?>
	</head>
	<body style="background-color: #888888;">
		<?php
			include('./header.php')
		?>
        <?php
            include '../dbconnect.php';
            $id_barang=$_GET['id_barang'];
            $querya="SELECT * FROM tb_barang WHERE id_barang='$id_barang'";
            $resulta=mysqli_query($conn,$querya);
            $counta=mysqli_num_rows($resulta);
            $dataa=mysqli_fetch_array($resulta);
        ?>
        <div class="container-fluid">
			<div class="alert alert-dark">
				<form action="update.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="id_barang">ID Barang:</label>
						<input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="ID Barang" value="<?php echo $dataa['id_barang']; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama_barang">Nama Barang:</label>
						<input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $dataa['nama_barang']; ?>">
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal:</label>
						<input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo $dataa['tgl']; ?>">
					</div>
					<div class="form-group">
						<label for="harga_awal">Harga Awal:</label>
						<input type="text" class="form-control" name="harga_awal" id="harga_awal" placeholder="Harga Awal" value="<?php echo $dataa['harga_awal']; ?>">
					</div>
					<div class="form-group">
						<label for="foto">Foto:</label>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Foto">
							Ganti
						</button>
						<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#foto">Lihat</button>
						<div id="foto" class="collapse">
							<img src="<?php echo "../db_img/".$dataa['foto']; ?>" class="img-fluid mx-auto d-block" alt="<?php echo $dataa['foto']; ?>" style="width: 70%;height: auto;margin-top: 10px;">
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi_barang">Deskripsi Barang:</label>
						<textarea class="form-control" name="deskripsi_barang" id="deskripsi_barang" rows="4" cols="50"><?php echo $dataa['deskripsi_barang']; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
        </div>
		<?php
			include('./copyright.php')
		?>
		
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
		<div class="modal fade" id="Foto">
			<div class="modal-dialog">
				<div class="modal-content">
      
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">
							Ganti Foto
						</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
        
					<!-- Modal body -->
					<div class="modal-body">
						<img src="<?php echo "../db_img/".$dataa['foto']; ?>" class="img-fluid mx-auto d-block" alt="<?php echo $dataa['foto']; ?>" style="width: 70%;height: auto;">
						<form action="update.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id_barang" id="id_barang" value="<?php echo $dataa['id_barang']; ?>" readonly>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $dataa['nama_barang']; ?>">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="tgl" id="tgl" value="<?php echo $dataa['tgl']; ?>">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="harga_awal" id="harga_awal" value="<?php echo $dataa['harga_awal']; ?>">
							</div>
							<div class="form-group">
								<label for="foto">Foto:</label>
								<input type="file" class="form-file" name="foto" id="foto" placeholder="Foto">
							</div>
							<div class="form-group">
							<input type="hidden" class="form-control" name="deskripsi_barang" id="deskripsi_barang" value="<?php echo $dataa['deskripsi_barang']; ?>">
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
	</body>
</html>