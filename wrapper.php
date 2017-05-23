<?php
$page = $_GET['page'];
$length = $_GET['length'];

$url = "http://52.204.0.138/api/v1/pro/admin/getUsers?page=" . $page . "&length=" . $length;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$content = curl_exec($ch);
echo $content;
?>