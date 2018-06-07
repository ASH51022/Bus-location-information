<?php

$file_name = file_get_contents('gps.txt');

echo $file_name;

(preg_match('/\d{2}\.\d{6,7}/',$file_name ,$match));
    for ($i = 0; $i < count($match); $i++)
        $ido = $match[$i];


(preg_match('/\d{3}\.\d{6,7}/',$file_name ,$match));
    for ($i = 0; $i < count($match); $i++)
        $keido = $match[$i];

echo $ido;
echo $keido;

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