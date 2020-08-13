<?php

session_start();
require 'dbConnect.php';
$user = $_SESSION["userName"];
$products = mysqli_query($link, "select p.ID, imgname, num, p.Name, price from record r
inner join member  on memberID = mID
inner join products p on r.productID = ID
inner join image i on i.productID = ID
where memberID = '$user' and imgname LIKE '%-1' and done = 'yes'");

if(isset($_GET["reid"])) {
    $id = $_GET["reid"];
    $record = "INSERT INTO `record` (`productID`,`memberID`) VALUES ('$id', '$user');";
    mysqli_query($link, $record);
    header("Location: shoppingCart.php");
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
    <?php require 'navbar.php'; ?>

    <!-- content -->
    <div class="container bg-cream p-2" style="min-height: 92vh;">
        <h3 class="m-4">訂單紀錄</h3>
        <!-- 購買清單 -->
        <div class="all">
        <?php while($row = mysqli_fetch_assoc($products)) : ?>
            <form method="get" action="">
            <div class="shoppingBox mx-auto my-2 row">
                <div class="col product ml-3"><img src="img/web/<?= $row['imgname'] ?>.JPG" class="imgFluid" alt=""></div>
                <div class="col-6 product mx-2">
                    <span><?= $row['Name'] ?></span>
                    <br>
                    <p style="font-size: 0.8rem;">選項:</p>
                    <p>NT$<?= $row['price'] ?></p>
                </div>
                    <div class="col-3 product mr-3">
                        <a href="record.php?reid=<?= $row['ID'] ?>" class="pCenter">加入購物車</a>
                    </div>
                </div>
            </form>
        <?php endwhile; ?>
        </div>
    </div>
</body>

</html>