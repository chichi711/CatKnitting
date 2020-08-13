<?php

session_start();
require ("dbConnect.php");

$id = $_SESSION["userName"];

if (isset ( $_POST["upload"] )) {

    require ("dbConnect.php");
    $objFile = $_FILES["file"];

    $file_type = $_FILES['file']['type']; //returns the mimetype
    $allowed = array("image/jpeg", "image/gif", "image/png", "image/HEIC");
    if(!in_array($file_type, $allowed) || $objFile["error"] != 0) {
      echo "<script>alert('上傳失敗!'); location.href='personalFiles.php'; </script>";
        return;
    }

    //判斷檔案是否已存在 http://www.webtech.tw/info.php?tid=24
	$test = move_uploaded_file ($objFile["tmp_name"], "img/upload/" . $objFile["name"] );
	if (! $test) {
		die ( "move_uploaded_file() faile" );
	}
    $id = $_SESSION["userName"];
    $imgname = $objFile["name"];
    $sql = "update member set img = '$imgname' where mID = '$id'";
    mysqli_query($link, $sql);
    header("Location: personalFiles.php");
	exit ();
}
function processFile($objFile) {

}

if (isset($_POST["okButton"])) {
    $id = $_SESSION["userName"];
    $uname = $_POST["userName"];
    $uid = $_POST["userID"];
    $upwd = $_POST["userPwd"];
    $email = $_POST["eMail"];

    $sql = <<<sqlCommand
    update member set
    Name = '$uname',
    userId = '$uid',
    userPwd = '$upwd',
    Email = '$email'
    where mID = '$id'
    sqlCommand;

    mysqli_query($link, $sql);
    header("Location: index.php");
    exit();
}

$sql = "select * from member where mID = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'HeadModel.php'; ?>
<link rel="stylesheet" href="CSS/personalFiles.css">
</head>

<body>
    <!-- navbar -->
    <?php require 'navbar.php'; ?>

    <!-- content -->
    <div class="container bg-cream p-0" style="min-height: 92vh;">
        <h4 class="p-4">個人資料</h4>

        <div class="row">
            <div class="col-4">
                <div class="mx-4 frame"><img class="img-fluid" src="img\upload\<?= $row['img'] ?>" alt="">
            </div>
            <form method="post" enctype="multipart/form-data" action="">
                <label class="btn btn-petal my-3 m-4">
                    <input class="my-3 m-4" onchange="document.getElementById('submit').click()" style="display:none;"
                     name="file" type="file" value="編輯大頭照">選擇圖片
                </label>
                <input class="my-3 btn btn-petal m-4" id="submit" name="upload" style="display:none;" type="submit" value="上傳圖片">
            </form>
            </div>

            <div class="col-8">
                <form method="post" action="" class="form-horizontal">
                    <fieldset>
                    <!-- Form Name -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="employeeId">用戶名 :</label>
                        <div class="col-md-9">
                            <input id="userName" name="userName" value="<?= $row["Name"] ?>" type="text" placeholder=""
                                class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="firstName">帳號 :</label>
                        <div class="col-md-9">
                            <input id="userID" name="userID" value="<?= $row["userId"] ?>" type="text" placeholder=""
                                class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="lastName">密碼 :</label>
                        <div class="col-md-9">
                            <input id="userPwd" name="userPwd" value="<?= $row["userPwd"] ?>" type="password" placeholder=""
                                class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="lastName2">再次輸入密碼 :</label>
                        <div class="col-md-9">
                            <input id="rePwd" name="rePwd" type="password" placeholder=""
                                class="form-control input-md">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="eMail">email : </label>
                        <div class="col-md-9">
                            <input id="eMail" name="eMail" value="<?= $row["Email"] ?>" type="text" placeholder="" class="form-control input-md">

                        </div>
                    </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="okButton"></label>
                            <div class="col-md-8">
                                <button id="okButton" name="okButton" class="btn btn-petal">更改資料</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>