<?php
include_once 'init.php';
if (!$_SESSION['username']){
    redirect(2,'login.php','没有权限');
    exit;
}