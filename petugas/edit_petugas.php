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
            $id_petugas=$_GET['id_petugas'];
            $querya="SELECT * FROM tb_petugas WHERE id_petugas='$id_petugas'";
            $resulta=mysqli_query($conn,$querya);
            $counta=mysqli_num_rows($resulta);
            $dataa=mysqli_fetch_array($resulta);
        ?>
        <div class="container-fluid">
			<div class="alert alert-dark">
				<form action="update_petugas.php" method="POST">
					<div class="form-group">
						<label for="id_petugas">ID Petugas:</label>
						<input type="text" class="form-control" name="id_petugas" id="id_petugas" placeholder="ID Petugas" value="<?php echo $dataa['id_petugas']; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama_petugas">Nama Petugas:</label>
						<input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $dataa['nama_petugas']; ?>">
					</div>
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $dataa['username']; ?>">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Password">
							Ganti
						</button>
					</div>
					<div class="form-group">
						<label for="id_level">ID Level:</label>
						<input type="text" class="form-control" name="id_level" id="id_level" placeholder="ID Level" value="<?php echo $dataa['id_level']; ?>" readonly>
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
		<div class="modal fade" id="Password">
			<div class="modal-dialog">
				<div class="modal-content">
      
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">
							Ganti Password
						</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
        
					<!-- Modal body -->
					<div class="modal-body">
						<form action="update_petugas.php" method="POST">
							<div class="form-group">
								<input type="hidden" class="form-control" name="id_petugas" id="id_petugas" placeholder="ID Petugas" value="<?php echo $dataa['id_petugas']; ?>" readonly>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $dataa['nama_petugas']; ?>">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $dataa['username']; ?>">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="id_level" id="id_level" placeholder="ID Level" value="<?php echo $dataa['id_level']; ?>" readonly>
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