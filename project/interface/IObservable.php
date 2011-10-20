<?php

interface IObservable {
    public function register(IObserver $observer);
    public function notify();
    public function getStatus();
    public function setStatus($status);
}
?>
