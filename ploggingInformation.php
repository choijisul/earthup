<?php require 'db.php'; ?>
<?php require 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/proggingInformation.css">
    <title>플로깅 게시판</title>
    <script>
        // 하트 이미지 바뀜
        function changeImage(clickedImageId, otherImageId) {
            var clickedImg = document.getElementById(clickedImageId);
            var otherImg = document.getElementById(otherImageId);

            clickedImg.style.display = 'none';
            otherImg.style.display = 'block';
        }

        // 현재 페이지 URL에서 id 파라미터 값을 가져와서 콘솔에 출력
        var urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get('id');
        console.log("현재 페이지의 id 값:", id);
        // console.log("현재 로그인 아이디 : ", <?php $loginId; ?>);
    </script>

</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='ploggingBoard.php'" class="backButton">
                        <img src="./img/backButton.png"></button>
            </h1>
        </div>
    </header>

    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $sql = "SELECT * FROM plogging WHERE id = '$id'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <main class="main">
                <div class="backBorder">
                    <!-- 정보 칸(왼) -->
                    <div class="informationArea">
                        <h3 class="informationTitle">
                            <?php echo $row['title']; ?>
                        </h3>
                        <div class="sideInformation">
                            <h4 class="informationSchedule">일정
                                <?php echo $row['schedule']; ?>
                            </h4>
                            <h4 class="informationSchedule">시간
                                <?php echo $row['time']; ?>
                            </h4>
                        </div>
                        <div class="informationIntroduction">
                            <?php echo $row['detail']; ?>
                        </div>
                        <hr>
                        <div class="likeDiv">
                            <div class="icon-container">
                                <button class="likeButton" onclick="plusHeartNum()">
                                    <img id="image1" src="./img/icon5.png" onclick="changeImage('image1', 'image2')">
                                    <img id="image2" src="./img/icon6.png" onclick="changeImage('image2', 'image1')" style="display: none;">
                                </button>
                            </div>
                            <h5 class="likeText"><?php echo $row['heartNum']; ?>명이 좋아요를 눌렀습니다.</h5>
                        </div>
                        <?php
                        $sqlJoin = "SELECT * FROM ploggingjoin WHERE memberId = '$loginId' and ploggingId = '$id'";
                        $resultJoin = $conn->query($sqlJoin);
                        if ($resultJoin->num_rows > 0) {
                            $alreadyJoined = true;
                        }else{
                            $alreadyJoined = false;
                        }
                        $resultJoin->close();
                        if ($alreadyJoined == false) {
                        ?>
                            <form id="joinPloggingForm" method="POST" action="./ploggingJoin.php">
                                <input type="hidden" name="id" value="<?php echo $id ?>"> <!-- 참여하기 버튼을 누르면 POST 데이터에 joinPlogging이라는 키가 전송됩니다. -->
                                <button type="submit" class="enjoyButton">참여하기</button>
                            </form>
                        <?php
                        } else {
                        ?>
                            <button type="button" class="enjoyButton" disabled>참여완료</button>
                        <?php
                        }
                        ?>
                    </div>
            <?php
        }
    }
            ?>
            <!-- 댓글 칸(오) -->
            <div class="chatArea">
                <!-- 댓글 입력 -->
                <input type="text" name="newChat" class="newChat" placeholder="댓글을 입력하세요"><br>
                <div class="beforeChar">
                    <?php
                    $previousComments = array(
                        array("nickname" => "최씨인건가", "comment" => "아 제 5인격 아 베이스 하고싶어!!!!! 학교 싫어어!"),
                    );

                    foreach ($previousComments as $comment) {
                        echo "<div class='chat'>";
                        echo "<div class='profileImg'><img src='./img/person-circle.png'></div>";
                        echo "<div class='chatDetailed'>";
                        echo "<h5 class='nickname'>" . $comment['nickname'] . "</h5>";
                        echo "<h5 class='detailed'>" . $comment['comment'] . "</h5>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            </main>

</body>
<script src="js/proggingLikeButton.js"></script>

</html>