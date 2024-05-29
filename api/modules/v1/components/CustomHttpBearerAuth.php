<?php

namespace api\modules\v1\components;

use yii\filters\auth\HttpBearerAuth;

class CustomHttpBearerAuth extends HttpBearerAuth
{
    /**
     * @inheritdoc
     */
    public function handleFailure($response): void
    {
        GraphqlExceptions::unauthorizedError();
    }
}
