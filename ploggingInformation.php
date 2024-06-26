<?php
require 'db.php';
require 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?val1">
    <link rel="stylesheet" href="css/proggingInformation.css?val2"> <!-- after -->
    <title>어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">   <!--폰트-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <script>
        // 로그인 상태 확인
        var isAuthenticated = <?php echo json_encode($authenticated); ?>;

        // 하트 이미지 바꾸기
        function changeImage(clickedImageId, otherImageId) {
            var clickedImg = document.getElementById(clickedImageId);
            var otherImg = document.getElementById(otherImageId);

            clickedImg.style.display = 'none';
            otherImg.style.display = 'block';
        }

        // 좋아요 관련 함수
        function plusHeartNum() {
            if (!isAuthenticated) {
                alert('로그인이 필요합니다.');
                return;
            }

            var urlParams = new URLSearchParams(window.location.search);
            var ploggingId = urlParams.get('id');
            var loginId = <?php echo json_encode($loginId); ?>;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateHeart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var likeText = document.querySelector('.likeText');
                    var currentLikes = parseInt(likeText.textContent) || 0;

                    // 좋아요 수, 이미지 변경
                    if (xhr.responseText === 'liked') {
                        likeText.textContent = (currentLikes + 1) + '명이 좋아요를 눌렀습니다.';
                        changeImage('image1', 'image2');
                    } else if (xhr.responseText === 'unliked') {
                        likeText.textContent = (currentLikes - 1) + '명이 좋아요를 눌렀습니다.';
                        changeImage('image2', 'image1');
                    } else {
                        console.error('좋아요 처리 실패:', xhr.responseText);
                    }
                    location.reload(); // 페이지 새로고침
                }
            };

            xhr.send("ploggingId=" + encodeURIComponent(ploggingId) + "&loginId=" + encodeURIComponent(loginId));
        }

        // 댓글 다는 버튼 js
        function updateChat() {
            if (!isAuthenticated) {
                alert('로그인이 필요합니다.');
                return;
            }

            var newChatContent = document.querySelector('.newChat').value;

            // 댓글 빈 문자인 경우
            if (newChatContent === "") {
                alert("댓글 내용을 입력하세요.");
                return;
            }

            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');
            var loginId = <?php echo json_encode($loginId); ?>;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateChat.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload(); // 페이지 새로고침
                }
            };

            xhr.send("content=" + encodeURIComponent(newChatContent) + "&id=" + encodeURIComponent(id) + "&loginId=" + encodeURIComponent(loginId));
        }

        // 하트 이미지 설정
        window.onload = function() {
            var liked = <?php
                        $id = isset($_GET['id']) ? $_GET['id'] : null;
                        $sqlCheckLiked = "SELECT * FROM ploggingheart WHERE memberId = '$loginId' AND ploggingId = '$id'";
                        $resultCheckLiked = $conn->query($sqlCheckLiked);
                        echo json_encode($resultCheckLiked->num_rows > 0);
                        $resultCheckLiked->close();
                        ?>;
            if (liked) {
                document.getElementById('image1').style.display = 'none';
                document.getElementById('image2').style.display = 'block';
            } else {
                document.getElementById('image1').style.display = 'block';
                document.getElementById('image2').style.display = 'none';
            }
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
    $sql = "SELECT * FROM plogging WHERE id = '$id'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <main class="main">
                <div class="backBorder">
                    <!-- 정보 보여줌 -->
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

                        <!-- 좋아요 -->
                        <div class="likeDiv">
                            <div class="icon-container">
                                <button class="likeButton" onclick="plusHeartNum()">
                                    <img id="image1" src="./img/icon5.png">
                                    <img id="image2" src="./img/icon7.png" style="display: none;">
                                </button>
                            </div>
                            <h5 class="likeText"><?php echo $row['heartNum']; ?>명이 좋아요를 눌렀습니다.</h5>
                        </div>

                        <!-- 참여하기 -->
                        <?php
                        $sqlJoin = "SELECT * FROM ploggingjoin WHERE memberId = '$loginId' and ploggingId = '$id'";
                        $resultJoin = $conn->query($sqlJoin);
                        if ($resultJoin->num_rows > 0) {
                            $alreadyJoined = true;
                        } else {
                            $alreadyJoined = false;
                        }
                        $resultJoin->close();
                        if ($alreadyJoined == false) {
                        ?>
                            <form id="joinPloggingForm" method="POST" action="./ploggingJoin.php" onsubmit="return checkLogin()">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
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
                <div class="chatUpdateArea">
                    <input type="text" name="newChat" class="newChat" placeholder="댓글을 입력하세요" required><br>
                    <button type="button" class="chatUpdate" onclick="updateChat()">댓글 등록</button>
                </div>
                <div class="beforeChar">
                    <?php
                    $sqlComments = "SELECT * FROM ploggingchat WHERE ploggingId = '$id'";
                    $resultComments = $conn->query($sqlComments);
                    if ($resultComments->num_rows > 0) {
                        while ($comment = $resultComments->fetch_assoc()) {
                    ?>
                            <div class='chat'>
                                <div class='profileImg'><img src='./img/person-circle.png'></div>
                                <div class='chatDetailed'>
                                    <h5 class='nickname'><?php echo $comment['chatMemberId']; ?></h5>
                                    <h5 class='detailed'><?php echo $comment['content']; ?></h5>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    $resultComments->close();
                    ?>
                </div>
            </div>
            </main>

</body>
<script src="js/proggingLikeButton.js"></script>
<script>
    function checkLogin() {
        if (!isAuthenticated) {
            alert('로그인이 필요합니다.');
            return false;
        }
        return true;
    }
</script>

</html>

