
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?val1">
    <link rel="stylesheet" href="css/recofailure.css?val1">
    <title> 어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!--폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">

</head>
<body>
    <!-- nav -->
     <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='/index.php'" class="backButton"><img
                            src="./img/backButton.png"></button>
                    <i class="topName">인식 결과</i>
            </h1>
        </div>
    </header>
    <div class="failure-message">인식에 실패하였습니다.</div>
    <div class="focus-message">
        <div>사진 초점을 맞추어</div>
        <div>다시 쓰레기를 인식해 보세요!</div>

        <div class="try-again-container">
            <div class="try-again-message">다시 인식을 시도해 보세요!</div>
            <button class="recognize-button" onClick="location.href='/camera.php'">다시 인식하기</button>
        </div>
    </div>
    <div class="top-line"></div>
</body>
</html>













