<html>
    <head><title>googlemap</title></head>
<body>

<?php
    
$dsn = 'mysql:dbname=b18_21077174_db;host=sql305.byethost18.com';
$user = 'b18_21077174';
$passwd = 'endo0720';
    
try {
  $db = new PDO($dsn, $user, $passwd);
  print('データベースに接続できました。');
  $db = NULL;
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}

?>
    
</body>
</html>    