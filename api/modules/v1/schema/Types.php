<?php

namespace api\modules\v1\schema;

use api\modules\v1\schema\mutations\UserMutationType;
use api\modules\v1\schema\types\baseTypes\LanguageType;
use api\modules\v1\schema\types\baseTypes\NotificationType;
use api\modules\v1\schema\types\baseTypes\ValidationErrorsListType;
use api\modules\v1\schema\types\baseTypes\ValidationErrorType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\UnionType;
use yii\base\Model;

class Types
{
    private static $validationError;
    private static $validationErrorsList;
    private static $query;
    private static $mutation;
    private static $valitationTypes;
    private static $language;
    private static $notification;
    private static $userMutation;

    public static function query(): QueryType
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function mutation(): MutationType
    {
        return self::$mutation ?: (self::$mutation = new MutationType());
    }

    public static function language(): LanguageType
    {
        return self::$language ?: (self::$language = new LanguageType());
    }

    public static function notification(): NotificationType
    {
        return self::$notification ?: (self::$notification = new NotificationType());
    }

    public static function userMutation(): UserMutationType
    {
        return self::$userMutation ?: (self::$userMutation = new UserMutationType());
    }

    // validation
    public static function validationError(): ValidationErrorType
    {
        return self::$validationError ?: (self::$validationError = new ValidationErrorType());
    }

    public static function validationErrorsList(): ValidationErrorsListType
    {
        return self::$validationErrorsList ?: (self::$validationErrorsList = new ValidationErrorsListType());
    }

    public static function validationErrorsUnionType(ObjectType $type)
    {
        if (!isset(self::$valitationTypes[$type->name . 'ValidationErrorsType'])) {
            self::$valitationTypes[$type->name . 'ValidationErrorsType'] = new UnionType([
                'name' => $type->name . 'ValidationErrorsType',
                'types' => [
                    $type,
                    Types::validationErrorsList(),
                ],
                'resolveType' => function ($value) use ($type) {
                    if ($value instanceof Model) {
                        return $type;
                    } else {
                        return Types::validationErrorsList();
                    }
                }
            ]);
        }
        return self::$valitationTypes[$type->name . 'ValidationErrorsType'];
    }
}
