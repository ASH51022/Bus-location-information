<?php


$data = http_build_query(array('ido' => '緯度を入れて(はーと)', 'keido' => '経度はこっち(はーと)'), '', '&');
$options = array(
		'http'=>array(
				'method' => 'POST',
				'header' => "Content-type: application/x-www-form-urlencoded\r\n"
							. "User-Agent: php.file_get_contents\r\n" 
							. "Content-Length: " . strlen($data) . "\r\n",
				'content' => $data
			)
	);
$context = stream_context_create($options);
$response = file_get_contents('http://localhost/test.php', false, $context);

?>