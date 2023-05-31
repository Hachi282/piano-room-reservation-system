<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/piano.png">
    <link rel="icon" type="image/png" href="../assets/img/piano.png">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/calendar-14/A.fonts,,_icomoon,,_style.css+css,,_rome.css+css,,_bootstrap.min.css+css,,_style.css,Mcc.F9TR9DxB5A.css.pagespeed.cf.6zC15jkfpn.css" />




    <title>琴房借用系統</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

    <style>
        .mid {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type=text] {
            border: none;
            border-bottom: 2px solid gray;
        }

        input[type=text1] {
            border: none;
            /*border-bottom: 2px solid gray;*/
        }

        input[type=email] {
            border: none;
            border-bottom: 2px solid gray;
        }

        select {
            border: none;
            border-bottom: 2px solid gray;
        }

        input[type=date] {
            border: none;
            border-bottom: 2px solid gray;
        }
    </style>

</head>

<body>
    <div>
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">預約資料</li>
                </ol>
            </nav>
        </div>

        <?php
        $ID = $_GET['ID'];

        $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
        $sql = "select * from 預約 where ID='$ID'";
        $result = mysqli_query($link, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
        }
        ?>

        <div class="card mid" style="padding:20px">
            <form action="calloff_d2.php?action=update&ID=<?php echo $ID; ?>" method="post">
                姓名:&nbsp;&nbsp; <input type="text" name="name" placeholder="輸入姓名" value="<?php echo $name; ?>" required="required"> <br><br>
                電話:&nbsp; &nbsp; <input type="text" name="phone" placeholder="輸入電話" value="<?php echo $phone; ?>" required="required"> <br><br>
                email: &nbsp; &nbsp; <input type="text" name="email" placeholder="輸入email" value="<?php echo $email; ?>" required="required"><br><br>

                <input type="submit" style="width:100%;background:cornflowerblue" name="submit" value="修改">
            </form>
        </div>

    </div>
</body>

</html>