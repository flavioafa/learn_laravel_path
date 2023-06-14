<?php

interface Event {}

class SomeEvent implements Event {}
class AnotherEvent implements Event {}

class Dispatcher
{
    protected WeakMap $dispatchCount;

    public function __construct()
    {
        $this->dispatchCount = new WeakMap();
    }

    public function dispatch(Event $event)
    {
        $this->incrementDispatches($event);
    }

    public function incrementDispatches(Event $event)
    {
        $this->dispatchCount[$event] ??=0;
        $this->dispatchCount[$event]++;
    }
}

$dispatcher = new Dispatcher();

$event = new SomeEvent();
$dispatcher->dispatch($event);
$dispatcher->dispatch($event);

$anotherEvent = new SomeEvent();
$dispatcher->dispatch($anotherEvent);

var_dump($dispatcher);


