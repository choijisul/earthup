<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginMembershipNav.css">
    <link rel="stylesheet" href="css/login.css">
    <title>로그인</title>
</head>
<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='http://localhost/index.php'" class="backButton"><img src="./img/backButton.png"></button></p>
            </h1>
        </div>
    </header>

    <!-- 로고 이미지 -->
    <div class="logo">로고</div>

    <!-- 아이디 입력창 -->
    <input type="text" placeholder="아이디" class="input-id">
    <!-- 비밀번호 입력창 -->
    <input type="password" placeholder="비밀번호" class="input-pw">

    <!-- 로그인 버튼 -->
    <button class="loginButton" onClick="location.href='http://localhost/index.php'">로그인</button>

    <i onClick="location.href='http://localhost/membership.php'" class="goMembership">회원가입</i>

    <script src="js/index.js"></script>
</body>
</html>
