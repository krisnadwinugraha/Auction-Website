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
			<div class="alert alert-dark">
				<h2>Data Barang</h2>
				<hr>
				<?php
					include('./tambah_data.php')
				?>
				<?php
					include('./search.php')
				?>
				<?php
					include('./data_barang_table.php')
				?>
				<?php
					include('./index_pagination.php')
				?>
			</div>
		</div>
		<?php
			include('./copyright.php')
		?>
				
		<?php
			include('./data_barang_modal.php')
		?>
		<script>
			$(document).ready(function(){
				$("#search").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#barang tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</body>
</html>