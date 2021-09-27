<div class="table-responsive">
					<table class="table table-bordered table-dark table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Lelang</th>
								<th>ID Barang</th>
								<th>Tanggal Lelang</th>
								<th>Harga Akhir</th>
								<th>ID Petugas</th>
								<th>Status</th>
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
								$jumkon=20;
								$offset=($nohal-1)*$jumkon;
								$jumhal_sql="SELECT COUNT(*) FROM tb_lelang";
								$hasil=mysqli_query($conn,$jumhal_sql);
								$jumbar=mysqli_fetch_array($hasil)[0];
								$jumhal=ceil($jumbar / $jumkon);
								$no=1;
								$sqla="SELECT * FROM tb_lelang LIMIT $offset, $jumkon";
								$querya=mysqli_query($conn,$sqla);
								while($dataa=mysqli_fetch_array($querya))
								{
							?>
							<tr class="text-center">
								<td><?php echo $no; ?></td>
								<td><?php echo $dataa['id_lelang']; ?></td>
								<td><?php echo $dataa['id_barang']; ?></td>
								<td><?php echo $dataa['tgl_lelang']; ?></td>
								<td><?php echo number_format($dataa['harga_akhir'], 0, '','.'); ?></td>
								<td><?php echo $dataa['id_petugas']; ?></td>
								<td>
									<?php
										if($level==2)
										{
											$id_lelang=$dataa['id_lelang'];
											if($dataa['status']=="dibuka")
											{
												echo '<a href="#" class="badge badge-pill badge-success">Dibuka</a><br>';
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=ditutup" class="badge badge-pill badge-secondary">Ditutup</a><br>';
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=terlelang" class="badge badge-pill badge-secondary">Terlelang</a>';
											}
											else if($dataa['status']=="terlelang")
											{
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=dibuka" class="badge badge-pill badge-secondary">Dibuka</a><br>';
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=ditutup" class="badge badge-pill badge-secondary">Ditutup</a><br>';
												echo '<a href="#" class="badge badge-pill badge-info">Terlelang</a>';
											}
											else
											{
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=dibuka" class="badge badge-pill badge-secondary">Dibuka</a><br>';
												echo '<a href="#" class="badge badge-pill badge-danger">Ditutup</a><br>';
												echo '<a href="status_lelang.php?id_lelang='.$id_lelang.'&status=terlelang" class="badge badge-pill badge-secondary">Terlelang</a>';
											}
										}
										else
										{
											if($dataa['status']=="dibuka")
											{
												echo '<span class="badge badge-pill badge-success">Dibuka</span><br>';
												echo '<span class="badge badge-pill badge-secondary">Ditutup</span><br>';
												echo '<span class="badge badge-pill badge-secondary">Terlelang</span>';
											}
											else if($dataa['status']=="terlelang")
											{
												echo '<span class="badge badge-pill badge-secondary">Dibuka</span><br>';
												echo '<span class="badge badge-pill badge-secondary">Ditutup</span><br>';
												echo '<span class="badge badge-pill badge-info">Terlelang</span>';
											}
											else
											{
												echo '<span class="badge badge-pill badge-secondary">Dibuka</span><br>';
												echo '<span class="badge badge-pill badge-danger">Ditutup</span><br>';
												echo '<span class="badge badge-pill badge-secondary">Terlelang</span>';
											}
										}
									?>
								</td>
								<td>
									<?php
										if($level!=2)
										{
											echo "Mode Monitoring";
										}
										else
										{
									?>
									<a class="badge badge-primary" href="page_lelang.php?id_lelang=<?php echo $dataa['id_lelang']; ?>&id_barang=<?php echo $dataa['id_barang']; ?>">
										Monitoring
									</a>
									<?php
										}
									?>
								</td>
							</tr>
							<?php
								$no++;
								}
							?>
						</tbody>
					</table>
				</div>