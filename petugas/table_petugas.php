<div class="table-responsive">
<table class="table table-bordered table-dark table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Petugas</th>
								<th>Nama Petugas</th>
								<th>Username</th>
								<th>ID Level</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody id="petugas">
							<?php
								$no=1;
								while($dataa=mysqli_fetch_array($resulta))
								{
							?>
							<tr class="text-center">
								<td><?php echo $no; ?></td>
								<td><?php echo $dataa['id_petugas']; ?></td>
								<td><?php echo $dataa['nama_petugas']; ?></td>
								<td><?php echo $dataa['username']; ?></td>
								<td><?php echo $dataa['id_level']; ?></td>
								<td>
									<a class="badge badge-success" href="edit_petugas.php?id_petugas=<?php echo $dataa['id_petugas']; ?>">Edit</a>
									<a class="badge badge-danger" href="delete_petugas.php?id_petugas=<?php echo $dataa['id_petugas']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus Data ini?')">Hapus</a>
								</td>
							</tr>
							<?php
								$no++;
								}
							?>
						</tbody>
					</table>
                            </div>