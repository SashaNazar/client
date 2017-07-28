<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\SmsForm;
use yii\httpclient\Client;

class MessageController extends Controller
{
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $model = new SmsForm();
        $client = new Client(['baseUrl' => 'http://server/web']);

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $newUserResponse = $client->post('messages', [
                'text' => $data['SmsForm']['text'],
                'receiver' => $data['SmsForm']['receiver'],
                'userId' => Yii::$app->user->getId() ? Yii::$app->user->getId() : 0,
                'status' => 1,
            ])->send();

            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }

        $articleResponse = $client->get('messages')->send();

        return $this->render('index', [
            'model' => $model,
            'data' => $articleResponse->getData(),
        ]);
    }

}
