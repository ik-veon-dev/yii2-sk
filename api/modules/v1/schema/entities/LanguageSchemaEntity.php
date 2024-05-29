<?php

namespace api\modules\v1\schema\entities;

use api\modules\v1\interfaces\gql\GqlGetListInterface;
use api\modules\v1\schema\Types;
use common\models\Languages;
use GraphQL\Type\Definition\Type;

class LanguageSchemaEntity extends Languages implements GqlGetListInterface
{

    public function buildGetListQuery(): array
    {
        return [
            'type' => Type::listOf(Types::language()),
            'resolve' => static fn($root) => parent::find()->all()
        ];
    }
}
