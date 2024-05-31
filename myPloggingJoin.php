<?php
require 'db.php';
require 'auth.php';

// 오류 보고 설정
error_reporting(E_ALL); // 모든 오류를 보고
ini_set('display_errors', 0); // 오류 메시지를 화면에 표시하지 않음
ini_set('log_errors', 1); // 오류를 로그 파일에 기록
ini_set('error_log', '/path/to/your/error.log'); // 로그 파일 경로 설정

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingTabel.css">
    <link rel="stylesheet" href="css/myPageNav.css">
    <title>내가 작성한</title>
</head>

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
            <i onClick="location.href='http://localhost/myPloggingWrtie.php'" class="myPageChoose">작성한 플로깅</i>
            <i onClick="location.href='http://localhost/myPloggingJoin.php'" class="myPageChoose" style="font-size: 17px;">참여한 플로깅</i>
            <i onClick="location.href='http://localhost/myPloggingHeart.php'" class="myPageChoose">좋아요한 플로깅</i>
        </h1>
    </div>
    <main class="main" style="margin-top: 65px;">
        <section class="container">
            <?php

            // ploggingjoin과 plogging 테이블
            $sql = "
                SELECT p.*, pj.memberId AS joinMemberId 
                FROM plogging p 
                LEFT JOIN ploggingjoin pj ON p.id = pj.ploggingId
                ORDER BY p.writerMemberId DESC, pj.memberId DESC 
                LIMIT 100";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) :
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($loginId == $row['memberId'] || $loginId == $row['joinMemberId']) :
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
                        $count++;
                        // 카운터가 3배수일 때 hr 태그
                        if ($count % 3 == 0) {
                            echo "<hr class='hr'>";
                        } ?>
            <?php
                    endif;
                }
            endif;
            $conn->close();
            ?>
        </section>
    </main>

</body>

</html>
