<?php

return [
    'type' => [
        'general'      =>  0,
        'question'     =>  1,
        'incident'     =>  2,
        'problem'      =>  3,
        'feature'      =>  4,
        'refund'       =>  5,
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
