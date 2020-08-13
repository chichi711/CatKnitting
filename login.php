<?php

// 連線資料庫
session_start();
require("dbConnect.php");


// 判斷是否登出 刪除SESSION
if ($_GET["logout"] == 1) {
  unset($_SESSION["userName"]);
  header("Location: index.php");
}


mysqli_close($link);
