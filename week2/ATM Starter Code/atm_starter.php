<?php
require_once "account.php";
require_once "checking.php";
require_once "savings.php";
session_start(); // Start a session to store account instances
// Check if the "reset" button is clicked, and destroy the current session
if (isset($_POST["reset"])) {
    session_destroy();
    session_start();
}
// Initialize account instances if they don't exist in the session
if (!isset($_SESSION['checkingAccount'])) {
    $_SESSION['checkingAccount'] = new CheckingAccount("Checking123", 0, "2023-11-06");
}

if (!isset($_SESSION['savingsAccount'])) {
    $_SESSION['savingsAccount'] = new SavingsAccount("Savings456", 0, "2023-11-06");
}
$checkingAccount = $_SESSION['checkingAccount'];
$savingsAccount = $_SESSION['savingsAccount'];
$checkingMessage = '';
$savingsMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle checking account transactions
    if (isset($_POST["withdrawChecking"])) {
        $amount = (float)$_POST["checkingWithdrawAmount"];
        if ($checkingAccount->withdrawal($amount)) {
            // Successful withdrawal
            $checkingMessage = "Withdrawn $amount from Checking Account.";
        } else {
            $checkingMessage = "Withdrawal failed. Check your balance or withdrawal amount.";
        }
    } elseif (isset($_POST["depositChecking"])) {
        $amount = (float)$_POST["checkingDepositAmount"];
        if ($amount > 100000) {
            $checkingMessage = "Deposit limit exceeded. Maximum deposit is 1 million.";
        } else {
            if ($checkingAccount->deposit($amount)) {
                // Successful deposit
                $checkingMessage = "Deposited $amount into Checking Account.";
            } else {
                $checkingMessage = "Deposit failed. Check your deposit amount.";
            }
        }
    }
    // Handle savings account transactions
    if (isset($_POST["withdrawSavings"])) {
        $amount = (float)$_POST["savingsWithdrawAmount"];
        if ($savingsAccount->withdrawal($amount)) {
            // Successful withdrawal
            $savingsMessage = "Withdrawn $amount from Savings Account.";
        } else {
            $savingsMessage = "Withdrawal failed. Check your balance or withdrawal amount.";
        }
    } elseif (isset($_POST["depositSavings"])) {
        $amount = (float)$_POST["savingsDepositAmount"];
        if ($amount > 1000000) {
            $savingsMessage = "Deposit limit exceeded. Maximum deposit is 1 million.";
        } else {
            if ($savingsAccount->deposit($amount)) {
                // Successful deposit
                $savingsMessage = "Deposited $amount into Savings Account.";
            } else {
                $savingsMessage = "Deposit failed. Check your deposit amount.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">ATM</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Checking Account</h5>
                        <form method="post">
                            <div class="form-group">
                                <label for="checkingWithdrawAmount">Withdraw Amount</label>
                                <input type="text" class="form-control" id="checkingWithdrawAmount" name="checkingWithdrawAmount" value="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="withdrawChecking">Withdraw</button>
                            <div class="form-group mt-3">
                                <label for="checkingDepositAmount">Deposit Amount</label>
                                <input type="text" class="form-control" id="checkingDepositAmount" name="checkingDepositAmount" value="1300">
                            </div>
                            <button type="submit" class="btn btn-success" name="depositChecking">Deposit</button>
                            <button type="submit" class="btn btn-secondary mt-3" name="reset">Reset</button>
                        </form>
                        <div class="mt-3">
                            <?php echo $checkingMessage; ?>
                        </div>
                        <?php echo $checkingAccount->getAccountDetails(); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Savings Account</h5>
                        <form method="post">
                            <div class="form-group">
                                <label for="savingsWithdrawAmount">Withdraw Amount</label>
                                <input type="text" class="form-control" id="savingsWithdrawAmount" name="savingsWithdrawAmount" value="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="withdrawSavings">Withdraw</button>
                            <div class="form-group mt-3">
                                <label for= "savingsDepositAmount">Deposit Amount</label>
                                <input type="text" class="form-control" id="savingsDepositAmount" name="savingsDepositAmount" value="5000">
                            </div>
                            <button type="submit" class="btn btn-success" name="depositSavings">Deposit</button>
                        </form>
                        <div class="mt-3">
                            <?php echo $savingsMessage; ?>
                        </div>
                        <?php echo $savingsAccount->getAccountDetails(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS and jQuery links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
