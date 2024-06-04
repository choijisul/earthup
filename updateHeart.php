<?php
require 'db.php';
require 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ploggingId = isset($_POST['ploggingId']) ? $_POST['ploggingId'] : '';
    $loginId = isset($_POST['loginId']) ? $_POST['loginId'] : '';

    if (!empty($ploggingId) && !empty($loginId)) {
        // 좋아요 있나 확인
        $sqlCheck = "SELECT * FROM ploggingheart WHERE memberId = '$loginId' AND ploggingId = '$ploggingId'";
        $resultCheck = $conn->query($sqlCheck);

        if ($resultCheck->num_rows == 0) {
            $sqlInsert = "INSERT INTO ploggingheart (memberId, ploggingId) VALUES ('$loginId', '$ploggingId')";
            if ($conn->query($sqlInsert) === TRUE) {
                // heartNum ++
                $sqlUpdateHeartNum = "UPDATE plogging SET heartNum = heartNum + 1 WHERE id = '$ploggingId'";
                $conn->query($sqlUpdateHeartNum);
            }
        } else {
            // 좋아요 취소
            $sqlDelete = "DELETE FROM ploggingheart WHERE memberId = '$loginId' AND ploggingId = '$ploggingId'";
            if ($conn->query($sqlDelete) === TRUE) {
                $sqlUpdateHeartNum = "UPDATE plogging SET heartNum = heartNum - 1 WHERE id = '$ploggingId'";
                $conn->query($sqlUpdateHeartNum);
            }
        }
        $resultCheck->close();
    }
}

$conn->close();
?>
