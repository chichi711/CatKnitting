<?php
session_start();
require 'dbConnect.php';

$id = $_GET["pid"];
$user = $_SESSION["userName"];

$products = mysqli_query($link, "select ID, imgname, Name, price, content from products p
JOIN image i on i.productID = p.ID where imgname LIKE '%-1' LIMIT 0,4");
$result = mysqli_query($link, "select ID, imgname, Name, price, content from products p
JOIN image i on i.productID = p.ID
where ID = '$id' LIMIT 0,1");
$img = "select ID, imgname from products p JOIN image i on i.productID = p.ID where ID = '$id'";
$image = mysqli_query($link, $img);
$i = 0;
$n = 1;

if(isset($_POST["buy"])) {
    $q = $_POST['quantity'];
    $record = "INSERT INTO `record` (`productID`,`memberID`, `num`) VALUES ('$id', '$user', '$q');";
    mysqli_query($link, $record);
    header("Location: index.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'HeadModel.php'; ?>
    <link rel="stylesheet" href="CSS/product.css">
</head>

<body>
    <!-- navbar -->
    <?php require 'navbar.php'; ?>

    <div class="container bg-cream container-t p-4">
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <!-- 商品照片、價格 -->
        <div>
            <div class="row">


                <!-- 照片區 -->
                <div class="col">
                    <div>
                        <img id="canchange" src="img/web/<?= $row['imgname'] ?>.jpg" alt="">
                    </div>
                    <div class="s-img">
                    <?php while($num = mysqli_fetch_assoc($image)) : ?>
                        <a href="#" onclick="imgchange(<?= $i ?>)">
                            <div class="item"><img class="clickChange" src="img/web/<?= $num['imgname'] ?>.jpg" alt="">
                            </div>
                        </a>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                    </div>
                </div>
                <!-- 選項區 -->
                <div class="col-7 px-5">
                    <p class="h2"><?= $row['Name'] ?></p>
                    <p class="display-6">NT$<?= $row['price'] ?></p>
                    <form method="post" action="">
                    <div class="write my-5">
                        <p>商品說明</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;純手工製作，需等待10天左右</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;顏色可以自行挑選</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;若有疑慮或想要客製化不同尺寸，都歡迎討論呦</p>

                    </div>
                    <div class="write">
                        <p>數量</p>
                        <div class="input-group">
                            <button type="button" class="btn btn-petal" style="border-radius: 5px 0px 0px 5px;"
                                onclick="decQuantity(0)">&lt;</button>
                            <input class="num" name="quantity" type="number" value="1" oninput="if(value>20)value=20;if(value<1)value=1;">
                            <button type="button" class="btn btn-petal" style="border-radius: 0px 5px 5px 0px;"
                                onclick="incQuantity(0)">&gt;</button>
                        </div>
                    </div>
                    <button class="btn btn-petal" name="buy" style="position:absolute; bottom:40px;">加入購物車</button>
                    </form>
                </div>

            </div>
        </div>
        <hr>
        <!-- 商品詳情 -->
        <div>
            <h5 class="my-5">商品詳情</h5>
            <p><?= $row['content'] ?></p>
        </div>
        <?php endwhile; ?>
        <!-- 相關產品 -->
        <div>
            <h5 class="mt-5">相關產品</h5>
            <div class="row py-4 mx-1">
            <?php for($i = 1; $i < 5; $i++ ) : ?>
                <?php $row = mysqli_fetch_assoc($products) ?>
                <div class="col-lg-3 col-6">
                    <a href="product.php">
                        <div class="card card-shadow">
                            <img src="img/web/<?= $row['imgname'] ?>.JPG" class="imgFluid" alt="">
                            <div class="card-body">
                                <?= $row['Name'] ?>
                            </div>
                            <div class="card-subtitle">
                                <div class="product-subtitle">
                                    <p><?= $row['Name'] ?></p>
                                    <p class="explanation"><?= $row['content'] ?></p>
                                </div>
                            </div>
                            <div class="price">
                                <span>NT$<?= $row['price'] ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
<footer class="cat-footer">
    <p>Copyright &copy; 2020 All Rights Reserved.</p>
</footer>
</html>