<?php

namespace app\components;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use app\models\ApiDevice;
use yii\db\Expression;
use yii\web\HttpException;
/**
 * Base Controller for api module
 */
class Controller extends \yii\web\Controller
{
    const HEADER_DEVICE_INFO = 'X-Device-Info';

    public function init() {
        parent::init();
        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->headers->add('Content-Disposition', 'attachment');
    }

    public function behaviors() {
        $behaviors =  parent::behaviors();
        $behaviors['apiKeyAuth'] = [
            'class' => ValidateApiHeader::className(),
        ];
        return $behaviors;
    }

    public function getJsonInput() {
        return json_decode(Yii::$app->request->rawBody);
    }

    public function runAction($id, $params = array())
    {
        try {
            return parent::runAction($id, $params);
        } catch (\yii\web\HttpException $e) {
            Yii::error($e);
            Yii::$app->response->statusCode = $e->statusCode;
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            Yii::error($e);
            Yii::$app->response->statusCode = 500;
            return [
                'error' => true,
                'message' => YII_DEBUG ? $e->getMessage() : 'Internal server error',
            ];
        }
    }
}
