<?php 
$koneksi 		= mysqli_connect("localhost","root","","expedition");
$query_produk 	= "SELECT * FROM tbl_produk";
$request_produk	= mysqli_query($koneksi, $query_produk);

$query_kota 	= "SELECT * FROM tbl_kota";
$request_kota 	= mysqli_query($koneksi, $query_kota);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Auto count price using jquery</title>
	<?php include 'call_vendor.php'; ?>
</head>
<body>
	<form>
		<table class="table table-striped" id="penjualan">
			<tr>
				<th>Nama</th>
				<th>Harga</th>
				<th>Kirim ke</th>
				<th>Total Bayar</th>
			</tr>
			<tr>
				<td>
					<select class="form-control" id="harga">
						<?php foreach ($request_produk as $key => $value) { ?>
							<option value="<?= $value['harga_perkm_produk']?>"><?= $value['nama_produk']?></option>
						<?php } ?>
					</select>
				</td>
				<td class="harga">
					<div class="lead" id="show_harga"></div>
				</td>
				<td>
					<!-- <input id="txt2" type="number" class="form-control"> -->
					<select class="form-control" id="jarak">
						<?php foreach ($request_kota as $key => $value) { ?>
						<option value="<?= $value['jarak_kota']?>"><?= $value['nama_kota']?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					<p id="total"></p>
				</td>
			</tr>
		</table>
	</form>
</body>

<script>
	$(document).ready(function(){
		function rubah(angka){
			var reverse = angka.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			return ribuan;
		} //function merubah angka menjadi rupiah

		$("#jarak").change(function(){
			// alert($("#txt1").val());
			var harga 	= $("#harga").val();
			var jarak 	= $("#jarak").val();
			var total 	= parseInt(harga) * parseInt(jarak);
			$("#total").text(rubah(total));
		}); //auto update total harga saat klik kota tujuan

		$("#harga").change(function(){
			var harga 	= $("#harga").val();
			$("#show_harga").html(rubah(harga));
			$("#total").text(null);
		});  //auto update harga produk dan reset total harga saat klik produk
	}); 
</script>
</html>