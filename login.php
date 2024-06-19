<?php require 'db.php'; ?>
<?php require 'auth.php'?>  <!--dp접근 php, 쿠키 관련 php 가져옴-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conn->real_escape_string($_POST['id']);
    $pwd = $conn->real_escape_string($_POST['pwd']);

    $id_check_sql = "SELECT * FROM member WHERE id='$id'";
    $id_check_result = $conn->query($id_check_sql);

    if ($id_check_result->num_rows == 0) {
        echo "<script>
                alert('로그인 실패');
                window.location.href = 'login.php';
            </script>";
        exit;
    } else {
        $row = $id_check_result->fetch_assoc();  //조회 결과 접근

        $pwd_match = password_verify($pwd, $row['pwd']);
        if ($pwd_match) {
            // 쿠키 방법 사용
            $cookie_name = "id";
            $cookie_value = $_POST['id'];
            $enc_id = encrypt($cookie_value);
            setcookie($cookie_name, $enc_id, 0, "/", ""); 
            echo "<script>
                    alert('로그인 성공');
                    window.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('로그인 실패');
                    window.location.href = 'login.php';
                </script>";
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginMembershipNav.css?val1">
    <link rel="stylesheet" href="css/login.css?val3">
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!--폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
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

    <!-- 로고 이미지 -->
    <div class="logo">
        <img src="img\logo.png" alt="로고">
    </div>

    <form method="POST" action="">
        <!-- 아이디 입력창 -->
        <input type="text" placeholder="아이디" class="input-id" name="id">
        <!-- 비밀번호 입력창 -->
        <input type="password" placeholder="비밀번호" class="input-pw" name="pwd">

        <!-- 로그인 버튼 -->
        <button class="loginButton" onClick="location.href='/index.php'">로그인</button>

        <a href="/membership.php" class="goMembership">회원가입</a>
    </form>

    <script src="js/index.js"></script>
</body>

</html>