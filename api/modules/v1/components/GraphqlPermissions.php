<?php

namespace api\modules\v1\components;

class GraphqlPermissions
{
    public static function checkAccess(object $schema, string $queryName, string $methodName): string
    {
        $isMutation = $queryName === 'mutation';
        $isQuery = $queryName === 'query';

        $queryType = $isQuery ? $schema->getQueryType()->getFieldNames() :
            ($isMutation ? $schema->getMutationType()->getFieldNames() : []);


        if (in_array($methodName, $queryType)) {
            $queryMethodType = self::convertToCamelCase($methodName);

            if (\Yii::$app->user->can($queryMethodType . 'Full')
                || $isQuery && \Yii::$app->user->can($queryMethodType . 'View')) {
                return true;
            }else{
                return false;
            }
        }

        return true;
    }

    private static function convertToCamelCase($string): string
    {
        $converted = ucwords(str_replace('_', ' ', $string));
        $converted = str_replace(' ', '', $converted);
        return lcfirst($converted);
    }
}
