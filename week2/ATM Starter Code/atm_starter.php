<?php
require_once "account.php";
require_once "checking.php";
require_once "savings.php";
session_start(); //using sessions to store values
//reset button logic, reset just sets $ back to zero
if (isset($_POST["reset"])) {
    session_destroy();
    session_start();
}
//initialize  checking account
if (!isset($_SESSION['checkingAccount'])) {
    $_SESSION['checkingAccount'] = new CheckingAccount("Checking123", 0, "2023-11-06");
}
//initalize savings account
if (!isset($_SESSION['savingsAccount'])) {
    $_SESSION['savingsAccount'] = new SavingsAccount("Savings456", 0, "2023-11-06");
}
$checkingAccount = $_SESSION['checkingAccount'];
$savingsAccount = $_SESSION['savingsAccount'];
$checkingMessage = '';
$savingsMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //start of checking account transactions
    if (isset($_POST["withdrawChecking"])) {
        $amount = (float)$_POST["checkingWithdrawAmount"];
        if ($checkingAccount->withdrawal($amount)) {
            //successful withdrawal --> message
            $checkingMessage = "Withdrawn $amount from Checking Account.";
        } else {
            //unsuccessful withdrawl --> message
            $checkingMessage = "Withdrawal failed. Cannot exceed <strong>$200</strong> overdraft limit";
        }
    } elseif (isset($_POST["depositChecking"])) {
        $amount = (float)$_POST["checkingDepositAmount"];
        if ($amount > 100000) {
            $checkingMessage = "Deposit limit exceeded. Maximum deposit is <strong>$100,000</strong>.";
        } else {
            if ($checkingAccount->deposit($amount)) {
                //successful deposit --> message
                $checkingMessage = "Deposited $amount into Checking Account.";
            } else {
                $checkingMessage = "Deposit failed. Check your deposit amount.";
            }
        }
    }
    //END OF CHECKING

    //start of savings account transactions
    if (isset($_POST["withdrawSavings"])) {
        $amount = (float)$_POST["savingsWithdrawAmount"];
        if ($savingsAccount->withdrawal($amount)) {
            //successful withdrawal --> message
            $savingsMessage = "Withdrawn $amount from Savings Account.";
        } else {
            //unsuccessful withdrawl --> message
            $savingsMessage = "Withdrawal failed. Cannot go below <strong>$0</strong>";
        }
    } elseif (isset($_POST["depositSavings"])) {
        $amount = (float)$_POST["savingsDepositAmount"];
        if ($amount > 1000000) {
            $savingsMessage = "Deposit limit exceeded. Maximum deposit is <strong>$1,000,000</strong>";
        } else {
            if ($savingsAccount->deposit($amount)) {
                //successful deposit --> message
                $savingsMessage = "Deposited $amount into Savings Account.";
            } else {
                //unsuccessful deposit --> message
                $savingsMessage = "Deposit failed. Check your deposit amount.";
            }
        }
    }
    //END OF SAVINGS
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
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
</body>
</html>
