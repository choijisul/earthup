<?php
require 'db.php';
require 'auth.php';

$input = json_decode(file_get_contents('php://input'), true);
$postId = $input['post_id'];
$heartNum = $input['heartNum'];

// 데이터베이스에서 heartNum 값 업데이트
$sql = "UPDATE methodpost SET heartNum = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $heartNum, $postId);
$stmt->execute();
$stmt->close();
$conn->close();

// 응답 반환
echo json_encode(['success' => true]);
?>
