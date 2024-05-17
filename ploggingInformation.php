<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css">
    <link rel="stylesheet" href="css/proggingInformation.css">
    <title>플로깅 게시판</title>
    <script>
        function changeImage(clickedImageId, otherImageId) {
            var clickedImg = document.getElementById(clickedImageId);
            var otherImg = document.getElementById(otherImageId);

            clickedImg.style.display = 'none';
            otherImg.style.display = 'block';
        }
    </script>

</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='ploggingBoard.php'"class="backButton">
                    <img src="./img/backButton.png"></button>
                    <i onClick="location.href='index.php'" class="topName">
                        <?php
                        // PHP 코드로 플로깅 title 가져오기
                        $title = "플로깅 title 가져오기";
                        echo $title;
                        ?>
                    </i>
            </h1>
        </div>
    </header>

    <main class="main">
        <div class="backBorder">
            <!-- 정보 칸(왼) -->
            <div class="informationArea">
                <h3 class="informationTitle">
                    <?php
                    // PHP 코드로 제목 가져오기
                    $title = "제목 불러옴";
                    echo $title;
                    ?>
                </h3>
                <div class="sideInformation">
                    <h4 class="informationSchedule">일정
                        <h6 class="informationSchedule">
                            <?php
                            // PHP 코드로 일정 가져오기
                            $schedule = "일정 정보 불러오기";
                            echo $schedule;
                            ?>
                        </h6>
                    </h4>
                    <h4 class="informationSchedule">시간
                        <?php
                        // PHP 코드로 시간 가져오기
                        $time = "시간 정보 불러오기";
                        echo $time;
                        ?>
                    </h4>
                </div>
                <div class="informationIntroduction">
                    <?php
                    // PHP 코드로 소개글 가져오기
                    $introduction = "블라블라<br>샬라샬라<br> 같이 해주세요ㅠㅠ";
                    echo $introduction;
                    ?>
                </div>
                <hr>
                <div class="likeDiv">
                    <div class="icon-container">
                        <button class="likeButton">
                            <img id="image1" src="./img/icon5.png" onclick="changeImage('image1', 'image2')">
                            <img id="image2" src="./img/icon6.png" onclick="changeImage('image2', 'image1')" style="display: none;">
                        </button>
                    </div>
                    <h5 class="likeText">누가누가 좋아한다 이거야.</h5>
                </div>
                <button class="enjoyButton">참여하기</button>
            </div>

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
        </div>
    </main>

</body>
<script src="js/proggingLikeButton.js"></script>

</html>
