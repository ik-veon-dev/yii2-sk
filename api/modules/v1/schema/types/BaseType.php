<?php

namespace api\modules\v1\schema\types;

use GraphQL\Type\Definition\ObjectType;

class BaseType extends ObjectType
{
    protected static function convertToCamelCase($string): string
    {
        $converted = ucwords(str_replace('_', ' ', $string));
        $converted = str_replace(' ', '', $converted);
        return lcfirst($converted);
    }

    protected function setArgs($args)
    {
        foreach ($args as $key => $type){
            if (!\Yii::$app->user->can($this->name . self::convertToCamelCase($key))) unset($args[$key]);
        }
        return $args;
    }
}
