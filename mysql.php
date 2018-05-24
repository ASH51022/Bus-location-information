<?php

try{
$db = new PDO('mysql:host=210.151.58.201;dbname=Bus_service','yonesen','senkouka');
echo '接続完了';
    
$stt=$db->prepare('SELECT * FROM bus;');

$stt->execute();

$row = $stt->fetch();

} catch(PDOException $e){
die('エラーメッセージ：'.$e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>DB接続</title>
</head>
<body>
  緯度：<?php echo $row['ido']; ?>
  経度：<?php echo $row['keido']; ?>
  タイムスタンプ：<?php echo $row['zikoku']; ?>
</body>
</html>