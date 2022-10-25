<?php

return [
    'type' => [
        'general'      =>  1,
        'question'     =>  2,
        'incident'     =>  3,
        'problem'      =>  4,
        'feature'      =>  5,
        'refund'       =>  6,
    ],

    'status' => [
        'open'                       =>  1,
        'pending'                    =>  2,
        'resolved'                   =>  3,
        'closed'                     =>  4,
        'waiting_on_customer'        =>  5,
        'waiting_on_third_party'     =>  6,
    ],

    'priority' => [
        'low'          =>  1,
        'medium'       =>  2,
        'high'         =>  3,
        'urgent'       =>  4,
    ],
];
