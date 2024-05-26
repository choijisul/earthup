<?php require 'db.php'; ?>
<?php require 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/proggingTabel.css">
    <link rel="stylesheet" href="css/myPageNav.css">
    <title>내가 좋아요한 글</title>
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
            <i onClick="location.href='http://localhost/myPloggingJoin.php'" class="myPageChoose">참여한 플로깅</i>
            <i onClick="location.href='http://localhost/myPloggingHeart.php'" class="myPageChoose">좋아요한 플로깅</i>
            <i onClick="location.href='http://localhost/myRecofailueHeart.php'" class="myPageChoose" style="font-size: 17px;">좋아요한 글</i>
        </h1>
    </div>
    <main class="main" style="margin-top: 65px;">
        <section class="container">
            
        </section>
    </main>

</body>

</html>