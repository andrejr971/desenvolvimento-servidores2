<?php
ini_set('display_errors', 1);

  abstract class Account {
    protected $balance;

    public function __construct($initial_balance) {
      $this->balance = $initial_balance;
    }

    public function deposit($value) {
      return $this->balance += $value;
    }

    abstract public function plunder($value);

    public function display() {
      return $this->balance;
    }
  }

  class CurrentAccount extends Account {
    const LIMIT = 500;

    public function plunder($value) {
      if (($this->balance + self::LIMIT) < $value) {
        echo 'Limite de crédito excedido <br />';
      } else {
        echo 'Saldo atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
        
        $this->balance -= $value;
        echo 'Limite: R$ ' . number_format(self::LIMIT, 2, ',', '.') . '<br />';
        
        echo 'Sacar: R$ ' . number_format($value, 2, ',', '.') . '<br />' .
              'Saldo Atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
      }
    }
  }

  class SavingsAccount extends Account {
    public function plunder($value) {
      if ($this->balance > 0) {
        echo 'Saldo atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';

        $this->balance -= $value;

        echo 'Sacar: R$ ' . number_format($value, 2, ',', '.') . '<br />' .
              'Saldo Atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
      } else {
        echo 'Saldo insuficiente <br />';
      }
    }
  }

  class SalaryAccount extends Account {
    public function __construct($value = null) {
      if ($value) {
        echo 'Você não pode depositar, pois é uma conta salário';
        exit;
      }

      $this->balance = 500;
    }

    public function plunder($value) {
      if ($this->balance > 0) {
        echo 'Saldo atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
        $this->balance -= $value;

        echo 'Sacar: R$ ' . number_format($value, 2, ',', '.') . '<br />' .
              'Saldo Atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
      } else {
        echo 'Saldo insuficiente <br />';
      }
    }

    public function deposit($value) {
      echo 'Saldo atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
      $this->balance += $value;

      echo 'Depositar: R$ ' . number_format($value, 2, ',', '.') . '<br />' .
            'Saldo Atual: R$ ' . number_format($this->display(), 2, ',', '.') . '<br />';
    }
  }

  echo "/**Conta Corrente**/ <br />";
  $current = new CurrentAccount(500);
  $current->plunder(650);

  echo "<br />/**Conta Poupança**/ <br />";
  $saving = new SavingsAccount(500);
  $saving->plunder(100);
  
  echo "<br />/**Conta Salário**/ <br />";
  $salary = new SalaryAccount();
  $salary->plunder(200);

  echo '<br />';
  $salary->deposit(250);
  
  
?>