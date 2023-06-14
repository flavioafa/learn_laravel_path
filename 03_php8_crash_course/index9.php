<?php
declare(strict_types=1);

class User
{
    public function cancel(bool|string $immediate = false)
    {
        var_dump($immediate);
    }
}


$joe = new User();
$joe->cancel(true);
$joe->cancel('next weak');