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
			$querya="SELECT * FROM tb_petugas WHERE id_level='2'";
			$resulta=mysqli_query($conn,$querya);
			$counta=mysqli_num_rows($resulta);
		?>
		<div class="container-fluid">
			<div class="alert alert-dark">
				<h2>Data Petugas</h2>
				<hr>
				<?php
					include('./tambah_data.php')
				?>
				<?php
					include('./search.php')
				?>
				
					<?php
						include('./table_petugas.php')
					?>
				
			</div>
		</div>
		<?php
			include('./copyright.php')
		?>
		<?php
			include('./data_petugas_modal.php')	
		?>	
		
		<script>
			$(document).ready(function(){
				$("#search").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#petugas tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</body>
</html>