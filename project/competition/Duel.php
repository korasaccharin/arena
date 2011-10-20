<?php

abstract class Duel implements IObserver, IObservable
{
    protected $ID;

    protected $observers = array();
    protected $status = 'BEGIN';

    public function start() {}

    private function fight() {}

    private function stop() {}

    public function update($ID) {}

    public function register(IObserver $observer) {
        $this->observers[] = $observer;
    }
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->ID);
        }
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
}
?>
