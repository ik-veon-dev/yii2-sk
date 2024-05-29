<?php

namespace api\modules\v1\schema;

use api\modules\v1\repository\GqlQueryConfigRepository;
use api\modules\v1\schema\entities\FrequencyValuesSchemaEntity;
use api\modules\v1\schema\entities\LanguageSchemaEntity;
use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    private $permissions = [];
    public function __construct()
    {
        $config = [
            'fields' => function(){
                $schema = [];
                if (self::canAdd('languages')) $schema['languages'] = self::getList(new LanguageSchemaEntity());
                return $schema;
            }
        ];

        parent::__construct($config);
    }

    private function canAdd(string $method): bool
    {
        if (empty($this->permissions)) {
            $this->permissions = \Yii::$app->authManager->getPermissionsByUser(\Yii::$app->user->identity->id);
        }
        return array_key_exists(self::convertToCamelCase($method) . 'Full', $this->permissions) || array_key_exists($method . 'View', $this->permissions);
    }

    private static function getOne($entity): array
    {
        return (new GqlQueryConfigRepository($entity))->buildGetOneQuery();
    }

    private static function getList($entity): array
    {
        return (new GqlQueryConfigRepository($entity))->buildGetListQuery();
    }
    private static function getCount($entity): array
    {
        return (new GqlQueryConfigRepository($entity))->buildGetCountQuery();
    }

    private static function convertToCamelCase($string): string
    {
        $converted = ucwords(str_replace('_', ' ', $string));
        $converted = str_replace(' ', '', $converted);
        return lcfirst($converted);
    }
}
