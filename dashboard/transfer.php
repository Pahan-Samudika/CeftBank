<?php
session_start();
$uid = filter_var($_SESSION['uid'], FILTER_SANITIZE_NUMBER_INT);

include_once('../backend/connection.php');

$query = "SELECT bank_account, linked_date FROM user_bankAccount WHERE uid = '$uid'";
$result = mysqli_query($conn, $query);

$bankAccounts = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($bankAccounts, $row['bank_account']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Fund Transfer</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Fund Transfer | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Fund Transfer | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Fund Transfer | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Fund Transfer | Ceft Online">
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

<div class="dashboard-board" style="min-height: calc(100vh - 220px);">

    <div class="container breadcrumb">
        <a href="./">Dashboard</a>
        <span>></span>
        <a href="./transfer.php">Transfers and Payments</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Account Transfer</h1>
                    <!--<p style="margin: 0;">--</p>-->

                    <label for="spt" class="form-label"> Select Payment Type </label>
                    <select class="login-input" id="spt" name="spt" onchange="changeForm()" style="height: inherit;">
                        <option disabled selected value="">Select Payment Type</option>
                        <option value="spt4">Intrabank Payment - Transfer Funds to another Ceft account</option>
                        <option value="spt1">Domestic Payment - Transfer Funds to a National bank Account</option>
                        <option value="spt2">International Payment - Transfer Funds to an International bank Account
                        </option>
                        <option value="spt3">Bill Payment - Pay a bill</option>
                    </select>

                    <div id="ContentForm"></div>


                    <!--<button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button>-->


                </div>

            </div>

        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>
    function changeForm() {
        var selectElement = document.getElementById("spt");
        var selectedVal = selectElement.value;
        var contentContainer = document.getElementById("ContentForm");

        if (selectedVal === "spt1") {
            contentContainer.innerHTML =
                '<form action="../backend/user/transaction/domestic.php" method="post"><label for ="fa" class="form-label">From Account </label><select class="login-input" style="height: inherit;" id="fa" name="fa" ><?php for ($i = 0; $i < count($bankAccounts); $i++) {
                    echo '<option>' . $bankAccounts[$i] . '</option>';
                } ?></select><br><label class="form-label" For="sbb">Select Beneficiary Bank</label><select style="height: inherit;" class="login-input" id="sbb" name="sbb"><option disabled selected value="">Select Bank</option><option value="HNB Bank">HNB Bank</option><option value="Sampath Bank">Sampath Bank</option><option value="BOC Bank">BOC Bank</option><option value="Peoples Bank">Peoples Bank</option></select><br><input placeholder="Beneficiary Name" class="login-input" type="text" id="sbn" name="sbn"><br><input placeholder="Beneficiary Account" class="login-input" type="text" id="sba" name="sba"><br><input placeholder="Amount (LKR)" class="login-input" type="text" id="amount" name="amount"><br><input placeholder="Senders Account Description" class="login-input" type="text" id="sad" name="sad"><br><label class="form-label"  htmlFor="pop2">Purpose Of Payment</label> <select style="height: inherit;" class="login-input" id="pop2" name="pop2"> <option disabled selected value="">Select Purpose</option><option value="Business">Business</option> <option value="Personal">Personal</option><option value="Educational">Educational</option> <option value="Insurance Services">Insurance Services</option><option value="Other">Other</option></select><br><br><input required type="checkbox"><span class="form-checkbox">I agree with the terms and conditions</span><br><button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button></form>'
        } else if (selectedVal === "spt2") {
            contentContainer.innerHTML =
                '<form action="../backend/user/transaction/international.php" method="post"><label for="3fa" class="form-label">From Account</label><select style="height: inherit;" class="login-input" id="3fa" name="fa"><?php for ($i = 0; $i < count($bankAccounts); $i++) {
                    echo '<option>' . $bankAccounts[$i] . '</option>';
                } ?></select><br><input placeholder="Amount" class="login-input" type="number" id="amt" name="amt"><br><input placeholder="Beneficiary\'s Account Number" class="login-input" type="text" id="ban" name="ban"><br><input placeholder="Beneficiary\'s Address/Country" class="login-input" type="text" id="sba" name="sba"><br><input placeholder="Swift Code" class="login-input" type="text" id="sc" name="sc"><br><label class="form-label" for="pop">Purpose Of Payment</label><select style="height: inherit;" class="login-input" id ="pop" name="pop"><option disabled selected value="">Select Purpose</option><option value="Business">Business</option><option value="Personal">Personal</option><option value="Educational">Educational</option><option value="Insurance Services">Insurance Services</option><option value="Other">Other</option></select><br><br><input type="checkbox" required><span class="form-checkbox">I agree with the terms and conditions</span><br><button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button></form>'
        } else if (selectedVal === "spt3") {
            contentContainer.innerHTML =
                '<form action="../backend/user/transaction/bill_payments.php" method="post"><label for="2fa" class="form-label">From Account</label><select style="height: inherit;" class="login-input" id="2fa" name="fa"><?php for ($i = 0; $i < count($bankAccounts); $i++) {
                    echo '<option>' . $bankAccounts[$i] . '</option>';
                } ?></select><br><label class="form-label"  for="2ta">Biller</label><select style="height: inherit;" class="login-input" id="2ta" name="ta"</select><option value="Dialog">Dialog</option><option value="AIA Insurance">AIA Insurance</option><option value="Ceylinco Insurance">Ceylinco Insurance</option><option value="Sri Lanka Telecom">Sri Lanka Telecom</option></select><br><input placeholder="Amount (LKR)" class="login-input" type="text" id="amnt" name="amnt"><br><textarea placeholder="Description" class="login-input" id="desc" name="desc" style="max-width: 280px; min-height: 100px;"></textarea><br><br><input required type="checkbox"><span class="form-checkbox">I agree with the terms and conditions</span><br><button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button></form>'
        } else if (selectedVal === "spt4") {
            contentContainer.innerHTML =
                '<form action="../backend/user/transaction/intrabank.php" method="post"><label for="3fa" class="form-label">From Account</label><select style="height: inherit;" class="login-input" id="3fa" name="fa"><?php for ($i = 0; $i < count($bankAccounts); $i++) {
                    echo '<option>' . $bankAccounts[$i] . '</option>';
                } ?></select><br><input placeholder="Beneficiary\'s Account Number" class="login-input" type="text" id="ban" name="ban"><br><input placeholder="Amount" class="login-input" type="number" id="amt" name="amt"><br><label class="form-label" for="pop">Purpose Of Payment</label><select style="height: inherit;" class="login-input" id ="pop" name="pop"><option disabled selected value="">Select Purpose</option><option value="Business">Business</option><option value="Personal">Personal</option><option value="Educational">Educational</option><option value="Insurance Services">Insurance Services</option><option value="Other">Other</option></select><br><br><input required type="checkbox"><span class="form-checkbox">I agree with the terms and conditions</span><br><button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button></form>'
        }
    }
</script>

<script>
    // alert box
    alertBox("Transaction successful", "Transaction failed");
    insufficientBalance("Insufficient account balance");
    invalidAcc("Invalid beneficiary account number");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>