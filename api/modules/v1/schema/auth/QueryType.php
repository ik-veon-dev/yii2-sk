<?php

namespace api\modules\v1\schema\auth;

use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function(){
                return [];
            }
        ];
        parent::__construct($config);
    }
}
