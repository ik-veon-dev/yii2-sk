<?php

namespace api\modules\v1\schema\types\baseTypes;


use api\modules\v1\schema\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class ValidationErrorsListType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'errors' => Type::listOf(Types::validationError()),
                ];
            },
        ];

        parent::__construct($config);
    }
}
