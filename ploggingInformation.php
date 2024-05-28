<?php require 'db.php'; ?>
<?php require 'auth.php' ?> <!--dp접근 php, 쿠키 관련 php 가져옴-->

<?php
if (isset($_POST['buttonClicked'])) {

    //버튼 누르면 플로깅 참여됨. 실패

    $memberId = $loginId;
    $ploggingId = $_POST['ploggingId'];

    // SQL 쿼리
    $sql2 = "INSERT INTO ploggingjoin (memberId, ploggingId) VALUES ('$memberId', '$ploggingId')";

    if ($conn->query($sql2) === TRUE) {
        echo "<script>
                alert('플로깅 참여 완료!');
                window.location.href = 'myPloggingJoin.php';
            </script>";
    } else {
        echo "<script>
                alert('추가 실패: " . $conn->error . "');
            </script>";
    }

    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/proggingInformation.css">
    <title>플로깅 게시판</title>
    <script>
        // 하트 수
        // plusHeartNum(){

        // }

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
        // console.log("현재 페이지의 id 값:", id);

        // 버튼 누르면 php실행
        function executePHP() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // 요청이 완료되었을 때 할 일
                    console.log(xhr.responseText); // PHP 스크립트로부터의 응답
                }
            };
            xhr.send("buttonClicked=true&ploggingId=" + ploggingId);
        }
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
    $sql = "SELECT * FROM plogging WHERE id = '$id' ORDER BY id DESC LIMIT 1";
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
                        <button class="enjoyButton" onclick="executePHP('<?php echo $row['id']; ?>')">참여하기</button>
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
                    <!-- 이전 댓글 1개 -->
                    <?php
                    // PHP 코드로 이전 댓글 가져오기
                    // 이전 댓글들을 루프를 통해 동적으로 생성하거나 데이터베이스 등에서 가져와서 출력할 수 있습니다.
                    $previousComments = array(
                        array("nickname" => "최씨인건가", "comment" => "아 제 5인격 아 베이스 하고싶어!!!!! 학교 싫어어!"),
                        array("nickname" => "박도도독", "comment" => "나는야 최고 멋쟁이. 나는야 킹왕짱이지"),
                        array("nickname" => "솔솔솔솔", "comment" => "나는 귀염뽀짝빵꾸가 될거얌. 일렉 좡좡좡좌라좡좡"),
                        array("nickname" => "민싱 그 잡체", "comment" => "닭다리 과자!!!!!! 루피야 사랑햄~~~~~")
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