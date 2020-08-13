<?php

session_start();
require 'dbConnect.php';
$user = $_SESSION["userName"];
$products = mysqli_query($link, "select r.productID, imgname, num, p.Name, price from record r
inner join member  on memberID = mID
inner join products p on r.productID = ID
inner join image i on i.productID = ID
where memberID = '$user' and imgname LIKE '%-1' and done IS NULL");
$total = 0 ;
$sum = 0 ;
$q = $_POST["quantity"];
$i = 0;


if(isset($_GET["del"])) {
    $del = $_GET["del"];
    $record = "DELETE FROM `record` WHERE memberID = '$user' and productID = '$del'";
    mysqli_query($link, $record);
    header("Location: shoppingCart.php");
    exit();
}

if(isset($_POST["buy"]) ) {
    $record = "update record set num = '$q', done = 'yes' where memberID = '$user'";
    mysqli_query($link, $record);
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'HeadModel.php'; ?>
    <link rel="stylesheet" href="CSS/shoppingCart.css">

</head>

<body>
    <!-- navbar -->
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-blush justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h4>購物車</h4>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php">回到首頁</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- content -->
    <div class="container bg-cream p-2" style="min-height: 92vh;">
        <!-- 購買清單 -->
        <form method="post" action="">
        <div class="all">
        <?php while($row = mysqli_fetch_assoc($products)) : ?>
            <?php $a=array(
                "pID"=>$row['productID'],
                "price"=>$row['price'],
                "num"=>$row['num'],
                "total"=>$row['price']*$row['num']); ?>
            <?php $_SESSION["product"] = $a; ?>
            <?php $total += $_SESSION["product"]["total"] ?>
            <?php $sum += $_SESSION["product"]["num"] ?>

                <input style="visibility: hidden;" name="pid" value="<?php $row['productID'] ?>"></input>
            <div class="shoppingBox mx-auto my-2 row">
                <div class="col product ml-3"><img src="img/web/<?= $row['imgname'] ?>.JPG" class="imgFluid" alt=""></div>
                <div class="col-4 product mx-2">
                    <span><?= $row['Name'] ?></span>
                    <br>
                    <p style="font-size: 0.8rem;">選項:</p>
                    <p>NT$<?= $row['price'] ?></p>
                </div>
                <div class="col-3 product mr-2">
                    <div class="input-group pCenter">
                        <button type="button" name="dec" class="btn btn-petal" onclick="decQuantity(<?= $i ?>,<?= $row['price'] ?>)">&lt;</button>
                        <input style="width: 50px;" class="num" name="quantity" type="text" value="<?= $row['num'] ?>"
                            oninput="if(value>20)value=20;if(value<1)value=1;"readonly>
                        <button type="button" name="add" class="btn btn-petal" onclick="incQuantity(<?= $i ?>,<?= $row['price'] ?>)">&gt;</button>
                    </div>
                </div>

                <div class="col-2 product mr-3">
                    <a href="shoppingCart.php?del=<?= $row['productID'] ?>" class="pCenter">刪除</a>

                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>

            <!-- 小計 -->
            <p class="text-right mr-5"><span id="sum"><?= $sum ?></span>件商品，共計<span id="total"><?= $total ?></span>元</p>
        </div>

        <!-- 結帳button -->
        <div style="text-align: right;">
            <button type="submit" name="buy" class="submit btn btn-petal">結帳</button></a>
        </div>
        </form>
    </div>
</body>

</html>