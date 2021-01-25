<?php 
$koneksi = mysqli_connect("localhost","root","","expedition");
$query = "SELECT * FROM tbl_user";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trial get modal with ajax</title>
<?php include 'call_vendor.php'; ?>
</head>
<body>
	<div class="row">
		<div class="col-md-6">

		<hr><h3 class="lead text-center">Data Users</h3><hr>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; while ($data = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $data['nama_lengkap_user']?></td>
							<td><?= $data['email_user']?></td>
							<td><button id_bt="<?= $data['id_user']?>" type="button" data-toggle="modal" data-target="#exampleModal"class="view_button btn btn-info btn-xs view_data" value="<?= $data['id_user']?>">Lihat</button></td>
						</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data User Expedisi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript">
	$(document).ready(function() {
		$(".view_button").click(function(){
			var id = $(this).attr("id_bt");
			// alert(id);
			$(".modal-body").load('content.php?id='+id, function(){
				$("#exampleModal").modal({show:true});
			})
		})
	});
</script>
</html>