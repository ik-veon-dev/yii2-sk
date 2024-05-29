<?php

namespace api\modules\v1\schema;

use api\modules\v1\repository\GqlQueryConfigRepository;
use api\modules\v1\schema\entities\UserSchemaEntity;
use GraphQL\Type\Definition\ObjectType;

class MutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function(){
                return [
                    'user' => self::createMutation(new UserSchemaEntity()),
                ];
            }
        ];
        parent::__construct($config);
    }

    private static function createMutation($entity): array
    {
        return (new GqlQueryConfigRepository($entity))->buildMutationQuery();
    }
}
