<?php
 
require_once "./account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
{
    $newBalance = $this->getBalance() - $amount;

    //check if the new balance will stay within the overdraft limit, same logic as in savings except this allows an overdraft of $200
    if ($newBalance >= self::OVERDRAW_LIMIT) {
        $this->balance = $newBalance;
        return true; //withdrawal successful
    } else {
        return false; //withdrawal failed (exceeds overdraft limit)
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
