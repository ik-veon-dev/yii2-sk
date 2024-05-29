<?php

namespace api\modules\v1\schema\auth;

use api\modules\v1\schema\auth\mutations\AuthMutationType;
use api\modules\v1\schema\auth\types\PermissionType;
use api\modules\v1\schema\auth\types\RoleType;
use api\modules\v1\schema\auth\types\UserType;
use api\modules\v1\schema\types\baseTypes\ValidationErrorsListType;
use api\modules\v1\schema\types\baseTypes\ValidationErrorType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\UnionType;
use yii\base\Model;

class Types
{
    private static $validationError;
    private static $validationErrorsList;
    private static $valitationTypes;

    private static $query;
    private static $user;
    private static $role;
    private static $permission;
    private static $mutation;

    private static $authMutation;

    public static function user(): UserType
    {
        return self::$user ?: (self::$user = new UserType());
    }
    public static function role(): RoleType
    {
        return self::$role ?: (self::$role = new RoleType());
    }
    public static function permission(): PermissionType
    {
        return self::$permission ?: (self::$permission = new PermissionType());
    }
    public static function query(): QueryType
    {
        return self::$query ?: (self::$query = new QueryType());
    }
    public static function mutation(): MutationType
    {
        return self::$mutation ?: (self::$mutation = new MutationType());
    }

    public static function authMutation(): AuthMutationType
    {
        return self::$authMutation ?: (self::$authMutation = new AuthMutationType());
    }

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
