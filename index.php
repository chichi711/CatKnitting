<?php

require 'dbConnect.php';

$result = mysqli_query($link, "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
where imgname LIKE '%-1'");
$return = mysqli_query($link, "select ID, imgname, Name, price, content from products p JOIN image i on i.productID = p.ID
where imgname LIKE '%-1' order by ID DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'HeadModel.php'; ?>
</head>

<body>
    <!-- navbar -->
    <?php require 'navbar.php'; ?>
    <!-- content -->
    <div class="container bg-cream p-0">
        <!-- carousel -->
        <div class="carousel slide mb-4" data-ride="carousel" id="carousel">
            <a href="product.php?pid=06">
                <div class="carousel-inner">
                    <picture class="carousel-item active">
                        <source media="(min-width: 768px)" srcset="img/web/test3.png">
                        <img src="https://dummyimage.com/320x500/c7a2c7/fff" alt="">
                    </picture>
                </div>
            <a>
        </div>

        <!-- 主打商品 -->
        <img class="img-fluid" src="img/web/主打商品.png" alt="">
        <div class="row py-4 mx-1">
            <?php for($i = 1; $i < 5; $i++ ) : ?>
                <?php $row = mysqli_fetch_assoc($result); ?>
                <div class="col-lg-3 col-6">
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
            <?php endfor; ?>
        </div>

        <!-- 熱門商品 -->
        <img class="img-fluid" src="img/web/熱門商品.png" alt="">
        <div class="row py-4 mx-1">
            <?php for($i = 5; $i < 9; $i++ ) : ?>
                <?php $row2 = mysqli_fetch_assoc($return) ?>
            <div class="col-lg-3 col-6">
                <a href="product.php?pid=<?= $row2['ID'] ?>">
                    <div class="card card-shadow">
                        <img src="img/web/<?= $row2['imgname'] ?>.JPG" class="imgFluid" alt="">
                        <div class="card-body">
                            <?= $row2['Name'] ?>
                        </div>
                        <div class="card-subtitle">
                            <div class="product-subtitle">
                                <p><?= $row2['Name'] ?></p>
                                <p class="explanation"><?= $row2['content'] ?></p>
                            </div>
                        </div>
                        <div class="price">
                            <span>NT$<?= $row2['price'] ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endfor; ?>
        </div>


    </div>

</body>
<footer class="cat-footer">
    <p>Copyright &copy; 2020 All Rights Reserved.</p>
</footer>

</html>