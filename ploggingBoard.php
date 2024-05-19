<?php require 'db.php'; ?>
<?php require 'auth.php'?>  <!--dp접근 php, 쿠키 관련 php 가져옴-->

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
                <p><button onClick="location.href='http://localhost/index.php'" class="backButton"><img src="./img/backButton.png"></button>
                    <i class="topName">플로깅</i>
            </h1>
            <i class="bi bi-pencil" onClick="location.href='http://localhost/ploggingWrite.php'"></i>
        </div>
    </header>

    <div class="subNav_container">
        <h1>
            <form method="GET" action="">
                <select name="area" class="chooseArea" onchange="this.form.submit()">
                    <?php
                    $areas = array("모든", "신림", "명동", "홍대", "강남");
                    $selected_area = isset($_GET['area']) ? $_GET['area'] : '모든';  // 기본값 설정
                    foreach ($areas as $area) {
                        $selected = $selected_area === $area ? "selected" : "";
                        echo "<option value='$area' class='area' $selected>$area</option>";
                    }
                    ?>
                </select>
            </form>
        </h1>
    </div>

    <main class="main">
        <section class="container">
            <?php
            $area = isset($_GET['area']) ? $_GET['area'] : '모든';
            // SQL 쿼리 조건 설정
            if ($area == '모든') {
                $sql = "SELECT * FROM plogging ORDER BY id DESC LIMIT 100";
            } else {
                $sql = "SELECT * FROM plogging WHERE area = '$area' ORDER BY id DESC LIMIT 100";
            }
            $result = $conn->query($sql); // 쿼리 실행
            if ($result->num_rows > 0) { // 조회 결과가 있으면
                $count = 0;
                while ($row = $result->fetch_assoc()) { // 조회 결과를 한 행씩 접근
            ?>
                    <div class="div" onClick="location.href='ploggingInformation.php?id=<?php echo $row['id']; ?>'">
                        <div class="img"></div>
                        <div class="information">
                            <h4 class="proggingTitle"><?php echo $row['title']; ?></h4>
                            <div class="sideInformation">
                                <h5>일정 | <?php echo $row['schedule']; ?></h5>
                                <h5>시간 | <?php echo $row['time']; ?></h5>
                            </div>
                            <div class="personnelDiv">
                                <div class="personnelImg"></div>
                                <h5 class='personnel'><?php echo $row['joinNum']; ?></h5>
                            </div>
                        </div>
                    </div>
            <?php
                    $count++; // 카운터 증가
                    // 카운터가 3의 배수일 때마다 hr 태그 출력
                    if ($count % 3 == 0) {
                        echo "<hr class='hr'>";
                    }
                }
            }
            $conn->close();
            ?>
        </section>
    </main>
</body>
<script src="js/index.js"></script>

</html>