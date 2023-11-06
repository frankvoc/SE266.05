<?php
 
require_once "./account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
{
    $newBalance = $this->getBalance() - $amount;

    // Check if the new balance will stay within the overdraft limit
    if ($newBalance >= self::OVERDRAW_LIMIT) {
        $this->balance = $newBalance;
        return true; // Withdrawal successful
    } else {
        return false; // Withdrawal failed (exceeds overdraft limit)
    }
}
	//freebie. I am giving you this code.
	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Checking Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
}  
?>
