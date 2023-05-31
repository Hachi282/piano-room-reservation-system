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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



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
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">首頁</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <h4 class="text-center" style="color:#787878">被設置為不可預約之時段</h4>
            <table class="table table-striped-columns align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">日期</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">時段</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ">編輯</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
                    $sql = "select * from 預約 where name = '" . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg>' . "' order by date";

                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        switch ($row['period']) {
                            case 0:
                                $p = "09:00 ~ 10:00";
                                break;
                            case 1:
                                $p = "10:00 ~ 11:00";
                                break;
                            case 2:
                                $p = "11:00 ~ 12:00";
                                break;
                            case 3:
                                $p = "13:00 ~ 14:00";
                                break;
                            case 4:
                                $p = "14:00 ~ 15:00";
                                break;
                            case 5:
                                $p = "15:00 ~ 16:00";
                                break;
                            case 6:
                                $p = "16:00 ~ 17:00";
                                break;
                            case 7:
                                $p = "17:00 ~ 18:00";
                                break;
                        }

                        echo
                        "<tr>
                            <td>
                                <div class='d-flex px-2'>
                                    <div class='d-flex align-items-left'>
                                        <span class='me-2 text-xs'>" . $row['date'] . "</span>
                                    </div>
                                </div>
                            </td>
                            <td class='align-middle text-left'>
                                <div class='d-flex align-items-left'>
                                    <span class='me-2 text-xs'>" . $p . "</span>
                                </div>
                            </td>
                            <td class='align-middle text-center'>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm' ><a href='時段d2.php?date=".$row['date'] ."&period=".$row['period']."' style='color:red'>刪除</a></span>
                                </div>
                            </td>
                        </tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>