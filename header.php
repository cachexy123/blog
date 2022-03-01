<?php
include_once 'init.php';
$result = $conn->query("select * from config");
while($row = $result->fetch_assoc()){
    $web[$row['name']] = $row['value'];
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $web['website_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $web['website_desc'] ?>" />
    <meta name="keywords" content="<?php echo $web['website_keywords'] ?>" />
    <meta name="author" content="我的" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.min.css" />
</head>
<body>
<header class="lyear-header text-center" style="background-image:url(images/left-bg.jpg);">
    <div class="lyear-header-container">
        <div class="lyear-mask"></div>
        <h1 class="lyear-blogger pt-lg-4 mb-0"><a href="index.php"><?php echo $web['website_title'] ?></a></h1>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <div class="lyear-hamburger">
                    <div class="hamburger-inner"></div>
                </div>
            </a>

            <div id="navigation" class="collapse navbar-collapse flex-column">
                <div class="profile-section pt-3 pt-lg-0">
                    <img class="profile-image mb-3 rounded-circle mx-auto" src="images/logo.jpg" width="120" height="120" alt="笔下光年" >
                    <div class="lyear-sentence mb-3">必须记住我们学习的时间是有限的。时间有限，不只由于人生短促，更由于人事纷繁。我们就应力求把我们所有的时间用去做最有益的事情。</div>
                    <hr>
                </div>

                <ul class="navbar-nav flex-column text-center">
                    <li class="nav-item active">
                        <?php
                        $result = $conn->query('select * from cate');
                        while($row = $result->fetch_assoc()){


                        ?>
                        <a class="nav-link" href="list.php?id=<?php echo $row['id'];?>"><?php echo $row['class_name'];?></a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">关于我</a>
                    </li>
                </ul>

                <div class="my-2 my-md-3">
                    <form class="lyear-search-form form-inline justify-content-center pt-3">
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1" placeholder="搜索关键词" />
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>