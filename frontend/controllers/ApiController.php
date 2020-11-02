<?php

namespace frontend\controllers;

use common\models\Availability;
use common\models\Hospital;
use common\models\HospitalCategory;
use common\models\Locality;
use common\models\Medicament;
use common\models\Package;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class ApiController extends Controller
{
    const LIMIT = 100;

    /**
     * @param int $limit
     * @param string $region
     * @param int $page
     * @return mixed
     */
    public function actionLocality($limit = self::LIMIT, $region = '', $page = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $locality = Locality::find();
        if (!empty($region)){
            $locality->andWhere(['region'=>$region]);
        }
        $count = ceil($locality->count()/$limit);
        $res = $locality->limit($limit)->offset(($page - 1) * $limit)->orderBy('title')->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>$page,
                'count'=>$count
            ],
        ];
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function actionMedicament($limit = self::LIMIT, $page = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $medicament = Medicament::find();
        $count = ceil($medicament->count()/$limit);
        $res = $medicament->limit($limit)->offset(($page - 1) * $limit)->orderBy('title')->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>$page,
                'count'=>$count
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionPackage()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $res = Package::find()->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>1,
                'count'=>1
            ],
        ];
    }
    /**
     * @return mixed
     */
    public function actionRegions()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $res = Hospital::find()->select('region_id, region_title')->distinct()->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>1,
                'count'=>1
            ],
        ];
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function actionHospital($limit = self::LIMIT, $locality_id= '', $region ='', $page = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $hospitals = Hospital::find();
        if (!empty($region)){
            $hospitals->andWhere(['region_title'=>$region]);
        }
        if (!empty($locality_id)){
            $hospitals->andWhere(['locality_id'=>$locality_id]);
        }
        $count = ceil($hospitals->count()/$limit);
        $res = $hospitals->limit($limit)->offset(($page - 1) * $limit)->orderBy('title')->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>$page,
                'count'=>$count
            ],
        ];
    }


    /**
     * @param int $limit
     * @param $hospital_id
     * @param int $page
     * @return mixed
     */
    public function actionHospitalCategory($limit = self::LIMIT, $hospital_id, $page = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $hospital_category = HospitalCategory::find()->where(['hospital_id' => $hospital_id]);
        $count = ceil($hospital_category->count()/$limit);
        $res=$hospital_category->limit($limit)->offset(($page - 1) * $limit)->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>$page,
                'count'=>$count
            ],
        ];
    }

    /**
     * @param int $limit
     * @param $hospital_id
     * @param int $page
     * @return mixed
     */
    public function actionAvailability($limit = self::LIMIT, $hospital_id, $page = 1)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $availability = Availability::find()->where(['hospital_id' => $hospital_id]);
        $count = ceil($availability->count()/$limit);
        $res = $availability->limit($limit)->offset(($page - 1) * $limit)->all();
        return [
            'data'=>$res,
            'pages'=>[
                'current'=>$page,
                'count'=>$count
            ],
        ];
    }


}
