<?php

namespace api\modules\v1\schema\auth\types;

use api\modules\v1\schema\auth\Types;
use common\models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::int()
                    ],
                    'username' => [
                        'type' => Type::string()
                    ],
                    'email' => [
                        'type' => Type::string()
                    ],
                    'access_token' => [
                        'type' => Type::string()
                    ],
                    'status' => [
                        'type' => Type::int()
                    ],
                    'role' => [
                        'type' => Type::listOf(Types::role()),
                        'resolve' => function(User $user) {
                            $auth = \Yii::$app->authManager;
                            $roles = $auth->getRolesByUser($user->id);
                            return $roles;
                        },
                    ],
                    'language_id' => [
                        'type' => Type::string()
                    ],
                    'permissions' => [
                        'type' => Type::listOf(Types::permission()),
                        'resolve' => function(User $user) {
                            $auth = \Yii::$app->authManager;
                            $permissions = $auth->getPermissionsByUser($user->id);
                            return $permissions;
                        },
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
