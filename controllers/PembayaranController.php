<?php

namespace app\controllers;

use app\models\Pembayaran;
use app\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PembayaranController implements the CRUD actions for Pembayaran model.
 */
class PembayaranController extends Controller
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
     * Lists all Pembayaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // Laporan
    public function actionLaporan()
    {
        $DB = Yii::$app->db;
        // $pasien = Pembayaran::find()->groupBy("id_petugas")->all();

        // $ts = $DB->createCommand("SELECT *,COUNT(id_petugas) FROM `pembayaran` GROUP BY id_petugas")->queryAll();
        $ts = $DB->createCommand("SELECT pembayaran.id_pembayaran, pasien.nama_pasien, petugas.nama_petugas, pembayaran.total_bayar FROM pembayaran INNER JOIN pasien ON pembayaran.id_pasien = pasien.id_pasien INNER JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas")->queryAll(); 
        
        // return $this->render('laporan', compact("ts", "pasien"));

        return $this->render('laporan', compact("ts"));
    }
 
    /**
     * Displays a single Pembayaran model.
     * @param int $id_pembayaran Id Pembayaran
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pembayaran)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pembayaran),
        ]);
    }

    /**
     * Creates a new Pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pembayaran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pembayaran' => $model->id_pembayaran]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pembayaran Id Pembayaran
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pembayaran)
    {
        $model = $this->findModel($id_pembayaran);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pembayaran' => $model->id_pembayaran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pembayaran Id Pembayaran
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pembayaran)
    {
        $this->findModel($id_pembayaran)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pembayaran Id Pembayaran
     * @return Pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pembayaran)
    {
        if (($model = Pembayaran::findOne(['id_pembayaran' => $id_pembayaran])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
