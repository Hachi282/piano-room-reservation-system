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
    <?php session_start(); ?>
    <div>
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">時段管理</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
    if ($_SESSION['level'] != "管理者") {
        echo "<div  style='text-align:center;font-size:40px'>未擁有此權限</div>";
    } else {
    ?>

        <div class="card mid" style="padding:20px">
            <form action="action.php" method="post">
                <input type=hidden name="action" value="dperiod">
                <input type=hidden name="name" value='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg>'>
                日期: &nbsp; &nbsp; <input type="date" name="date" required="required"> <br><br>
                時段: &nbsp; &nbsp;
                <select name="period">
                    <option value="0">09:00 ~ 10:00</option>
                    <option value="1">10:00 ~ 11:00</option>
                    <option value="2">11:00 ~ 12:00</option>
                    <option value="3">13:00 ~ 14:00</option>
                    <option value="4">14:00 ~ 15:00</option>
                    <option value="5">15:00 ~ 16:00</option>
                    <option value="6">16:00 ~ 17:00</option>
                    <option value="7">17:00 ~ 18:00</option>
                </select> <br><br>

                <input type="submit" style="width:100%;background:cornflowerblue" name="submit" value="將此時段設為不可預約">
            </form>
            <a href="時段d.php"><button style="margin-top:10px; background-color:#02C874">&nbsp;&nbsp;&nbsp; 修改不可預約時段 &nbsp;&nbsp;&emsp;</button></a>
        </div>
    <?php } ?>
</body>

</html>