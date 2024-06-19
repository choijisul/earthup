<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--db접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">
<!--테스트-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?val5"> <!--after, val1-->
    <link rel="stylesheet" href="css/homeNav.css?val3">
    <link rel="stylesheet" href="css/mypageDiv.css?val2">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!--폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <title>어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <img src="img/logo2.png" alt="어썹" class="logName">
            </h1>
        </div>
    </header>

    <div class="header_container">
        <h1>
            <!-- $authenticated -->
            <i onClick="location.href='/camera.php'" class="garbageSearch">쓰레기 검색</i>
            <i onClick="location.href='/ploggingBoard.php'" class="proggingBoard">플로깅 게시판</i>
            <i onClick="location.href='/recosuccess.php'" class="processingMethod">처리 방법</i>
            <?php if ($authenticated == true) : ?>
                <button class="myPage"><img src="img/myPage.png" class="myPageImg"></button>
                <div class="menu">
                    <div class="section" id="section1">
                        <span class="idTitle"><?php echo $loginId; ?></span>
                        <button class="logout" onClick="location.href='/logout.php'">로그아웃</button>
                    </div>
                    <hr class="hr">
                    <div class="section" id="section2">
                        <h1 class="title">마이페이지</h1>
                        <a href="/myPloggingWrtie.php">작성한 플로깅</a>
                        <a href="/myPloggingJoin.php">참여한 플로깅</a>
                        <a href="/myPloggingHeart.php">좋아요한 플로깅</a>
                    </div>
                </div>
            <?php else : ?>
                <i onClick="location.href='/membership.php'" class="membership">회원가입</i>
                <i onClick="location.href='/login.php'" class="login">로그인</i>
            <?php endif; ?>
        </h1>
    </div>
    <main class="main">
        <div id="banner-container">
            <img src="img/메인사진1.png" class="banner-image" alt="">
            <img src="img/메인사진2.png" class="banner-image" alt="">
            <img src="img/메인사진3.png" class="banner-image" alt="">
        </div>

    <!-- 동그라미 -->
    <div class="container">
        <div class="conatiner-1">
            <a href="http://localhost/camera.php"><img src="img/round-1.png" alt=""></a>
        </div>

        <div class="conatiner-2">
            <a href="http://localhost/ploggingBoard.php"><img src="img/round-2.png" alt=""></a>
        </div>

        <div class="conatiner-3">
            <a href="http://localhost/recosuccess.php"><img src="img/round-3.png" alt=""></a>
        </div>
    </div>

    </main>
    <footer class="footer" id="footer">
        <div class="footer-content">
            <p>&copy; 2024 earthup <a href="https://github.com/choijisul/earthup" target="_blank"><img src="img/github-mark.png" alt="GitHub" class="social-icon"></a></p>

            <p>Contact us: 
                <a href="mailto:w2204@e-mirim.hs.kr">w2204@e-mirim.hs.kr</a>,
                <a href="mailto:w2209@e-mirim.hs.kr">w2209@e-mirim.hs.kr</a>
            <p>Contact us: 
                <a href="mailto:w2212@e-mirim.hs.kr">w2212@e-mirim.hs.kr</a>,
                <a href="mailto:w2217@e-mirim.hs.kr">w2217@e-mirim.hs.kr</a>
            </p>
        </div>
    </footer>
    <script src="js/index.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
