<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			include('./head.php')
		?>
	</head>
	<body style="background: linear-gradient(to right, #323232 0%, #3f3f3f 40%, #1c1c1c 150%), linear-gradient(to left, rgba(255,255,255,0.40)0%, rgba(0,0,0,0.25)200%);background-blend-mode:multiply;">
		<?php
			include('./header.php')
		?>
		<div class="container-fluid">
			<div class="alert mt-2" style="overflow:auto;">
				<div class="container-fluid d-inline-block">
					<div class="row">
						<?php
							include '../dbconnect.php';
							if(isset($_GET['nohal']))
							{
								$nohal=$_GET['nohal'];
							} 
							else
							{
								$nohal=1;
							}
							$jumkon=20;
							$offset=($nohal-1)*$jumkon;
							$jumhal_sql="SELECT COUNT(*) FROM tb_lelang";
							$hasil=mysqli_query($conn,$jumhal_sql);
							$jumbar=mysqli_fetch_array($hasil)[0];
							$jumhal=ceil($jumbar / $jumkon);
							$no=1;
							$sqla="SELECT * FROM tb_lelang WHERE status='dibuka' LIMIT $offset, $jumkon";
							$querya=mysqli_query($conn,$sqla);

							while($dataa=mysqli_fetch_array($querya))
							{
								$id_barang=$dataa['id_barang'];	
								$sqlb="SELECT * FROM tb_barang WHERE id_barang='$id_barang'";
								$queryb=mysqli_query($conn,$sqlb);
								$datab=mysqli_fetch_array($queryb)
						?>
						<div class="col-sm-4 my-3">
							<a href="page_lelang.php?id_lelang=<?php echo $dataa['id_lelang']; ?>&id_barang=<?php echo $dataa['id_barang']; ?>" class="text-white text-decoration-none">
								<div class="text-center border border-light border-bottom-0 rounded">
									<img src="<?php echo "../db_img/".$datab['foto']; ?>" alt="<?php echo $datab['foto']; ?>" class="img-fluid py-2 rounded" style="width: 185px;height: 150px;">
								</div>
								<div class="text-center py-1 rounded small" style="background-image: linear-gradient(to right, #1e3c72 0%, #2a5298 100%);">
									<strong>
										<?php echo $datab['nama_barang']; ?> 
									</strong>
									<br><?php  echo "Rp ".number_format($datab['harga_awal'],  0, '','.'); ?>
								</div>
							</a>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<ul class="pagination pagination-sm flex-wrap justify-content-sm-end">
					<li class="page-item"><a class="page-link" href="?nohal=1">First</a></li>
					<li class="page-item <?php if($nohal <= 1){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($nohal <= 1){ echo '#'; } else { echo "?nohal=".($nohal - 1); } ?>">Prev</a>
					</li>
					<?php
						for($i=1;$i<=$jumhal;$i++)
						{
							$id=$i;
					?>
					<li id="<?php echo $id; ?>" class="page-item <?php if($nohal == $id){echo "active"; }; ?> <?php if($id != $nohal){echo "d-none"; }; ?>"><a class="page-link" href="?nohal=<?php echo $i; ?>"><?php echo $i; echo "/$jumhal";?></a></li>
					<?php
							
						}
					?>
					<li class="page-item <?php if($nohal >= $jumhal){ echo 'disabled'; } ?>">
						<a class="page-link" href="<?php if($nohal >= $jumhal){ echo '#'; } else { echo "?nohal=".($nohal + 1); } ?>">Next</a>
					</li>
					<li class="page-item"><a class="page-link" href="?nohal=<?php echo $jumhal; ?>">Last</a></li>
				</ul>
			</div>
		</div>
		<?php
			include('../petugas/copyright.php')
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