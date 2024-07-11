<?php
session_start();
$uid = filter_var($_SESSION['uid'], FILTER_SANITIZE_NUMBER_INT);

if (isset($_GET['acc'])) {
    $acc = filter_var($_GET['acc'], FILTER_SANITIZE_NUMBER_INT);
} else {
    $acc = 0;
}


include_once('../backend/connection.php');

$query = "SELECT bank_account, linked_date FROM user_bankAccount WHERE uid = '$uid'";
$result = mysqli_query($conn, $query);

$bankAccounts = [];
$amounts = [];
$totalBalance = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        // transactions
        $query2 = "SELECT amount FROM transaction WHERE from_acc = " . $row['bank_account'] . " ORDER BY t_date LIMIT 4";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                array_push($amounts, intval($row2['amount']));
            }
        }
        array_push($bankAccounts, $row['bank_account']);

        // total balance
        $query3 = "SELECT balance FROM bankAccount WHERE acc_no = " . $row['bank_account'];
        $result3 = mysqli_query($conn, $query3);
        if (mysqli_num_rows($result3) > 0) {
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $totalBalance += intval($row3['balance']);
            }
        }


    }
}

$query4 = "SELECT *
FROM user_bankAccount
INNER JOIN bankAccount ON user_bankAccount.uid = " . $uid . " AND user_bankAccount.bank_account = bankAccount.acc_no";
$result4 = mysqli_query($conn, $query4);

// check whether particular bank account belongs to the user
if (isset($_GET['acc'])) {
    if (!in_array($acc, $bankAccounts)) {
        header("Location: ./");
        exit();
    }
}

