<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--db접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">
<!--테스트-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css?val7"> <!--after, val1-->
    <link rel="stylesheet" href="css/homeNav.css?val3">
    <link rel="stylesheet" href="css/mypageDiv.css?val2">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--폰트-->
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

        <!-- 메인 중간 부분 -->
        <div class="container">
            <div class="conatiner-1"><img src="img/round-1.png" alt=""></div>
            <div class="conatiner-2"><img src="img/round-2.png" alt=""></div>
            <div class="conatiner-3"><img src="img/round-3.png" alt=""></div>
        </div>

        <!-- 중간 부분 설명 -->
        <div class="context fade-in">
            <p id="context-title">어썹은 손 쉬운 정보 제공을 도와요!</p>
            <p id="context">가끔씩 재활용 쓰레기를 버릴 때 이게 종이인지 일반 쓰레기인지
                헷갈리셨던 경험이 있지 않으신가요? <br>
                저희 어썹은 이러한 문제를 해결하고자 탄생한 서비스입니다!<br>
                간편하게 카메라로 쓰레기를 찍기만 하면 티처블 머신, 즉 인공지능이 인식하여
                쓰레기 버리는 방법을 제공받을 수 있습니다. <br>
                그럼 왜 분리수거를 해야 할까요? <br>
                쓰레기를 분리수거하지 않으면 쓰레기마다 다른 처리 방법이 필요하지 않으므로 <br>
                종합적인 처리가 이루어지지 않습니다. 이로 인해 쓰레기 처리 시설에 많은 부담이 가게 되고, <br>
                쓰레기가 불법 투기되거나 소각되는 경우 환경오염의 원인이 됩니다.</p>
            <button onClick="location.href='/camera.php'">쓰레기 인식하러 가기</button>
        </div>

        <div class="context fade-in">
            <p id="context-title">플로깅 모임에 직접 참여해봐요!</p>
            <p id="context">플로깅에 대해서 아시나요? <br>
                플로깅(Plogging)은 '줍다'라는 뜻의 스웨덴어 플로카 업(plocka upp)과 '달리다'라는 뜻의 <br>
                영어 조깅(Jogging)을 합성한 단어로, 쓰레기를 주우며 조깅하는 행동을 의미합니다. <br>
                플로깅을 하면 근력 운동의 효과 또한 누릴 수 있다. 다리를 구부리고 팔을 뻗어 쓰레기를 줍는 플로깅의 자세 때문입니다! <br>
                플로깅할 때 다리를 구부리는 것은 근력 운동인 스쿼트 자세와 유사하다. 스쿼트는 허벅지가 무릎과 수평이 될 때까지 앉았다 일어났다 하는 운동으로 <br>
                옆구리, 허벅지, 엉덩이, 종아리 등 여러 부분에 자극을 주어 군살을 잡아주고 근육을 키우는 효과가 있습니다! <br>
                또한 무게감 있는 쓰레기봉투를 들거나, 집게로 쓰레기를 줍는 행동은 팔 근력을 강화하는 데에도 도움을 줍니다. <br>
                이러한 플로깅 모임을 어썹에서 시작해보는 것이 어떨까요?</p>
            <button onClick="location.href='/ploggingBoard.php'">플로깅 모임 참여하러 가기</button>
        </div>

        <div class="context fade-in">
            <p id="context-title">더 자세하게 알고 싶을 때는 키워드 검색을 해봐요!</p>
            <p id="context">키워드를 입력하여 더 자세하게 쓰레기 버리는 방법을 알 수 있습니다. <br>
                환경을 보호하는 방법은 여러가지가 있습니다. 여기서 제안한 것들중 일부는 쉽게 시작할 수 있지만, <br>
                작은 일부터 시작해서 자신감이 생기면 더 많은 일을 추가해봅시다! <br>
                환경보호에 동참하는 가장 보편적인 이유는 환경을 보호하기 위해서 이지만, 다른 혜택도받게 됩니다. <br>
                전기를 절약하거나, 물이 새는 수도꼭지를 고치거나, 옷을 널어 말리면, 물이나 전기 요금이 절약됩니다.</p>
            <button onClick="location.href='/recosuccess.php'">키워드 검색하러 가기</button>
        </div>



    </main>
    <footer class="footer" id="footer">
        <div class="footer-content">
            <p>&copy; 2024 earthup <a href="https://github.com/choijisul/earthup" target="_blank"><img src="img/github-mark.png" alt="GitHub" class="social-icon"></a></p>
            <br>
            Address
            <p>
                <a href="mailto:w2204@e-mirim.hs.kr">w2204@e-mirim.hs.kr &nbsp;&nbsp;</a>
                <a href="mailto:w2209@e-mirim.hs.kr">w2209@e-mirim.hs.kr</a>
            <p>
                <a href="mailto:w2212@e-mirim.hs.kr">w2212@e-mirim.hs.kr &nbsp;&nbsp;</a>
                <a href="mailto:w2217@e-mirim.hs.kr">w2217@e-mirim.hs.kr</a>
            </p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = {
                threshold: 0.6 
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // 감지 후 관찰 X
                    }
                });
            }, options);

            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>

    <script src="js/script.js"></script>
</body>

</html>