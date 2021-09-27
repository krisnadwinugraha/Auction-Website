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
				<h2>Data Lelang</h2>
		
				<hr>
				<?php
					if($level==1)
					{
						echo "Mode Monitoring";
					}
					else
					{
				?>
				<?php
					include('./tambah_data.php')
				?>
				<?php if(isset($_GET['barang']) && isset($_GET['harga']) ) echo '<div class="spinner-grow text-primary float-left"></div>' ?>
				
				<?php
					}
				?>

				<?php
					include('./search.php')
				?>
				<?php
					include('./table_databarang.php')
				?>

				<!-- TABEL ADA DI ANTARA 2 SCRIPT YG DI BLOK INI -->
					
					<?php
						include('./index_pagination.php')
					?>
			
			
			</div>
		</div>
		
			<?php
				include('./copyright.php')
			?>
			
		<div class="modal fade" id="Profile">
			<?php
				include('./index_modal.php')
			?>
		</div>
				
		<script>
			$(document).ready(function(){
				$("#search").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#lelang tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</body>
</html>