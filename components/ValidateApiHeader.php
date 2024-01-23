<?php

namespace app\components;

use yii\filters\auth\HttpBasicAuth;
use app\models\ApiApp;

/**
 * Auth of main API KEY
 */
class ValidateApiHeader extends HttpBasicAuth
{
    const API_HEADER = 'X-Api-Key';

    public $appToken;

    /**
     * {@inheritdoc}
     */
    public function authenticate($user, $request, $response)
    {

        $this->appToken = $request->getHeaders()->get(self::API_HEADER);

        if ($this->appToken !== null){
            return $this->verifyKey();
        }

        return null;
    }

    /**
     * Verify if header key is set for our API
     * @RETURN mixed
     */
    public function verifyKey()
    {
        $app = ApiApp::findOne(['app_token' => $this->appToken]);
        if ($app) {
            return $this;
        }
        return null;
    }

}
