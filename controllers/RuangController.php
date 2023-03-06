<?php

namespace app\controllers;

use app\models\Ruang;
use app\models\RuangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuangController implements the CRUD actions for Ruang model.
 */
class RuangController extends Controller
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
     * Lists all Ruang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RuangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ruang model.
     * @param int $id_ruang Id Ruang
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ruang)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ruang),
        ]);
    }

    /**
     * Creates a new Ruang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ruang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ruang' => $model->id_ruang]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ruang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ruang Id Ruang
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ruang)
    {
        $model = $this->findModel($id_ruang);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ruang' => $model->id_ruang]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ruang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ruang Id Ruang
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ruang)
    {
        $this->findModel($id_ruang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ruang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ruang Id Ruang
     * @return Ruang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ruang)
    {
        if (($model = Ruang::findOne(['id_ruang' => $id_ruang])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
