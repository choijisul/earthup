<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--db접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">
<!--테스트-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?val3"> <!--after, val1-->
    <link rel="stylesheet" href="css/homeNav.css?after">
    <link rel="stylesheet" href="css/myPage.css?after">
    <link rel="stylesheet" href="css/mypageDiv.css?after">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
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
    
        <div class="bottom-part">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진1.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <div class="textzone">
                            <p>버리는 방법을 모르겠는 쓰레기를<br>
                                카메라에 대고 찍어주세요<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진2.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
<<<<<<< HEAD
                    <p>인식결과로 나온 처리방법에 따라<br>
                        알맞게 쓰레기를 버려주세요!</p>
                    </div>
=======
                        <p>플로깅 게시판에서 다양한 사람들과,<br>
                            함께 쓰레기를 줍고 환경을 지켜요!</p>
>>>>>>> 557959f4df5ce1e2c1df13f2e0b995c57fd842e0
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part"_>
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진3.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p class="earth-responsibility">
                        <p>플로깅 게시판에서 같이 플로깅할 사람을 구해<br>쓰레기를 주우러 다녀 보세요</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <button id="moreBtn" class="more-button">더보기</button> -->
        <div class="bottom-part more-content" style="display: none;">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진4.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p>지구의 행복은 우리의 행복!</p>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
</div>
=======
        <div class="bottom-part more-content" style="display: none;">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진5.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p>즐거운 지구와 아름다운 세상</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part more-content" style="display: none;">
            <div class="array">
                <div class="leftzone" data-aos="fade-right">
                    <img src="img/서브사진6.png" class="leftzone-image">
                </div>
                <div class="rightzone" data-aos="fade-left">
                    <div class="textzone">
                        <p>찰칵 한번으로 지구를 살리는 길!</p>
                    </div>
                </div>
            </div>
        </div>
>>>>>>> 557959f4df5ce1e2c1df13f2e0b995c57fd842e0
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
