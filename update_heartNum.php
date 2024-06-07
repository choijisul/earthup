// update_heartNum.php
<?php
require 'db.php';
require 'auth.php';

$input = json_decode(file_get_contents('php://input'), true);
$postId = $input['post_id'];
$heartNum = $input['heartNum'];

// 해당 게시물의 heartNum을 클라이언트에서 받은 값으로 업데이트
$sql = "UPDATE methodpost SET heartNum = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $heartNum, $postId);
$stmt->execute();
$stmt->close();

echo json_encode(['success' => true]);
?>
