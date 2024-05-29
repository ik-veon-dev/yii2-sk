<?php

namespace api\modules\v1\schema\auth;

use common\models\User;
use GraphQL\Type\Definition\ObjectType;

class MutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'auth' => [
                        'type' => Types::authMutation(),
                        'resolve' => function ($root) {
                            return new User();
                        }
                    ]
                ];
            }
        ];
        parent::__construct($config);
    }
}
