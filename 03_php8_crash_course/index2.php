<?php

class User
{
    public function profile()
    {
        return null;
    }
}

class Profile
{
    public function employment()
    {
        return 'web developer';
    }
}

$user = new User();

// $profile = $user->profile();
// if ($profile) {
//     echo $user->profile()->employment();
// }

//No PHP 8 existe o operador que já trata o null, isso substitui todo o codigo acima, inclusive checando se $user é diferente de null e mostrando mensagem
echo $user?->profile()?->employment() ?? 'Not provider';
