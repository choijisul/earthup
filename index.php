<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--dp접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">
<!--테스트-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?after">
    <link rel="stylesheet" href="css/homeNav.css?after">
    <link rel="stylesheet" href="css/myPage.css?after">
    <link rel="stylesheet" href="css/mypageDiv.css?after">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>어썹</title>
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <i onClick="location.href='index.html'" class="logName">어썹</i>
            </h1>
        </div>
    </header>
    <div class="header_container">
        <h1>
            <!-- $authenticated -->
            <i onClick="location.href='http://localhost/camera.php'" class="garbageSearch">쓰레기 검색</i>
            <i onClick="location.href='http://localhost/ploggingBoard.php'" class="proggingBoard">플로깅 게시판</i>
            <?php if ($authenticated == true) : ?>
                <button class="myPage"><img src="img/myPage.png" class="myPageImg"></button>
                <div class="menu">
                    <div class="section" id="section1">
                        <span class="idTitle"><?php echo $loginId; ?></span>
                        <button class="logout" onClick="location.href='http://localhost/logout.php'">로그아웃</button>
                    </div>
                    <hr class="hr">
                    <div class="section" id="section2">
                        <h1 class="title">마이페이지</h1>
                        <a href="http://localhost/myPloggingWrtie.php">작성한 플로깅</a>
                        <a href="http://localhost/myPloggingJoin.php">참여한 플로깅</a>
                        <a href="http://localhost/myPloggingHeart.php">좋아요한 플로깅</a>
                        <a href="http://localhost/myRecofailueHeart.php">좋아요한 글</a>
                    </div>
                </div>
            <?php else : ?>
                <i onClick="location.href='http://localhost/membership.php'" class="membership">회원가입</i>
                <i onClick="location.href='http://localhost/login.php'" class="login">로그인</i>
            <?php endif; ?>
        </h1>
    </div>

    <main class="main">
        <div id="banner-container">
            <img src="img/나무.jpg" class="banner-image" alt="">
            <img src="img/숲속.jpg" class="banner-image" alt="">
            <img src="img/나무2.jpg" class="banner-image" alt="">
        </div>

        <div class="bottom-part">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/지구.jpg" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <div class="textzone">
                            <p>쓰레기를 찍어 쉽게<br> 분리수거를 해보세요.<br>
                                쓰레기를 버리는 방법을<br> 터득하여 지구를 보호해주세요.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/분리수거.jpg" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p>쓰레기를 바르게 버리는 일,<br> 지구를 지키는 가장 쉬운<br>
                            방법입니다.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <!-- Consider using a different image for differentiation -->
                    <img src="img/환경캠페인.jpg" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p class="earth-responsibility">
                        <p>우리가 만든 쓰레기,<br> 우리가 책임지는 지구.</b></p>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="js/index.js"></script>
<script src="js/script.js"></script>

</html>