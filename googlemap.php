<html>
<head>

<meta charset="utf-8" />
<title>googlemap</title>
<style>
#mapdraw {
	width: 700px;
	height: 400px;
}
</style>  
</head>
<body>

<div id="mapdraw"></div>

<?php
    
require 'DSN.php';
$dsn = $dsninfo['dsn'];
$user = $dsninfo['user'];
$passwd = $dsninfo['pass'];
    
try {
  $db = new PDO($dsn, $user, $passwd);
  print('データベースに接続できました。<br>');
  
  $stt = $db->prepare('select * from test');
  $stt->execute();
  $row = $stt->fetch();
  print('緯度:'.$row['ido'].'<br>');
  print('経度:'.$row['keido']);
  $db = NULL;
    
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}

?>    
 
  <script>
    var map;
    var ido2 = <?php echo $row['ido']; ?>;
    var keido2 = <?php echo $row['keido']; ?>;
    var myLatLng ={lat: ido2,lng: keido2};
    function initMap() {
	map = new google.maps.Map(document.getElementById('mapdraw'), {
		center: myLatLng,
		zoom: 19 // 地図のズームを指定
	});
    var marker = new google.maps.Marker({
                 position: myLatLng,
                 map: map
                 
                 });
        
}
  </script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiKd1qV0wEgfcC34IEqnFCPrmZYQ4SlBg&callback=initMap"></script>
    
</body>
</html>    