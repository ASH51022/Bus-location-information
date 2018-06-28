<html>
<head>

<meta charset="utf-8" />
<title>googlemap</title>
<style>
#mapdraw {
	width:  100%;
	height: 100%;
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
  
  $stt = $db->prepare('select * from bus ORDER BY zikoku desc limit 1;');
  $stt->execute();
  $row = $stt->fetch();
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
		center: {
                lat:  37.847061177366626,
                lng:  140.11641984000914
            },
		zoom: 15
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