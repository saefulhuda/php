<?php
function http_request($url)
{
    // init curl
	$init = curl_init(); 

    // set url 
	curl_setopt($init, CURLOPT_URL, $url);

    // set user agent    
	curl_setopt($init,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
	curl_setopt($init, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
	$output = curl_exec($init); 

    // tutup curl 
	curl_close($init);      

    // mengembalikan hasil curl
	return $output;
}

$json_data_user = http_request('https://api.github.com/users/saefulhuda');
$data_user = json_decode($json_data_user, true);
$json_data_follower = http_request('https://api.github.com/users/saefulhuda/following');
$data_follower = json_decode($json_data_follower, true);
?>

<!DOCTYPE html>
<html>
<head>
	<title>CURL</title>
</head>
<body>
	<img src="<?= $data_user['avatar_url']?>" width="100px">
	<h4>My name is <?= $data_user['name']?></h4>
	<p>Acount github : <?= $data_user['html_url']?></p>
	<?php foreach ($data_follower as $key => $value) {
		echo "<p>".$value['login']."</p>";
	} ?>
</body>
</html>