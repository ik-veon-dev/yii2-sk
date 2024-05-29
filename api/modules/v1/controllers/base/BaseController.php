<?php


namespace api\modules\v1\controllers\base;


use api\modules\v1\components\CustomHttpBearerAuth;
use api\modules\v1\components\GraphqlExceptions;
use GraphQL\Error\SyntaxError;
use GraphQL\Type\Schema;
use yii\base\InvalidParamException;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\web\Response;

class BaseController extends ActiveController
{
    public $modelClass = '';

    protected $query;
    protected $variables;
    protected $operation;
    protected $schema;
    public function actions(): array
    {
        return [];
    }



    protected function verbs(): array
    {
        return [
            'index' => ['POST', 'OPTIONS'],
        ];
    }

    public function behaviors(): array
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => [
                        'https://adtech.vdev.website',
                        'http://localhost:3000',
                        'https://localhost:3000',
                        'http://localhost:3001',
                        'http://localhost:5500',
                    ],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,
                ],
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
            'authenticator' => [
                'class' => CustomHttpBearerAuth::class,
            ],
        ];
    }

    /**
     * @throws SyntaxError
     * @throws \JsonException
     */
    protected function setGraphqlActionSettings($type, $mutation): void
    {
        $this->query = \Yii::$app->request->get('query', \Yii::$app->request->post('query'));
        $this->variables = \Yii::$app->request->get('variables', \Yii::$app->request->post('variables'));
        $this->operation = \Yii::$app->request->get('operation', \Yii::$app->request->post('operation', null));

        if (empty($this->query)) {
            $rawInput = file_get_contents('php://input');
            $input = json_decode($rawInput, true);
            $this->query = $input['query'];
            $this->variables = $input['variables'] ?? [];
            $this->operation = $input['operation'] ?? null;
        }

        if (!empty($this->variables) && !is_array($this->variables)) {
            try {
                $this->variables = Json::decode($this->variables);
            } catch (InvalidParamException $e) {
                $this->variables = null;
            }
        }

        $this->schema = new Schema([
            'query' => $type,
            'mutation' => $mutation,
        ]);
    }

    public function getQuery()
    {
        return $this->query;
    }
    public function getVariables()
    {
        return $this->variables;
    }
    public function getOperation()
    {
        return $this->operation;
    }
    public function getSchema()
    {
        return $this->schema;
    }
}
