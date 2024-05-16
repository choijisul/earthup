
<?php
$servername = "localhost";
$username = "earthup";
$password = "earthup2024";
$dbname = "earthup";

$conn = new mysqli($servername, $username, $password, $dbname);  //DB연결 생성

if ($conn->connect_error) {
  echo "<script>console.error('연결 실패: " . $conn->connect_error . "');</script>";
}
echo "<script>console.log('연결에 성공했습니다.');</script>";
?>

