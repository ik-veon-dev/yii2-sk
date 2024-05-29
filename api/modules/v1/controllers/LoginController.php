<?php

namespace api\modules\v1\controllers;

use api\modules\v1\controllers\base\BaseController;
use api\modules\v1\schema\auth\Types;
use GraphQL\Executor\ExecutionResult;
use GraphQL\GraphQL;

class LoginController extends BaseController
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);
        return $behaviors;
    }

    /**
     * @throws \Exception
     */
    public function actionIndex(): ExecutionResult
    {
        parent::setGraphqlActionSettings(
            Types::query(),
            Types::mutation()
        );

        return GraphQL::executeQuery(
            parent::getSchema(),
            parent::getQuery(),
            null,
            null,
            empty(parent::getVariables()) ? null : parent::getVariables(),
            empty(parent::getOperation()) ? null : parent::getOperation()
        );
    }
}
