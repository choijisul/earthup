<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--dp접근 php, 쿠키 관련 php 가져옴-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/proggingWrite.css">
    <title>플로깅 작성</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
</head>

<!-- 안된 부분 : 아이디 전달X  -->

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='http://localhost/ploggingBoard.php'" class="backButton">
                        <img src="./img/backButton.png"></button>
                    <a class="topName">플로깅 작성</a>
            </h1>
        </div>
    </header>


    <main class="main">
        <form method="post" action="">
            <div class="backBorder">
                <!-- 제목, 일정, 시간 입력 -->
                <div class="informationArea">
                    <input type="text" name="title" class="titleInput" placeholder="제목을 입력하세요" required><br>
                    <input type="text" name="schedule" class="scheduleInput" placeholder="일정을 입력하세요" required><br>
                    <input type="text" name="time" class="timeInput" placeholder="시간을 입력하세요" required><br>
                </div>
                <hr class="hr">
                <!-- 내용 작성, 지역선택, 버튼 -->
                <div class="writeArea">
                    <textarea name="detail" class="detailInput" placeholder="내용을 입력하세요" required></textarea>
                    <select name="area" class="areaSelect">
                        <option value="신림">신림</option>
                        <option value="명동">명동</option>
                        <option value="홍대">홍대</option>
                        <option value="강남">강남</option>
                    </select>
                    <button type="submit" class="raiseButton">올리기</button>
                </div>
            </div>
        </form>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 폼 데이터 가져오기
            $title = $conn->real_escape_string($_POST['title']);
            $schedule = $conn->real_escape_string($_POST['schedule']);
            $time = $conn->real_escape_string($_POST['time']);
            $detail = $conn->real_escape_string($_POST['detail']);
            $area = $conn->real_escape_string($_POST['area']);
            $writerMemberId = $loginId;

            // SQL 쿼리
            $sql = "INSERT INTO plogging (area, title, schedule, time, writerMemberId, detail) " .
                "VALUES ('$area', '$title', '$schedule', '$time', '$writerMemberId', '$detail')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    alert('플로깅 추가 성공!');
                    window.location.href = 'ploggingBoard.php';
                </script>";
            } else {
                echo "<script>console.error('추가 실패: " . $conn->error . "');</script>";
            }

            $conn->close();
        }
        ?>
    </main>

</body>

</html>