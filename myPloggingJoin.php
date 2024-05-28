<?php require 'db.php'; ?>
<?php require 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingTabel.css">
    <link rel="stylesheet" href="css/myPageNav.css">
    <title>내가 참여한 플로깅</title>
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
            <i onClick="location.href='http://localhost/myRecofailueHeart.php'" class="myPageChoose">좋아요한 글</i>
        </h1>
    </div>
    <main class="main" style="margin-top: 65px;">
        <section class="container">
        <?php
            $memberId = $loginId;  // auth.php에서 가져온 $loginId 사용
            $sql = "SELECT p.title, p.schedule, p.time FROM ploggingjoin pj JOIN plogging p ON pj.ploggingId = p.id WHERE pj.memberId = '$memberId' ORDER BY pj.ploggingId DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='div'>";
                    echo "<div class='information'>";
                    echo "<h4 class='proggingTitle'>" . $row['title'] . "</h4>";
                    echo "<div class='sideInformation'>";
                    echo "<h5>일정 | " . $row['schedule'] . "</h5>";
                    echo "<h5>시간 | " . $row['time'] . "</h5>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>참여한 플로깅이 없습니다.</p>";
            }
            $conn->close();
            ?>
        </section>
    </main>

</body>

</html>