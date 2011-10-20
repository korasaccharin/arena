<?php

class Net extends Kit implements IWeapon
{
    protected $label = "net";
    protected $cost = 3;
    protected $attack = 30;

    public function hurt() {
        $this->snap();
        return $this->askChance($this->attack);
    }
    private function snap() {
        $this->state = 0;
    }
    public function repair() {
        $this->state = 1;
    }
}
?>
