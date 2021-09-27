<div class="table-responsive">
					<table class="table table-bordered table-dark table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Tanggal</th>
								<th>Harga Awal</th>
								<th>Foto</th>
								<th>Deskripsi Barang</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody id="barang">
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
								$jumkon=50;
								$offset=($nohal-1)*$jumkon;
								$jumhal_sql="SELECT COUNT(*) FROM tb_barang";
								$hasil=mysqli_query($conn,$jumhal_sql);
								$jumbar=mysqli_fetch_array($hasil)[0];
								$jumhal=ceil($jumbar / $jumkon);
								$no=1;
								if($level==1)
								{
									$sqla="SELECT* FROM tb_barang LIMIT $offset, $jumkon";
								}
								else
								{
									$sqlb = "SELECT * FROM tb_lelang";
									$queryb = mysqli_query($conn,$sqlb);
									$countb = mysqli_num_rows($queryb);
									$datab=mysqli_fetch_array($queryb);

									if($countb==0)
									{
										$sqla="SELECT * FROM tb_barang LIMIT $offset, $jumkon";
									}
									else
									{
										$sqla="SELECT * FROM tb_barang WHERE id_barang NOT IN (SELECT id_barang FROM tb_lelang) LIMIT $offset, $jumkon";
									}
								}
								$querya=mysqli_query($conn,$sqla);
								while($dataa=mysqli_fetch_array($querya))
								{
							?>
							<tr class="text-center">
								<td><?php echo $no; ?></td>
								<td><?php echo $dataa['id_barang']; ?></td>
								<td><?php echo $dataa['nama_barang']; ?></td>
								<td><?php echo ($dataa['tgl']); ?></td>
								<td><?php echo number_format($dataa['harga_awal'], 0, '','.'); ?></td>
								<td>
									<button class="btn btn-info" data-toggle="collapse" data-target="#collapse<?php echo $no; ?>">Lihat</button>
									<div id="collapse<?php echo $no; ?>" class="collapse">
										<img src="<?php echo "../db_img/".$dataa['foto']; ?>" class="img-fluid mx-auto d-block" alt="<?php echo $dataa['foto']; ?>" style="width: 70%;height: auto;margin-top: 10px;">
									</div>
								</td>
								<td><?php echo $dataa['deskripsi_barang']; ?></td>
								<td>
									<?php
										if($level==2)
										{
									?>
									<a class="badge badge-primary" href="index.php?barang=<?php echo $dataa['id_barang']; ?>&harga=<?php echo $dataa['harga_awal']; ?>">
										Lelang
									</a>
									<?php
										}
									?>
									<a class="badge badge-success" href="edit.php?id_barang=<?php echo $dataa['id_barang']; ?>">
										Edit
									</a>
									<a class="badge badge-danger" href="delete.php?id_barang=<?php echo $dataa['id_barang']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus Data ini?')">
										Hapus
									</a>
								</td>
							</tr>
							<?php
								$no++;
								}
							?>
						</tbody>
					</table>
				</div>