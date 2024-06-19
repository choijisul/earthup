<?php require 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 폼 데이터 가져오기
    $id = $conn->real_escape_string($_POST['id']);
    $pwd = $conn->real_escape_string($_POST['pwd']);
    $confirm_pwd = $conn->real_escape_string($_POST['confirm_pwd']);
    $email = $conn->real_escape_string($_POST['email']);

    // 비밀번호 확인
    if ($pwd !== $confirm_pwd) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    } else {
        // 아이디 중복 확인
        $id_check_sql = "SELECT * FROM member WHERE id='$id'";
        $id_check_result = $conn->query($id_check_sql);

        if ($id_check_result->num_rows > 0) {
            echo "<script>alert('같은 아이디가 이미 존재합니다.');</script>";
        } else {
            // 이메일 중복 확인
            $email_check_sql = "SELECT * FROM member WHERE email='$email'";
            $email_check_result = $conn->query($email_check_sql);

            if ($email_check_result->num_rows > 0) {
                echo "<script>alert('같은 이메일이 이미 존재합니다.');</script>";
            } else {
                // 비밀번호 해시
                $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

                // SQL 쿼리
                $sql = "INSERT INTO member (id, pwd, email) VALUES ('$id', '$hashed_pwd', '$email')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                                alert('회원가입 성공!');
                                window.location.href = 'login.php';
                            </script>";
                } else {
                    echo "<script>console.error('추가 실패: " . $conn->error . "');</script>";
                }
            }
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/membership.css?val2">
    <link rel="stylesheet" href="css/loginMembershipNav.css?val1">
    <title>어썹</title>
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='/index.php'" class="backButton"><img src="./img/backButton.png"></button></p>
            </h1>
        </div>
    </header>

    <main class="main">
        <form method="POST" action="">
            <div class="login_container"></div>
            <div class="input">
                <!-- 아이디 -->
                <div class="member-id">
                    <div class="id">아이디</div>
                    <input type="text" name="id" placeholder="아이디" class="input-id" required>
                </div>

                <!-- 비밀번호 -->
                <div class="member-pw">
                    <div class="pw">비밀번호</div>
                    <input type="password" name="pwd" placeholder="비밀번호" class="input-pw" required>
                </div>

                <!-- 비밀번호 재확인-->
                <div class="member-reconfirm">
                    <div class="reconfirm">비밀번호 재확인</div>
                    <input type="password" name="confirm_pwd" placeholder="비밀번호 재확인" class="input-reconfirm" required>
                </div>

                <!-- 이메일 -->
                <div class="member-email">
                    <div class="email">이메일</div>
                    <input type="email" name="email" placeholder="이메일" class="input-email" required>
                </div>
            </div>

            <button type="submit" class="membershipButton">회원가입</button>
        </form>
    </main>

    <script src="js/index.js"></script>
</body>

</html>