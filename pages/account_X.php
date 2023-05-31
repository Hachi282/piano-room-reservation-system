<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>Document</title>
</head>

<body>
    <?php
    $action = $_POST['action'];
    $d_action = $_GET['action'];
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $AID = $_POST['AID'];
    
   
    $link = mysqli_connect('localhost', 'root', '12345678', 'piano');


    if ($action == "insert") {
        $sql = "select * from account where account = '$account'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            $sql  = "insert into account (AID, name, account, password, level) values (null, '$name', '$account', '$password', '$level')";
            if (mysqli_query($link, $sql)) {
                header("Location:message.php?message=新增完成");
            } else {
                header("Location:message.php?message=新增失敗");
            }
        } else {
            header("Location:message.php?message=此帳號已被使用");
        }
   
    } else if ($action == "update") {
        $sql = "update account set name='$name', password='$password', level='$level' where AID='$AID'";
        if (mysqli_query($link, $sql)) {
            header("Location:message.php?message=修改成功");
        } else {
            header("Location:message.php?message=修改失敗");
        }
    }

    if ($d_action == "delete") {
        $account = $_GET['account'];
        $password = $_GET['password'];

        $sql  = "delete from account where account='$account' and password='$password'";
        if (mysqli_query($link, $sql)) {
            header("Location:message.php?message=刪除成功");
        } else {
            header("Location:message.php?message=刪除失敗");
        }
    }

    ?>
</body>

</html>