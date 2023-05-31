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
    $name = $_POST['name'];
    $password = $_POST['password'];
    $AID = $_POST['AID'];


    $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
    
    if ($action == "update") {
        $sql = "update account set name='$name', password='$password' where AID='$AID'";
        if (mysqli_query($link, $sql)) {
            header("Location:message.php?message=修改成功");
        } else {
            header("Location:message.php?message=修改失敗");
        }
    }

    ?>
</body>

</html>