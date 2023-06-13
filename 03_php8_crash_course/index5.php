<?php

class Conversation
{
}

$obj = new Conversation();

$type = match($obj::class){
    'Conversation' => 'started_conversation',
    'Reply' => 'replied_to_conversation',
    'Comment' => 'commented_on_lession'
};

var_dump($type);