$query5 = "SELECT * FROM transaction WHERE from_acc = " . $acc . " OR to_acc = " . $acc . " ORDER BY t_date";
$result5 = mysqli_query($conn, $query5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Dashboard | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Dashboard | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Dashboard | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Dashboard | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- scripts -->
    <script src="../js/script.js"></script>

</head>
<body class="dashboard-body">

<?php include './layouts/navbar.php' ?>
<?php include './layouts/dashboard_secondary_nav.php' ?>


<div id="detail-panel" style="display: none;" class="view-panel-container container-mid">
    <div class="view-panel">
        <p style="font-weight: bold;">Bank Statement - <span id="acc_no_span"></span></p>
        <div style="overflow: auto;">
            <table style="text-align: left; border: 1px solid #ebe0ff; padding: 20px 40px; border-radius: 20px;">

                <?php
                if (mysqli_num_rows($result5) > 0) {
                    echo '<tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>From Account</th>
                    <th>To Account</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Bank (If outer)</th>
                    <th>Beneficiary Name</th>
                </tr>';

                    while ($row = mysqli_fetch_assoc($result5)) {
                        echo
                            '<tr>
                                <td>' . $row['tid'] . '</td>
                                <td>' . $row['t_date'] . '</td>
                                <td>' . $row['from_acc'] . '</td>
                                <td>' . $row['to_acc'] . '</td>
                                <td>' . $row['amount'] . '</td>
                                <td>' . $row['type'] . '</td>
                                <td>' . $row['bank'] . '</td>
                                <td>' . $row['beni_name'] . '</td>
                            </tr>';
                    }

                } else {
                    echo "0 results";
                }

                
                ?>
            </table>
        </div>

        <button onclick="window.location.href = './'" class="dark-bg-button"
                style="margin-top: 30px; margin-bottom: 30px; width: 160px;">
            Close
        </button>
    </div>
</div>


<div class="dashboard-board">

    <div class="container breadcrumb">
        <a href="./">Dashboard</a>
    </div>

    <div class="dash-container container-mid grid-2">
        <div class="dash-card container-mid" style="background-color: #d1b5ff;">
            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <p style="margin-top: 0; font-weight: bold;">Total available funds</p>
                    <h3 style="margin-bottom: 0; color: #673ab7;">LKR</h3>
                    <h1 style="margin-top: 0; font-size: 48px; color: #673ab7"><?php echo $totalBalance ?>.00</h1>
                    <p style="text-align: left; font-size: 14px; color: #673ab7; margin-top: 0; margin-bottom: 0;"
                    >Date: <span id="dateNow"></span><br>Time: <span id="timeNow"></span></p>
                </div>
            </div>
        </div>
        <div class="dash-card container-mid">
            <div class="">
                <p style="color: #464646; font-weight: bold;">Last Outgoing Transactions</p>
                <div class="login-main-side container-mid login-grid-1"
                     style="display: inline-block; padding: 20px 0 0;">
                    <div class="chart-items" style="display: inline-block">
                        <div id="item1"></div>
                        <div id="item2"></div>
                        <div id="item3"></div>
                        <div id="item4"></div>
                    </div>
                    <div class="chart-x-labels">
                        <div id="item1-x-label" style="" class="item-x-label"></div>
                        <div id="item2-x-label" class="item-x-label"></div>
                        <div id="item3-x-label" class="item-x-label"></div>
                        <div id="item4-x-label" class="item-x-label"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dash-container container-mid grid-2">
        <div class="dash-card container-mid">
            <div class="">
                <div class="login-main-side container-mid login-grid-1" style="padding: 0;">
                    <p style="font-weight: bold;">Bank accounts</p>
                    <table>
                        <?php
                        if (mysqli_num_rows($result4) > 0) {

                            echo '<tr>
                            <th>Account</th>
                            <th>Balance</th>
                            <th>Actions</th>
                        </tr>';

                            while ($row = mysqli_fetch_assoc($result4)) {
                                echo
                                    '<tr>
                                    <td>' . $row['acc_no'] . '</td>
                                    <td>' . $row['balance'] . '.00</td>
                                    <td>
                                    <button onclick=\'viewHistory(' . $row['acc_no'] . ')\' class="table-btn">View</button></td>
                                </tr>';
                            }
                        } else {
                            echo "0 results";
                        }

                        
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-card container-mid">
                <div class="login-main-side container-mid login-grid-1" style="padding: 0;">
                    <p style="font-weight: bold;">Exchange rates</p>
                    <table>
                        <tr>
                            <th>Currency</th>
                            <th>Rate (LKR)</th>
                        </tr>
                        <tr>
                            <td>USD</td>
                            <td>310.10</td>
                        </tr>
                        <tr>
                            <td>GBP</td>
                            <td>389.21</td>
                        </tr>
                        <tr>
                            <td>EUR</td>
                            <td>387.95</td>
                        </tr>
                        <tr>
                            <td>AUD</td>
                            <td>208.00</td>
                        </tr>
                        <tr>
                            <td>JPY</td>
                            <td>2.30</td>
                        </tr>
                        <tr>
                            <td>SGD</td>
                            <td>230.45</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="dash-card" style="margin-top: 20px; padding: 20px 40px; width: calc(50vw - 230px);">
                <div class="support-card grid-2">
                    <div style="text-align: left; font-size: 14px;">
                        <p style="margin: 0 0 5px; font-weight: bold;">Support</p>
                        <span>Tel: </span><a class="light-bg-link" href="tel:+94711427657">+94 71 142 7657</a>
                        <br>
                        <span>Email: </span><a class="light-bg-link" href="mailto:info@ceft.online">info@ceft.online</a>
                    </div>
                    <div class="container-mid">
                        <img alt="Ceft Logo" src="../images/logos/ceft_logo_black.png" style="width: 80px">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>
    function viewHistory(acc) {
        window.location.href = "./index.php?acc=" + acc;
    }

    if (window.location.href.includes("acc")) {
        const acc = new URLSearchParams(new URL(window.location.href).search).get('acc');
        document.getElementById("detail-panel").style.display = "flex";
        document.getElementById("acc_no_span").innerText = acc;
    }
</script>

<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();

    console.log(<?php
        echo $amounts[0] . ", " . $amounts[1] . ", " . $amounts[2] . ", " . $amounts[3];
        ?>)

    // chart
    var balanceHistory = {
        <?php
        for ($i = 0; $i < count($amounts); $i++) {
            echo '"' . ($i + 1) . '": ' . $amounts[$i] . ', ';
        }
        ?>
    }

    var balanceArray = [];

    // Iterate over the properties of the JSON object
    for (let key in balanceHistory) {
        if (balanceHistory.hasOwnProperty(key)) {
            balanceArray.push(balanceHistory[key]);
        }
    }

    var min = balanceArray[0];
    var max = balanceArray[0];

    for (let i in balanceArray) {
        if (min > balanceArray[i]) {
            min = balanceArray[i];
        }
        if (max < balanceArray[i]) {
            max = balanceArray[i];
        }
    }

    for (let k = 1; k <= 4; k++) {
        document.getElementById("item" + k).style.height = (balanceHistory[k] - (min - 2000)) / 100 + "px";
        document.getElementById("item" + k + "-x-label").innerHTML = balanceArray[k - 1];
    }

    document.getElementById("dateNow").innerText = new Date().toDateString();
    document.getElementById("timeNow").innerText = new Date().toLocaleTimeString();

</script>

</body>
</html>