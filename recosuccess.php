<?php
require 'db.php';
require 'auth.php';

// 인식 결과를 키워드로 설정
$keyword = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['highestClass'];
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?after">
    <link rel="stylesheet" href="css/recosuccess.css?val1">
    <title>어썹</title>
    <link rel="icon" href="img/pavicon.png" type="image/png" sizes="32x32">
    <script>
        // 하트 이미지 변환 및 heartNum 업데이트
        function changeImage(postId) {
            var heartNumElement = document.getElementById('heartNum_' + postId);

            var newHeartNum = parseInt(heartNumElement.textContent) + 1;
            heartNumElement.textContent = newHeartNum;

            // heartNum 값을 서버에 저장
            fetch('update_heartNum.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ post_id: postId, heartNum: newHeartNum })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='http://localhost/camera.php'" class="backButton"><img src="./img/backButton.png"></button>
                    <i onClick="location.href='http://localhost/index.php'" class="topName">인식 결과</i>
            </h1>
        </div>
    </header>

    <!-- 검색결과 -->
    <div class="top-line">
        <div class="keyword-text">인식 결과의 키워드</div>
        <div class="button-container">
            <?php if ($keyword !== ''): ?>
                <button class="keyword-button"><?php echo htmlspecialchars($keyword); ?></button>
            <?php endif; ?>
            <div class="searchtext">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" name="keyword" id="searchInput" value="<?php echo htmlspecialchars($keyword); ?>">
                    <button type="submit" class="search_button"><img src="img/icon3.png" class="icon3"></button>
                </form>
            </div>
        </div>
    </div>

    <!-- 글 화면 -->
    <?php
    if ($keyword !== '') {
        $sql = "SELECT * FROM methodpost WHERE keyword = ? ORDER BY id DESC LIMIT 100";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $keyword);
        $stmt->execute();
        $result = $stmt->get_result(); // 쿼리 실행

        if ($result->num_rows > 0) { // 조회 결과가 있으면
            while ($row = $result->fetch_assoc()) { // 조회 결과를 한 행씩 접근
                $postId = $row['id'];
    ?>
                <main class="main">
                    <div class="board-container">
                        <div class="content">
                            <p class="header-text"><?php echo $row['title']; ?></p>
                            <div class="header-line"></div>
                            <div class="paragraph">
                                <p><?php echo $row['detail']; ?></p>
                            </div>
                        </div>
                        <div class="icon5-container">
                            <div class="icon-container">
                            <?php if ($authenticated): ?>
                                    <img id="image_<?php echo $postId; ?>" src="img/icon7.png" class="icon5" onclick="changeImage(<?php echo $postId; ?>)">
                                <?php else: ?>
                                    <img src="img/icon7.png" class="icon5">
                                <?php endif; ?>
                                <span class="user-count-text"><span id="heartNum_<?php echo $postId; ?>"><?php echo $row['heartNum']; ?></span>명이 좋아요를 눌렀습니다!</span>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            }
        } else {
            ?>
            <img src="img/error.png" class="error">
            <p class="failSearch">검색결과를 찾지 못했습니다.</p>
            <p class="failComment">이렇게 검색해 주세요<br> ex 페트병, 캔</p>
    <?php
        }
        $stmt->close();
    } else {
        $sql = "SELECT * FROM methodpost ORDER BY id DESC LIMIT 100";
        $result = $conn->query($sql); // 쿼리 실행

        if ($result->num_rows > 0) { // 조회 결과가 있으면
            while ($row = $result->fetch_assoc()) { // 조회 결과를 한 행씩 접근
                $postId = $row['id'];
    ?>
                <main class="main">
                    <div class="board-container">
                        <div class="content">
                            <p class="header-text"><?php echo $row['title']; ?></p>
                            <div class="header-line"></div>
                            <div class="paragraph">
                                <p><?php echo $row['detail']; ?></p>
                            </div>
                        </div>
                        <div class="icon5-container">
                            <div class="icon-container">
                            <?php if ($authenticated): ?>
                                    <img id="image_<?php echo $postId; ?>" src="img/icon7.png" class="icon5" onclick="changeImage(<?php echo $postId; ?>)">
                                <?php else: ?>
                                    <img src="img/icon7.png" class="icon5">
                                <?php endif; ?>
                                <span class="user-count-text"><span id="heartNum_<?php echo $postId; ?>"><?php echo $row['heartNum']; ?></span>명이 좋아요를 눌렀습니다!</span>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            }
        }
    }
    $conn->close();
    ?>
</body>
</html>
