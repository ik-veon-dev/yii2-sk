<?php

namespace api\modules\v1\controllers;

use api\modules\v1\controllers\base\BaseController;
use api\modules\v1\schema\Types;
use GraphQL\Executor\ExecutionResult;
use GraphQL\GraphQL;

class GraphqlController extends BaseController
{
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
