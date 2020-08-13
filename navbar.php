<?php
session_start();
require 'login.php';
require 'dbConnect.php';

if (isset($_GET["logout"])){
    $_SESSION["userName"] = $_POST["Guest"];
    header("location: index.php");
    exit();
}

$id = $_SESSION["userName"];
$sqlimg = "select img from member where mID = '$id'";
$img = mysqli_query($link, $sqlimg);
$memberimg = mysqli_fetch_assoc($img);



?>

<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-blush">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="brand" href="index.php">
            <img id="logo" src="img/logo.png" alt="">
        </a>
        <!-- 分頁連結 -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="category.php"><b>超值組合</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php"><b>毛線編織</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php"><b>裁縫手做</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php"><b>所有商品</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php"><b>常見問題</b></a>
                </li>
            </ul>

        </div>
        <!-- 右邊按鈕(搜尋、會員、購物車) -->
        <ul class="navbar-nav flex-row ml-md-auto">
            <li class="nav-item">
                <!-- class="input-group" -->
                <div id="searchdad" style="display: flex;">
                    <input class="search" onchange="search(this.value)" type="text" placeholder="找商品">
                    <a class="nav-link search-icon" href=""><img class="icon" src="img/2x/search_18dp.png" alt=""></a>
                </div>
            </li>
            <li class="nav-item">
            <?php if (isset($_SESSION["userName"]) && ($_SESSION["userName"] != "")) : ?>
                <a class="nav-link" href="shoppingCart.php"><img class="icon" src="img/2x/shopping_cart_18dp.png" alt=""></a>
            <?php else : ?>
                <a class="nav-link" href="member.php"><img class="icon" src="img/2x/shopping_cart_18dp.png" alt=""></a>
            <?php endif; ?>
            </li>
            <?php if (isset($_SESSION["userName"]) && ($_SESSION["userName"] != "")) : ?>
            <!-- MemberDropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <img style="border-radius: 50%;" name="userName" class="icon" src="img/upload/<?= $memberimg['img'] ?>" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="personalFiles.php">個人檔案</a>
                    <a class="dropdown-item" href="record.php">訂單紀錄</a>
                    <a class="dropdown-item" href="login.php?logout=1" href="#">登出</a>
                </div>
            </li>

            <?php else : ?>
            <li class="nav-item d-inline-block">
                <a class="nav-link mx-2" name="userName" href="member.php"><img class="icon" src="img/2x/person_18dp.png" alt=""></a>
             </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<script>$('.dropdown-toggle').dropdown();</script>