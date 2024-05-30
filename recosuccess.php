<?php
require 'db.php';
require 'auth.php';

// 검색 키워드
$keyword = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST['keyword'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?after">
    <link rel="stylesheet" href="css/recosuccess.css?val1">
    <title>어썹</title>
    <script>
        // 하트 이미지 변함
        function changeImage(clickedImageId, otherImageId) {
            var clickedImg = document.getElementById(clickedImageId);
            var otherImg = document.getElementById(otherImageId);

            if (clickedImg.style.display === 'none') {
                clickedImg.style.display = 'block';
                otherImg.style.display = 'none';
            } else {
                clickedImg.style.display = 'none';
                otherImg.style.display = 'block';
            }
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
                                <img id="image1" src="img/icon5.png" class="icon5" onclick="changeImage('image1', 'image2')">
                                <img id="image2" src="img/icon7.png" class="icon5" onclick="changeImage('image2', 'image1')" style="display: none;">
                                <span class="user-count-text"><?php echo $row['heartNum']; ?>명이 좋아요를 눌렀습니다!</span>
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
                                <img id="image1" src="img/icon5.png" class="icon5" onclick="changeImage('image1', 'image2')">
                                <img id="image2" src="img/icon7.png" class="icon5" onclick="changeImage('image2', 'image1')" style="display: none;">
                                <span class="user-count-text"><?php echo $row['heartNum']; ?>명이 좋아요를 눌렀습니다!</span>
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
