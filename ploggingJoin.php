<?php require 'db.php'; ?>
<?php require 'auth.php'; ?>

<?php
$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($id == null) {
    echo "<script>
                    alert('잘못된 요청');
                    window.location.href = 'index.php';
                </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ploggingjoin 테이블에 삽입할 SQL 쿼리 작성
    $sql = "INSERT INTO ploggingjoin (memberId, ploggingId) VALUES ('$loginId', '$id')";

    // 쿼리 실행
    if ($conn->query($sql) === TRUE) {
        // ploggingjoin 테이블에서 ploggingId의 개수를 세는 쿼리 작성
        $count_sql = "SELECT COUNT(*) as joinCount FROM ploggingjoin WHERE ploggingId = '$id'";
        $result = $conn->query($count_sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $joinCount = $row['joinCount'];
            
            // plogging 테이블의 joinNum 컬럼을 업데이트하는 쿼리 작성
            $update_sql = "UPDATE plogging SET joinNum = '$joinCount' WHERE id = '$id'";
            $conn->query($update_sql);
        }

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
?>
