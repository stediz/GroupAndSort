<?php
class Config {

    public static $states = [
        'Get new coffee machine' => 'done',
        '(Re)fill beans' => 'doing',
        'Fill water tank' => 'to do',
        'Make coffee' => 'on hold',
        'Make more coffee' => 'to do',
        'Turn old coffee machine off and on again' => 'failed',
        'Repair old coffee machine' => 'failed'        
    ];

    public static $transitions = [
        'to do' => [
            'doing',
            'on hold'
        ],
        'doing' => [
            'done',
            'failed',
            'on hold'
        ],
        'on hold' => [
            'doing'
        ]
    ];
}
