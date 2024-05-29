<?php

namespace api\modules\v1\components;

class GraphqlExceptions
{
    public static function unauthorizedError(): void
    {
        self::buildAndSendError('unauthorized');
    }

    public static function accessDeniedError(): void
    {
        self::buildAndSendError('access denied');
    }

    private static function buildAndSendError(string $message): void
    {
        \Yii::$app->response->statusCode = 403;
        \Yii::$app->response->data = [
            'errors' => [
                'messages' => $message
            ]
        ];
        \Yii::$app->response->send();
    }
}
