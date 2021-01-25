<?php
if (!empty($_GET['id']))
{
	$db = new mysqli("localhost","root","","expedition");
	$query = $db->query("SELECT * FROM tbl_user WHERE id_user = {$_GET['id']}");

	if ($query->num_rows > 0 ) {
			$data = $query->fetch_assoc();
			echo '<table class="table table-stripped" >';
			echo '<tr><th>Nama</th><td> : '.$data['nama_lengkap_user'].'</td></tr>';
			echo '<tr><th>Email</th><td> : '.$data['email_user'].'</td></tr>';
			echo '<tr><th>Nomor Telpon</th><td> : '.$data['telpon_user'].'</td></tr>';
			echo '<tr><th>Jabatan</th><td> : '.$data['jabatan_user'].'</td></tr>';
			echo '</table>';
		}	
}
?>