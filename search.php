<?php
session_start();
require 'dbConnect.php';

$user = $_SESSION["userName"];

if(isset($_GET["q"])) {
    $search = $_GET["q"];
    $record = "select * from products p JOIN image i on i.productID = p.ID
    where Name LIKE '%$search%' and imgname LIKE '%-1'";
    $result = mysqli_query($link, $record);
    $row = mysqli_fetch_assoc($result);
}

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