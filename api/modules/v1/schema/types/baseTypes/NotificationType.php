<?php

namespace api\modules\v1\schema\types\baseTypes;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class NotificationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::int()
                    ],
                    'user_id' => [
                        'type' => Type::int()
                    ],
                    'title' => [
                        'type' => Type::string()
                    ],
                    'description' => [
                        'type' => Type::string()
                    ],
                    'status' => [
                        'type' => Type::string()
                    ],
                    'notification_type' => [
                        'type' => Type::string()
                    ],
                    'post' => [
                        'type' => Type::int()
                    ],
                    'created_at' => [
                        'type' => Type::string(),
                        'resolve' => static fn($root) => date('Y-m-d', $root->created_at)
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
