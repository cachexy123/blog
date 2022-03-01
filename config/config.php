<?php
session_start();
$username = "cachexy";
$password = "522522";
$host = "127.0.0.1";
$dbname = "www_myblog1_com";
$conn = mysqli_connect($host,$username,$password,$dbname);


if($conn->connect_error){
    die("数据库连接失败").$conn->connect_error;
}
$conn->query('set names utf8');