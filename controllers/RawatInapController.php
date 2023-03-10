<?php

namespace app\controllers;

use app\models\RawatInap;
use app\models\RawatInapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RawatInapController implements the CRUD actions for RawatInap model.
 */
class RawatInapController extends Controller
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
     * Lists all RawatInap models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RawatInapSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RawatInap model.
     * @param int $id_rawat_inap Id Rawat Inap
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_rawat_inap)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_rawat_inap),
        ]);
    }

    /**
     * Creates a new RawatInap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RawatInap();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_rawat_inap' => $model->id_rawat_inap]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RawatInap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_rawat_inap Id Rawat Inap
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_rawat_inap)
    {
        $model = $this->findModel($id_rawat_inap);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_rawat_inap' => $model->id_rawat_inap]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RawatInap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_rawat_inap Id Rawat Inap
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_rawat_inap)
    {
        $this->findModel($id_rawat_inap)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RawatInap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_rawat_inap Id Rawat Inap
     * @return RawatInap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_rawat_inap)
    {
        if (($model = RawatInap::findOne(['id_rawat_inap' => $id_rawat_inap])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
