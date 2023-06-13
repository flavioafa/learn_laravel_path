<?php

class UserNew
{
    public function __construct(protected string $name) {}
}

class Plan
{
    public function __construct(protected string $name){}
}

class Signup
{
    public function __construct(protected UserNew $user, protected Plan $plan){}
}

$user = new UserNew('John Doe');
$plan = new Plan('montly');

$signup = new Signup($user, $plan);

var_dump($signup);