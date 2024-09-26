<?php

namespace backend\controllers;

use common\models\Order;
use backend\models\OrderSearch;
use common\models\OrderHistory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii2tech\csvgrid\CsvGrid;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldAttributes = $model->getAttributes();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $newAttributes = $model->getAttributes();

            $this->logOrderHistory($model, $oldAttributes, $newAttributes);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Logs changes in the OrderHistory model
     * @param Order $model the order being updated
     * @param array $oldAttributes the original attributes before update
     * @param array $newAttributes the updated attributes after update
     */
    protected function logOrderHistory($model, $oldAttributes, $newAttributes)
    {
        foreach ($newAttributes as $attribute => $newValue) {
            if ($oldAttributes[$attribute] != $newValue) {
                $history = new OrderHistory();
                $history->order_id = $model->id;
                $history->attribute = $attribute;
                $history->old_value = (string)$oldAttributes[$attribute];
                $history->new_value = (string)$newValue;
                $history->updated_by = Yii::$app->user->identity->username;
                $history->save();
            }
        }
    }

    public function actionExportCsv()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $orders = $dataProvider->getModels();

        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/csv; charset=UTF-8');
        Yii::$app->response->headers->add('Content-Disposition', 'attachment; filename="orders.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Order Name', 'Product', 'Price', 'Telephone']);

        foreach ($orders as $order) {
            fputcsv($output, [
                $order->order_name,
                $order->product_name,
                $order->price,
                $order->phone,
            ]);
        }

        fclose($output);
        return Yii::$app->response;
    }


}
