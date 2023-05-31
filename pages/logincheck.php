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
    session_start();
    $account = $_POST['account'];
    $password = $_POST['password'];

    $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
    $sql  = "select distinct * from account where account ='$account' and password = '$password'";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['AID'] = $row['AID'];
        header("Location:message2.php?message=登入成功");
    } else {
        header("Location:message2.php?message=帳號密碼錯誤");
    }
    ?>
</body>

</html>