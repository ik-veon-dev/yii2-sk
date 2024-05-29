<?php

namespace api\modules\v1\schema\types\baseTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class LanguageType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::int()
                    ],
                    'name' => [
                        'type' => Type::string()
                    ],
                    'flag_image_url' => [
                        'type' => Type::string()
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
