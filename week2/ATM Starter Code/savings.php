<?php

require_once "./account.php";
 
class SavingsAccount extends Account 
{
	public function withdrawal($amount) 
	{
		// Check if the withdrawal amount is positive and doesn't lead to a negative balance
		if ($amount > 0 && $this->getBalance() - $amount >= 0) {
			$this->balance -= $amount;
			return true; // Withdrawal successful
		} else {
			return false; // Withdrawal failed (negative amount or insufficient balance)
		}
	}
		public function getAccountDetails() 
	{
		$accountDetails = "<h2>Savings Account</h2>";
		$accountDetails .= parent::getAccountDetails();

		return $accountDetails;
	}
}
?>
