<?php
require 'db.php';
require 'auth.php';

$id = $_POST['id'];
$loginId = $_POST['loginId'];
$content = $_POST['content'];

$sqlComment = "INSERT INTO ploggingchat (ploggingId, chatMemberId, content) VALUES ('$id', '$loginId', '$content')";

if ($conn->query($sqlComment) === TRUE) {
    echo "댓글 작성 완료";
} else {
    echo "Error: " . $sqlComment . "<br>" . $conn->error;
}

$conn->close();
?>