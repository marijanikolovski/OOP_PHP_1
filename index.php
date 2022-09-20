<?php

class BankAccount {
    protected $balance = 0;
    protected $blocked = false;

    public function getBalance() {
        return $this->balance;
    }
    public function getBlocked() {
        return $this->blocked;
    }
}

class SimpleBankAccount extends BankAccount {
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
        if($this->balance  <= -200) {
            echo 'You do not have enough money to withdraw';
            return $this->balance += $amount;
        } else {
            $this->balance;
        }
        if($this->balance <= -200) {
            $this->blocked = true;
        }
    }

    public function getBankAccount() {
        return $this->balance;
    }
}

class SecuredBankAccount extends BankAccount {
    public function deposit($amount) {
        $this->balance += ($amount - $amount * 0.025);
        if($this->blocked && $this->balance >= 0) {
            return $this->blocked = false;
        }
    }

    public function  withdraw($amount) {
        if ($this->blocked) {
            // throw new Exception('Account blocked');
            return false;
        }
        $this->balance -= ($amount - $amount * 0.025);
        if($this->balance  <= -1000) {
            echo 'You do not have enough money to withdraw';
            return $this->balance += $amount;
        } else {
            $this->balance;
        }
        if ($this->balance <= -1000) {
            $this->blocked = true;
        }
    }

    public function getBankAccount() {
        return $this->balance;
    }
}

class User {
    private $firstName, $lastName, $simpleBankAccoun, $securedBankAccount;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function simpleBankAccoun($simpleBankAccoun) {
        $this->simpleBankAccoun = $simpleBankAccoun;
    }

    public function setSecuredBankAccount($securedBankAccount) {
        $this->securedBankAccount = $securedBankAccount;
    }
}

echo '<pre>';
$user1 = new User('Petar', 'Petrovic');

$simpleBankAccoun = new SimpleBankAccount();
$simpleBankAccoun->deposit(1000);
$simpleBankAccoun->withdraw(800);
$simpleBankAccoun->withdraw(1000);

$securedBankAccoun = new SecuredBankAccount();
$securedBankAccoun->deposit(2000);
$securedBankAccoun->withdraw(1000);
$securedBankAccoun->withdraw(3000);

$user1->simpleBankAccoun($simpleBankAccoun);
$user1->setSecuredBankAccount($securedBankAccoun);

var_dump($user1);
?>
