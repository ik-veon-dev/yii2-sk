<?php

namespace api\modules\v1\schema\auth\mutations;

use api\modules\v1\schema\auth\Types;
use backend\models\LoginForm;
use common\models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class AuthMutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function(){
                return [
                    'login' => [
                        'type' => Types::validationErrorsUnionType(Types::user()),
                        'description' => \Yii::t('api', 'Login user.'),
                        'args' => [
                            'username' => Type::nonNull(Type::string()),
                            'password' => Type::nonNull(Type::string()),
                        ],
                        'resolve' => function(User $user, $args){
                            $form = new LoginForm();
                            $form->load($args, '');

                            if ($form->loginToApi()){
                                $user = $form->getUser();
                                $user->language_id = isset($user->language) ? $user->language->name : null;
                                return $user;
                            }else{
                                foreach ($form->getErrors() as $field => $messages){
                                    $errors[] = [
                                        'field' => $field,
                                        'messages' => $messages,
                                    ];
                                }
                            }
                            return ['errors' => $errors];
                        }
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
