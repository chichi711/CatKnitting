<?php

session_start();

require 'dbConnect.php';

// 判斷是否輸入帳號密碼 有的話與資料庫比對是否正確
if (isset($_POST["login"])) {
    if (isset($_POST["uID"]) && isset($_POST["pwd"])) {
        $query_RecLogin = "SELECT userId, userPwd, mID FROM member WHERE userId='{$_POST["uID"]}'";
        $result = mysqli_query($link, $query_RecLogin);
        $row = mysqli_fetch_assoc($result);
        // 密碼正確的話 賦予SESSION
        if ($_POST["pwd"] == $row["userPwd"]) {
            $_SESSION["userName"] = $row["mID"];
            header("location: index.php");
        } else {
            echo "<script>alert('帳密有誤!!!');</script>";
        }
    }
}

if(isset($_POST["cancelButton"])) {
    header("Location: member.php");
    exit();
}
if (isset($_POST["okButton"])) {

    $sql = <<<sqlCommand
    INSERT INTO `member` ( `Name`, `userId`, `userPwd`, `Email`) VALUES
    ('{$_POST["userName"]}', '{$_POST["userID"]}', '{$_POST["userPwd"]}', '{$_POST["eMail"]}')
    sqlCommand;

    mysqli_query($link, $sql);
    header("Location: member.php");
    exit();
}

mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php require 'HeadModel.php'; ?>
    <link rel="stylesheet" href="CSS/member.css">

</head>

<body style="background-color: var(--cream);">
    <!-- navbar -->
    <?php require 'navbar.php'; ?>

    <form method="post" action="">
        <div class="bg-cream container-t p-0">
            <div class="bg-img">
                <div class="loginInput">
                    <div class="form-group">
                        <label for="usr">
                            <h5>帳號:</h5>
                        </label>
                        <a class="float-right" href="#" data-toggle="modal" data-target="#myModal">註冊</a>
                        <input type="text" class="form-control" id="uID" name="uID">
                    </div>
                    <div class="form-group">
                        <label for="pwd">
                            <h5>密碼:</h5>
                        </label>
                        <a class="float-right" href="#">忘記密碼</a>
                        <input type="password" class="form-control" id="pwd" name="pwd">
                    </div>
                    <div style="text-align: center;">
                        <button class="btn btn-petal" name="login">
                            登入
                        </button>
                    </div>
                </div>
            </div>
        </div>
     </form>


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" class="form-horizontal">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>註冊會員</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="employeeId">用戶名 :</label>
                                    <div class="col-md-9">
                                        <input id="userName" name="userName" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="firstName">帳號 :</label>
                                    <div class="col-md-9">
                                        <input id="userID" name="userID" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="lastName">密碼 :</label>
                                    <div class="col-md-9">
                                        <input id="userPwd" name="userPwd" type="password" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="lastName2">再次輸入密碼 :</label>
                                    <div class="col-md-9">
                                        <input id="rePwd" name="rePwd" type="password" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="eMail">email : </label>
                                    <div class="col-md-9">
                                        <input id="eMail" name="eMail" type="text" placeholder="" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="okButton"></label>
                                    <div class="col-md-8">
                                        <button id="okButton" name="okButton" class="btn btn-success">OK</button>
                                        <button id="cancelButton" name="cancelButton" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>

</body>

</html>