<?php

namespace api\modules\v1\schema\entities;

use api\modules\v1\interfaces\gql\GqlMutationInterface;
use api\modules\v1\schema\Types;
use common\models\User;
use backend\models\UserForm;
use GraphQL\Type\Definition\Type;
use Yii;

class UserSchemaEntity extends User implements GqlMutationInterface
{
    public function buildMutationQuery(): array
    {
        return [
            'type' => Types::userMutation(),
            'args' => [
                'id' => Type::id(),
            ],
            'resolve' => static fn($root, $args) => array_key_exists('id', $args) ? User::findById($args['id']) : new UserForm()
        ];
    }
}
