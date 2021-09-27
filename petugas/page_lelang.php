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
		<div class="container-fluid">
			<div class="alert alert-dark" style="overflow:auto;">
                <?php
                    $id_lelang=$_GET['id_lelang'];
                    $sqla = "SELECT * FROM tb_lelang WHERE id_lelang='$id_lelang'";
                    $querya = mysqli_query($conn,$sqla);
                    $counta = mysqli_num_rows($querya);
                    $dataa = mysqli_fetch_array($querya);

                    $id_barang=$_GET['id_barang'];
                    $sqlb = "SELECT * FROM tb_barang WHERE id_barang='$id_barang'";
                    $queryb = mysqli_query($conn,$sqlb);
                    $countb = mysqli_num_rows($queryb);
                    $datab = mysqli_fetch_array($queryb);
                ?>
                <div class="row">
                    <img src="<?php echo "../db_img/".$datab['foto']; ?>" class="img-fluid mx-auto d-block" alt="<?php echo "../db_img/".$datab['foto']; ?>" style="width: 585px;height: 350px;">
                </div>
                <div class="row mt-2">
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-3 py-2 pl-4 border rounded-left border-dark border-right-0">
                        <div class="row"><strong>Nama Barang : </strong></div>
                        <div class="row"><strong>Harga Awal : </strong></div>
                        <div class="row"><strong>Harga Akhir : </strong></div>
                        <div class="row"><strong>Penawar : </strong></div>
                        <div class="row"><strong>Status : </strong></div>
                    </div>
                    <div class="col-sm-3 py-2 pr-4 border rounded-right border-dark border-left-0">
                        <div class="row"><?php echo $datab['nama_barang'] ?></div>
                        <div class="row"><td><?php echo "Rp ".number_format($datab['harga_awal'], 0, '','.'); ?></td></div>
                        <div class="row"><?php echo "Rp ".number_format($dataa['harga_akhir'], 0, '','.'); ?></div>
                        <div class="row">
                            <?php
                                if($dataa['id_user']==1)
                                {
                                    echo "Tidak Ada";
                                }
                                else
                                {
                                    $id_user=$dataa['id_user'];
                                    $sqlc = "SELECT * FROM tb_masyarakat WHERE id_user='$id_user'";
                                    $queryc = mysqli_query($conn,$sqlc);
                                    $countc = mysqli_num_rows($queryc);
                                    $datac = mysqli_fetch_array($queryc);

                                    echo $datac['username'];
                                }
                            ?>
                        </div>
                        <div class="row">
                            <?php
                                if($dataa['status']=="dibuka")
                                {
                                    echo '<span class="badge badge-pill badge-success">Dibuka</span><br>';

                                }
                                else if($dataa['status']=="terlelang")
                                {
                                    echo '<span class="badge badge-pill badge-info">Terlelang</span>';
                                }
                                else
                                {
                                    echo '<span class="badge badge-pill badge-danger">Ditutup</span><br>';

                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                </div>
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
							<a class="badge badge-success" href="edit_data_umum.php?id_user=<?php echo $data['id_user']; ?>">
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
								echo "Pengguna";
                            ?>
						</center>
						<hr>
						<strong>Data Umum</strong>
                        <br>
						<?php
							echo "<strong>Nama Lengkap:</strong> ";
                            echo $data['nama_lengkap'];
                            echo "<br>";
                            echo "<strong>No. Telepon:</strong> ";
							echo $data['telp'];
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
	</body>
</html>