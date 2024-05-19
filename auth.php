
<!-- cookie관련 건들지 않아야함!!! -->

<?php
$key = hex2bin("efa7c78de133aba59b05600ad6b59ee6");
$iv = hex2bin("066fb77461b9e401f7f1461898e8cc91");

function encrypt($plain)
{
    global $key, $iv;
    $encrypted = openssl_encrypt($plain, "AES-256-CBC", $key, true, $iv);
    return base64_encode($encrypted);
}

function decrypt($encStr)
{
    global $key, $iv;
    $dec = openssl_decrypt(base64_decode($encStr), "AES-256-CBC", $key, true, $iv);
    return $dec;
}

function getLoginId()
{
    $cookie_value = $_COOKIE["id"] ?? '';
    if ($cookie_value === '') {
        return '';
    }
    $plain = decrypt($cookie_value);
    if ($plain === false) {
        return '';
    }
    return $plain;
}

$loginId = getLoginId(); //로그인 아이디
$authenticated = $loginId !== ''; // 로그인 여부

?>
