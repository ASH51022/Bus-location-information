<?php

$ido = "11.2222222"; // ←i☆do
$keido = "222.3333333"; // ←ke☆ido

$data = http_build_query(
    array(
        'ido' => $ido,
        'keido' => $keido
    ), '', '&'
);


$options = array(
		'http'=>array(
				'method' => 'POST',
				'header' => "Content-type: application/x-www-form-urlencoded\r\n"
							. "User-Agent: php.file_get_contents\r\n" // 適当に名乗ったりできます
							. "Content-Length: " . strlen($data) . "\r\n",
				'content' => $data
			)
	);
$context = stream_context_create($options);
$response = file_get_contents('http://localhost/test.php', false, $context);

?>