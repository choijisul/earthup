<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/recofailure.css">

    <title> 어썹</title>
</head>
<body>
    <!-- nav -->
     <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='camera.html'" class="backButton"><img
                            src="./img/backButton.png"></button>
                    <i onClick="location.href='index.html'" class="topName">인식 결과</i>
            </h1>
            <i class="bi bi-pencil" onClick="location.href='proggingWrite.html'"></i>
        </div>
    </header>


    <div class="failure-message">인식에 실패하였습니다.</div>
    <div class="focus-message">
        <div>사진 초점을 맞추어</div>
        <div>다시 쓰레기를 인식해 보세요!</div>

        <div class="try-again-container">
            <div class="try-again-message">다시 인식을 시도해 보세요!</div>
            <button class="recognize-button" onClick="location.href='camera.html'">다시 인식하기</button>
        </div>
    </div>
    <div class="top-line"></div>
</body>
</html>





