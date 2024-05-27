<?php require 'db.php'; ?>
<?php require 'auth.php'; ?>

<?php
$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($id == null) {
    echo "<script>
                    alert('잘못된 요청');
                    window.location.href = 'index.php';
                </script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ploggingjoin 테이블에 삽입할 SQL 쿼리 작성
    $sql = "INSERT INTO ploggingjoin (memberId, ploggingId) VALUES ('$loginId', '$id')";

    // 쿼리 실행
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                    alert('플로깅 참여 완료');
                    window.location.href = 'ploggingInformation.php?id=$id';
                </script>";
    } else {
        echo "<script>
                    alert('플로깅 참여 실패');
                    window.location.href = 'ploggingInformation.php?id=$id';
                </script>";
    }

    // 연결 종료
    $conn->close();
}
