<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * Displays the order submission form.
     */
    public function actionCreate()
    {
        $model = new Order();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->price = $model->productPrices[$model->product_name] ?? 0;
                $model->status = Order::STATUS_PENDING;
                $model->created_at = date('Y-m-d H:i:s');

                if ($model->save()) {
                    return $this->redirect(['success']);
                } else {
                    Yii::error($model->getErrors(), __METHOD__);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




    /**
     * Displays a success message after order submission.
     * @return string
     */
    public function actionSuccess()
    {
        return $this->render('success');
    }
}
