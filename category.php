<?php
require 'dbConnect.php';

$popular = "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
where imgname LIKE '%-1'";
$new = "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
 where imgname LIKE '%-1' ORDER BY ID DESC";
$high = "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
where imgname LIKE '%-1' ORDER BY price DESC";
$low = "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
where imgname LIKE '%-1' ORDER BY price";
$select = $popular;

$s = "最受歡迎";

if(isset($_POST["orderby"])){
    $var = $_POST['orderby'];

    if($var == "1"){$select = $popular;$s = "最受歡迎";}
    if($var == "2"){$select = $new;$s = "最新上架"; }
    if($var == "3"){$select = $low;$s = "價格低到高"; }
    if($var == "4"){$select = $high;$s = "價格高到低"; }
    mysqli_query($link, $select);


}
$result = mysqli_query($link, $select);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'HeadModel.php'; ?>
    <link rel="stylesheet" href="CSS/category.css">
</head>

<body>
    <!-- navbar -->
    <?php require 'navbar.php'; ?>
    <!-- content -->
    <div class="container bg-cream container-t p-0">
        <!-- Hyperlink & Sort -->
        <div class="d-flex p-3">
            <!-- Hyperlink -->
            <ul class="nav m-2">
                <li>
                    <a href="index.php">主頁</a>
                </li>
                <li>&emsp;/&emsp;</li>
                <li>
                    <p>毛線編織</p>
                </li>
            </ul>
            <!-- sort -->
            <form method="post" action="">
            <div class="d-flex btn-sort">
                <p style="margin: 0px 20px;">排列方式:</p>
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-out-petal dropdown-toggle" data-toggle="dropdown">
                        <?= $s ?>
                    </button>
                    <div class="dropdown-menu">
                        <button name="orderby" class="dropdown-item" value="1">最受歡迎</button>
                        <button name="orderby" class="dropdown-item" value="2">最新上架</button>
                        <button name="orderby" class="dropdown-item" value="3">價格低到高</button>
                        <button name="orderby" class="dropdown-item" value="4">價格高到低</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- products -->
        <div class="row py-4 mx-1">
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-4 col-xl-3 col-6">
            <a href="product.php?pid=<?= $row['ID'] ?>">
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
        <?php endwhile; ?>
        </div>
    </div>
    <script>$('.dropdown-toggle').dropdown();</script>

</body>
<footer class="cat-footer">
    <p>Copyright &copy; 2020 All Rights Reserved.</p>
</footer>

</html>