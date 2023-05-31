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

    <?php
    $searchdate = $_GET['searchdate'];
    if (empty($searchdate)) {
        $searchdate = date("Y-m-d");
    }
    ?>

    <div>
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">首頁</li>
                </ol>
            </nav>
        </div>
        <div class="container text-left">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <form action="tables.php" class="row" method="get">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Date: &nbsp;</label>
                                <input type="date" name="searchdate" value="<?php echo $searchdate; ?>">&nbsp;&nbsp;
                                <input type="submit" value="查詢">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="text-center" style="font-size: 10px;">
                    空 &nbsp;: &nbsp;該時段無人預約 &nbsp;&nbsp;/ &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                    </svg>&nbsp;:&nbsp;該時段已被刪除不可預約
                </div>
            </div>
        </div>
    </div>

    <?php
    $link = mysqli_connect('localhost', 'root', '12345678', 'piano');

    if (empty($searchdate)) {
        $searchdate = date("Y-m-d");
    }

    $weekarray = array("日", "一", "二", "三", "四", "五", "六");
    $week = $weekarray[date("w", strtotime($searchdate))];
    switch ($week) {
        case "日":
            $dec = 0;
            $add = 6;
            break;
        case "一":
            $dec = -1;
            $add = 5;
            break;
        case "二":
            $dec = -2;
            $add = 4;
            break;
        case "三":
            $dec = -3;
            $add = 3;
            break;
        case "四":
            $dec = -4;
            $add = 2;
            break;
        case "五":
            $dec = -5;
            $add = 1;
            break;
        case "六":
            $dec = -6;
            $add = 0;
            break;
    }

    $sql  = "select * from 預約 where date between date_add(' " . $searchdate . " ', interval " . $dec . " day) and date_add(' " . $searchdate . " ', interval " . $add . " day)";
    $result = mysqli_query($link, $sql);

    $weeknum = array();
    if ($dec == 0) {
        for ($i = 0; $i <= $add; $i++) {
            $weeknum[$i] = date('Y-m-d', strtotime($searchdate . ' + ' . (string)($i) . 'days'));
        }
    } elseif ($add == 0) {
        for ($i = 0; $i >= $dec; $i--) {
            $weeknum[abs($i)] = date('Y-m-d', strtotime($searchdate . (string)($i) . 'days'));
        }
        $weeknum = array_reverse($weeknum);
    } else {
        for ($j = 0; $j >= $dec; $j--) {
            $weeknum[abs($j)] = date('Y-m-d', strtotime($searchdate . (string)($j) . 'days'));
        }
        $weeknum = array_reverse($weeknum);
        for ($i = 0; $i < $add; $i++) {
            $weeknum[abs($j) + $i] = date('Y-m-d', strtotime($searchdate . ' + ' . (string)($i + 1) . 'days'));
        }
    }

    $table = array(array(), array(), array(), array(), array(), array(), array(), array());
    for ($i = 0; $i < 8; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $table[$i][$j] = "空";
        }
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $name_array = array();
        $name_array[$ID] = $row['name'];
        $phone_array = array();
        $phone_array[$ID] = $row['phone'];
        $emill_array = array();
        $email_array[$ID] = $row['email'];
        $date_array = array();
        $date_array[$ID] = date("w", strtotime($row['date']));
        $period_array = array();
        $period_array[$ID] = $row['period'];

        $table[$period_array[$ID]][$date_array[$ID]] = $name_array[$ID];
    }


    ?>

    <div class="card">
        <div class="table-responsive">
            <table class="table  align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 "></th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 "><?php echo $weeknum[0]; ?>&nbsp;&nbsp;(日)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[1]; ?>&nbsp;&nbsp;(一)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[2]; ?>&nbsp;&nbsp;(二)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[3]; ?>&nbsp;&nbsp;(三)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[4]; ?>&nbsp;&nbsp;(四)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[5]; ?>&nbsp;&nbsp;(五)</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"><?php echo $weeknum[6]; ?>&nbsp;&nbsp;(六)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">09:00 ~ 10:00</h6>
                                </div>
                            </div>
                        </td>

                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[0][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[0][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">10:00 ~ 11:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[1][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[1][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">11:00 ~ 12:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[2][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[2][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">13:00 ~ 14:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[3][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[3][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">14:00 ~ 15:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[4][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[4][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">15:00 ~ 16:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[5][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[5][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">16:00 ~ 17:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[6][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[6][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">17:00 ~ 18:00</h6>
                                </div>
                            </div>
                        </td>
                        <?php
                        for ($b = 0; $b < 7; $b++) {
                            if ($table[7][$b] != "空") {
                                $dark = "style='background-color:#E5E7E8'";
                            } else {
                                $dark = " ";
                            }

                            echo
                            "<td class='align-middle text-center' $dark>
                                <div class='d-flex align-items-center'>
                                    <span class='me-2 text-sm'>" . $table[7][$b] . "</span>
                                </div>
                            </td>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>