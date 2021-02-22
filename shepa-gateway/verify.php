<?php
include_once("functions.php");

if (!empty($_GET["status"]) && $_GET["status"] == "success") {
    $api = 'sandbox';
    $token = @$_SESSION['token'];
    $amount = 10000;
    $result = json_decode(verify($api, $token, $amount));

    if (!empty($result->success)) {

        echo "<h1>تراکنش با موفقیت انجام شد</h1>";

    } else {
        print_r($result->errors);
        echo "<h1>تراکنش با خطا مواجه شد</h1>";
    }

} else {
    echo "<h1>تراکنش با خطا مواجه شد</h1>";

}