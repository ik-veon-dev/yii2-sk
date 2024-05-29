<?php

namespace api\modules\v1\schema\mutations;

use api\modules\v1\schema\Types;
use common\models\Languages;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class UserMutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'set_language' => [
                        'type' => Types::validationErrorsUnionType(Types::language()),
                        'description' => 'Change language.',
                        'args' => [
                            'language_id' => Type::nonNull(Type::id()),
                        ],
                        'resolve' => function($root, $args){
                            if (Languages::find()->where(['id' => $args['language_id']])->exists()){
                                $user = \Yii::$app->user->identity;
                                if ($user->language_id === (int)$args['language_id']){
                                    return $user->language;
                                }
                                $user->language_id = (int)$args['language_id'];
                                if ($user->update()){
                                    $language = $user->language->name === 'ru' ? 'ru-RU' :
                                        ($user->language->name === 'uz' ? 'uz-UZ' : 'en-US');
                                    $us = $user->userProfile;
                                    $us->locale = $language;
                                    $us->save();
                                    return $user->language;
                                }else {
                                    foreach ($user->getErrors() as $field => $messages) {
                                        $errors[] = [
                                            'field' => $field,
                                            'messages' => $messages,
                                        ];
                                    }
                                }
                            }else{
                                $errors[] = [
                                    'field' => 'language',
                                    'messages' => ['not found']
                                ];
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
