<?php

namespace backend\controllers;

use backend\models\OrderHistorySearch;
use common\models\OrderHistory;

class OrderHistoryController extends \yii\web\Controller
{
    /**
     * Displays the history for a specific order.
     * @param int $orderId ID of the order
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderHistorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
