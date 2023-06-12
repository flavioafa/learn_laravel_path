<?php

class Conversation
{
}

$obj = new Conversation();

// switch (get_class($obj)) {
//     case 'Conversation':
//         $type = 'started_conversation';
//         break;
//     case 'Reply':
//         $type = 'replied_to_conversation';
//         break;
//     case 'Comment':
//         $type = 'commented_on_lession';
//         break;
// }

//Com a função match se produz o mesmo resultado de um switch case. O exemplo abaixo substitui o switch case acima.
$type = match(get_class($obj)){
    'Conversation' => 'started_conversation',
    'Reply' => 'replied_to_conversation',
    'Comment' => 'commented_on_lession'
};

echo $type;
