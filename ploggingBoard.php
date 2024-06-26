<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--dp접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?val2">
    <link rel="stylesheet" href="css/proggingTabel.css?val3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!--폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
</head>

<script>
    // 로그인 되어있는 경우
    function showAlert() {
        alert('로그인 후 이용 가능합니다.');
        window.location.href = 'login.php';
    }

    // 플로깅 커버 이미지 랜덤
    const numberOfImages = 20;
    const imagePath = 'img/ploggingRandomImg/';
    const imagePrefix = 'ploggingImg';
    const imageExtension = '.png';

    function getRandomImage() {
        const randomIndex = Math.floor(Math.random() * numberOfImages) + 1;
        return imagePath + imagePrefix + randomIndex + imageExtension;
    }

    window.onload = function() {
        document.querySelectorAll('.randomPloggingImg').forEach(img => {
            img.src = getRandomImage();
        });
    };
</script>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='/index.php'" class="backButton"><img src="./img/backButton.png"></button>
                    <i class="topName">플로깅</i>
            </h1>
            <div class="pencil">
                <i class="bi bi-pencil" id="pencil" onClick="<?php echo $authenticated ? "location.href='/ploggingWrite.php'" : "showAlert();" ?>"></i>
            </div>
        </div>
    </header>

    <div class="subNav_container">
        <h1>
            <form method="GET" action="">
                <select name="area" class="chooseArea" onchange="this.form.submit()">
                    <?php
                    $areas = array("모든", "관악구", "도봉구", "종로구", "구로구", "영등포구", "동작구", "금천구", "강남구");
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
                        <div class="ploggingImgDiv">
                            <img src="" class="ploggingImg randomPloggingImg">
                        </div>
                        <div class="information">
                            <h4 class="proggingTitle"><?php echo $row['title']; ?></h4>
                            <div class="sideInformation">
                                <h5>일정 | <?php echo $row['schedule']; ?></h5>
                                <h5>시간 | <?php echo $row['time']; ?></h5>
                            </div>
                            <div class="personnelDiv">
                                <div class="personnelImg"><img src="img/JoinPloggingIcon.png" class="joinPloggingIcon"></div>
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
