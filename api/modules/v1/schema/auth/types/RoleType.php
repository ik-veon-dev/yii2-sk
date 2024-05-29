<?php

namespace api\modules\v1\schema\auth\types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class RoleType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'name' => [
                        'type' => Type::string()
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
