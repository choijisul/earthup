<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/proggingTabel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>플로깅 게시판 !!</title>
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='index.php'" class="backButton"><img
                            src="./img/backButton.png"></button>
                    <i onClick="location.href='index.php'" class="topName">플로깅</i>
            </h1>
            <i class="bi bi-pencil" onClick="location.href='proggingWrite.php'"></i>
        </div>
    </header>

    <div class="subNav_container">
        <h1>
            <form>
                <select name="area" class="chooseArea">
                    <?php
                    $areas = array("신림동", "역삼동", "대치동", "지역1", "지역2");
                    foreach ($areas as $area) {
                        echo "<option value='area1' class='area'>$area</option>";
                    }
                    ?>
                </select>
            </form>
        </h1>
    </div>

    <main class="main">
        <section class="container">
            <!-- 첫 번째 칸 -->
            <div class="div" onClick="location.href='proggingInformation.php'">
                <div class="img"></div>
                <div class="information">
                    <h4 class="proggingTitle">도림천에서 플로깅 해요</h4>
                    <div class="sideInformation">
                        <h5>일정 | 어쩌구 저쩌구</h5>
                        <h5>시간 | 어쩌구 저쩌구</h5>
                    </div>
                    <div class="personnelDiv">
                        <div class="personnelImg"></div>
                        <?php
                        $personnel = 5;
                        echo "<h5 class='personnel'>$personnel</h5>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="div">
            </div>
            <div class="div">
            </div>
            <hr class="hr">

            <!-- 두 번째 칸 -->
            <div class="div">
            </div>
            <div class="div">
            </div>
            <div class="div">
            </div>
            <hr class="hr">

            <!-- 세 번째 칸 -->
            <div class="div">
            </div>
            <div class="div">
            </div>
            <div class="div">
            </div>
            <hr class="hr">

            <!-- 네 번째 칸 -->
            <div class="div">
            </div>
            <div class="div">
            </div>
            <div class="div">
            </div>
            <hr class="hr">

            <!-- 다섯 번째 칸 -->
            <div class="div">
            </div>
            <div class="div">
            </div>
            <div class="div">
            </div>
        </section>
    </main>
</body>
<script src="js/index.js"></script>

</html>
