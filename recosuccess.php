<?php
require 'db.php';
require 'auth.php';

session_start();

// 사용자 이름 가져오기
$username = '';
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} elseif (isset($_COOKIE['id'])) {
    $enc_id = $_COOKIE['id'];
    $cookie_value = decrypt($enc_id);
    $username = $cookie_value; // 사용자 이름이 쿠키에 저장되어 있다고 가정
}

// JavaScript 코드를 추가하여 HTML에 사용자 이름 설정
echo "<script>
    var username = '$username';
    document.addEventListener('DOMContentLoaded', function() {
        var userCountTextElements = document.getElementsByClassName('user-count-text');
        for (var i = 0; i < userCountTextElements.length; i++) {
            userCountTextElements[i].innerHTML = userCountTextElements[i].innerHTML.replace('user1214', username);
        }
    });
</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingNav.css?after">
    <link rel="stylesheet" href="css/recosuccess.css?after">
    <title>어썹</title>
    <script>
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

        function search() {
            var keyword = document.getElementById('searchInput').value;
            if (keyword.trim() === '') {
                alert('검색어를 입력해주세요.');
                return;
            }
            var searchResultElement = document.getElementById('searchResult');
            searchResultElement.innerHTML = '검색 중...';

            fetch('search.php?keyword=' + encodeURIComponent(keyword))
                .then(response => response.text())
                .then(data => {
                    searchResultElement.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>

<body>
    <!-- nav -->
    <header>
        <div class="nav_container">
            <h1>
                <p><button onClick="location.href='camera.html'" class="backButton"><img src="./img/backButton.png"></button>
                    <i onClick="location.href='index.html'" class="topName">인식 결과</i>
            </h1>
            <i class="bi bi-pencil" onClick="location.href='proggingWrite.html'"></i>
        </div>
    </header>

    <!-- 검색결과 -->
    <div class="top-line">
        <div class="keyword-text">인식 결과의 키워드</div>
        <div class="button-container">
            <button class="keyword-button">마라탕</button>
            <div class="searchtext">
                <input type="text" id="searchInput">
            </div>
        </div>
        <img src="img/icon3.png" class="icon3" onclick="search()">
    </div>

    <!-- 글 화면 -->
    <?php
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
    $conn->close();
    ?>

</body>

</html>