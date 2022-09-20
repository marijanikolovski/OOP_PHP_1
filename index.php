<?php

class BankAccount {
    public $balance = 0;
    public $blocked = false;

    public function deposit($amount) {
        $this->balance += $amount;
        if($this->blocked && $this->balance >= 0) {
            return $this->blocked = false;
        }
    }

    public function withdraw($amount) {
        if($this->blocked) {
            // throw new Exception('Account blocked');
            return false;
        }
        $this->balance -= $amount;
        if($this->balance <= -200) {
            $this->blocked = true;
        }
    }

    public function getBankAccount() {
        return $this->balance;
    }
}

class User {
    private $firstName, $lastName, $bankAccount;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function setBankAccount($bankAccount) {
        $this->bankAccount = $bankAccount;
    }
}

echo '<pre>';
$user1 = new User('Petar', 'Petrovic');
$bankAccount = new BankAccount();
$user1->setBankAccount($bankAccount);

var_dump($user1);

$bankAccount->deposit(1000);
var_dump($bankAccount);

$bankAccount->withdraw(1500);
var_dump($bankAccount);

?>
