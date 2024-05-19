<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/membership.css">
    <link rel="stylesheet" href="css/loginMembershipNav.css">
    <title>회원가입</title>
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

    <!-- 로그인 회색 상자 -->
    <div class="login_container"></div>

    <!-- 입력 -->
    <div class="input">
        <!-- 아이디 -->
        <div class="member-id">
            <div class="id">아이디</div>
            <input type="text" placeholder="아이디" class="input-id">
        </div>

        <!-- 비밀번호 -->
        <div class="member-pw">
            <div class="pw">비밀번호</div>
            <input type="password" placeholder="비밀번호" class="input-pw">
        </div>

        <!-- 비밀번호 재확인-->
        <div class="member-reconfirm">
            <div class="reconfirm">비밀번호 재확인</div>
            <input type="password" placeholder="비밀번호 재확인" class="input-reconfirm">
        </div>

        <!-- 이메일 -->
        <div class="member-email">
            <div class="email">이메일</div>
            <input type="email" placeholder="이메일" class="input-email">
        </div>
    </div>

    <button class="membershipButton" onClick="location.href='http://localhost/login.php'">회원가입</button>

    <script src="js/index.js"></script>
</body>

</html>