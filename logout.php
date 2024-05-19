<?php 
setcookie("id", "", time() -3600, "/", ""); 
?>

<script>
    alert("로그아웃 완료");
    location.replace('index.php');
</script>