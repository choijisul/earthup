<?php
require 'db.php';
require 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingTabel.css?val1">
    <link rel="stylesheet" href="css/myPageNav.css">
    <title>내가 작성한</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
</head>

<script>
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
                <button onClick="location.href='http://localhost/index.php'" class="backButton"><img src="./img/backButton.png"></button>
            </h1>
        </div>
    </header>

    <div class="header_container">
        <h1>
            <i onClick="location.href='http://localhost/myPloggingWrtie.php'" class="myPageChoose" style="font-size: 17px;">작성한 플로깅</i>
            <i onClick="location.href='http://localhost/myPloggingJoin.php'" class="myPageChoose">참여한 플로깅</i>
            <i onClick="location.href='http://localhost/myPloggingHeart.php'" class="myPageChoose">좋아요한 플로깅</i>
        </h1>
    </div>
    <main class="main" style="margin-top: 65px;">
        <section class="container">
            <?php
            // 작성한 플로깅과 참여한 플로깅을 함께 조회하는 쿼리
            $sql = "
                SELECT DISTINCT p.*
                FROM plogging p
                LEFT JOIN ploggingjoin pj ON p.id = pj.ploggingId
                WHERE p.writerMemberId = '$loginId' OR pj.memberId = '$loginId'
                ORDER BY p.writerMemberId DESC, p.id DESC
                LIMIT 100";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) :
                $count = 0;
                while ($row = $result->fetch_assoc()) :
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
                    } ?>
                <?php
                endwhile;
            else :
                ?>
                <div class="noResult"> 작성한 플로깅이 없습니다.</div>
            <?php
            endif;
            $conn->close();
            ?>
        </section>
    </main>

</body>

</html>