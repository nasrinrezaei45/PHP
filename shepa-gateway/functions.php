<?php

/**
 * Created by PhpStorm.
 * User: Shepa
 * Date: 6/19/2019
 * Time: 4:25 PM
 */
session_start();

function token($api, $amount, $callback, $mobile, $email, $description)
{
    return curl_post('https://sandbox.shepa.com/api/v1/token', [
        'api' => $api,
        'amount' => $amount,
        'callback' => $callback,
        'mobile' => $mobile,
        'email' => $email,
        'description' => $description,

    ]);
}

function verify($api, $token, $amount)
{
    return curl_post('https://sandbox.shepa.com/api/v1/verify', [
        'api' => $api,
        'token' => $token,
        'amount' => $amount,
    ]);
}

function curl_post($url, $params)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}