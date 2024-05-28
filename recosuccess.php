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
    <div class="top-line">
        <div class="keyword-text">인식 결과의 키워드</div>
        <div class="button-container">
            <button class="keyword-button">마라탕</button>
            <button class="keyword-button">배달용기</button>
            <div class="searchtext">
                <input type="text" id="searchInput">
            </div>
        </div>
        <img src="img/icon3.png" class="icon3" onclick="search()">
    </div>
    
    <!-- First main section -->
    <main class="main">
        <div class="board-container">
            <div class="content">
                <p class="header-text">마라탕 배달 용기 알맞게 버리기!</p>
                <div class="header-line"></div>
                <div class="paragraph">
                    <p>향신료를 넣어 알싸한 매운 맛이 인기인 마라탕이 요즘 길거리에서 많이 볼 수 있습니다.
                        하지만 고추기름, 마라기름과 같이 기름이 많이 들어가는 마라탕 특성 상 다 먹고나서 배달 용기에 묻어있는 기름을 닦기 정말 힘들뿐만이 아니라 알맞은 방법으로 
                        버리지 않는다면 심각한 생태계 오염이 일어날 수 있습니다.😢</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱에 묻은 음식물이 있다면, 이는 플라스틱 재활용을 어렵게 만듭니다. 
                        플라스틱 재활용 공정에서는 깨끗한 상태의 플라스틱을 선호하며, 음식물이 묻어있으면 재활용이 어려워집니다.</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱은 자연 분해 과정이 매우 느리기 때문에, 플라스틱에 묻은 음식물이 환경에 버려지면 지속적으로 쓰레기로 남아있게 됩니다</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱에 묻은 음식물이 환경에 버려지면 지속적으로 쓰레기로 남아있게 됩니다. 이는 비생분해성 폐기물의 양을 증가시키고, 쓰레기 처리에 어려움을 초래합니다.</p>
                </div>
                <div class="paragraph">
                    <p>베이킹소다 또는 과탄산소다 1스푼과 주방 세제 1방울과 함께 뜨거운 물을 넣고 10분동안 방치한 후, 물로 세척하여 플라스틱에 재활용해야 합니다</p>
                </div>
            </div>
            <div class="icon5-container">
                <div class="icon-container">
                    <img id="image1" src="img/icon5.png" class="icon5" onclick="changeImage('image1', 'image2')">
                    <img id="image2" src="img/icon7.png" class="icon5" onclick="changeImage('image2', 'image1')" style="display: none;">
                    <span class="user-count-text">user1214님 외 1,201명이 도움되었습니다!</span>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Second main section -->
    <main class="main">
        <div class="board-container">
            <div class="content">
                <p class="header-text">마라탕 배달 용기 알맞게 버리기!</p>
                <div class="header-line"></div>
                <div class="paragraph">
                    <p>향신료를 넣어 알싸한 매운 맛이 인기인 마라탕이 요즘 길거리에서 많이 볼 수 있습니다.
                        하지만 고추기름, 마라기름과 같이 기름이 많이 들어가는 마라탕 특성 상 다 먹고나서 배달 용기에 묻어있는 기름을 닦기 정말 힘들뿐만이 아니라 알맞은 방법으로 
                        버리지 않는다면 심각한 생태계 오염이 일어날 수 있습니다.😢</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱에 묻은 음식물이 있다면, 이는 플라스틱 재활용을 어렵게 만듭니다. 
                        플라스틱 재활용 공정에서는 깨끗한 상태의 플라스틱을 선호하며, 음식물이 묻어있으면 재활용이 어려워집니다.</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱은 자연 분해 과정이 매우 느리기 때문에, 플라스틱에 묻은 음식물이 환경에 버려지면 지속적으로 쓰레기로 남아있게 됩니다</p>
                </div>
                <div class="paragraph">
                    <p>플라스틱에 묻은 음식물이 환경에 버려지면 지속적으로 쓰레기로 남아있게 됩니다. 이는 비생분해성 폐기물의 양을 증가시키고, 쓰레기 처리에 어려움을 초래합니다.</p>
                </div>
                <div class="paragraph">
                    <p>베이킹소다 또는 과탄산소다 1스푼과 주방 세제 1방울과 함께 뜨거운 물을 넣고 10분동안 방치한 후, 물로 세척하여 플라스틱에 재활용해야 합니다</p>
                </div>
            </div>
            <div class="icon5-container">
                <div class="icon-container">
                    <img id="image3" src="img/icon5.png" class="icon5" onclick="changeImage('image3', 'image4')">
                    <img id="image4" src="img/icon7.png" class="icon5" onclick="changeImage('image4', 'image3')" style="display: none;">
                    <span class="user-count-text">user1214님 외 1,201명이 도움되었습니다!</span>
                </div>
            </div>
        </div>
    </main>
    <div id="searchResult"></div>
</body>
</html>
