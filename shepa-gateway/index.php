<?php
include_once("functions.php");
$api = 'sandbox';
$amount = 10000;
$mobile = "09133239584";
$email = "nasrinrezaei45@gmail.com";
$description = "خرید کالا";
$callback = 'http://loclhost/verify.php';

$result = token($api, $amount, $callback, $mobile, $email, $description);
$result = json_decode($result);

if (!empty($result->success)) {
    $_SESSION['token'] = $result->result->token;
    header("Location:" . $result->result->url);
} else {
    echo "<h1>تراکنش با خطا مواجه شد</h1>";
}