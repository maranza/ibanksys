<?php

//Mathematical Captcha
class BotCheck {

    private $num1;
    private $num2;
    private $opr;

    public function __construct() {
        $this->generatequestion();
        if (!isset($_SESSION['ans'])) {
            $_SESSION['ans'] = $this->computequestion();
        }
        //print $_SESSION['ans'];
    }

    private function computequestion() {

        switch ($this->opr) {
            case "+":
                return($this->num1 + $this->num2);
                break;
            case "-":
                return($this->num1 - $this->num2);
                break;

            case "*":
                return($this->num1 * $this->num2);
                break;
        }
    }

    public function checkanswer($ans) {
        if ($_SESSION['ans'] == $ans) {
            unset($_SESSION['ans']);
            return true;
        } else {
            $_SESSION['ans'] = $this->computequestion();

            return false;
        }
    }

    public function showquestion() {
        echo "<b>" . $this->num1 . " " . $this->opr . " " . $this->num2 . "</b>";
    }

    private function generatequestion() {
        $signs = array("*", "+", "-");
        $this->num1 = mt_rand(1, 30);
        $this->num2 = mt_rand(1, 30);
        $this->opr = $signs[mt_rand(0, count($signs) - 1)];
    }

}
