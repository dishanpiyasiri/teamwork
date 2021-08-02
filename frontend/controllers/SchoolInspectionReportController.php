<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\EvaluationHeader;
use yii\web\NotFoundHttpException;
use backend\models\Model;
use common\models\EvaluationCriteria;
use common\models\EvaluationIndex;
use common\models\EvaluationDetail;
use common\models\GenaralEvaluationDetail;
use common\models\EvaluationInstruction;
use backend\models\EvaluationDetailSearch;
use backend\controllers\SysHelper;
use common\models\School;
use common\models\District;
use common\models\Province;
use common\models\EduZone;
use common\models\Institute;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;



class SchoolInspectionReportController extends Controller{

	public function actionShow($ptype){
		$school = new School();

        return $this->render('show-evaluations', [                        
                        'school' => $school,
                        'ptype'  => $ptype
            ]);

	}
	public function actionFindEvaluationHeader($censusno, $sch_cat, $zone, $district, $province, $year, $ptype) {

        if ($year == null) {
            if ($censusno != null) {
                $connection = Yii::$app->getDb();
                $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category, eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type, eh.seqi, eh.special_notes from evaluation_header eh, school sc where eh.school_census=sc.cen_no and eh.school_census='" . $censusno . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation';";

                $command = $connection->createCommand($query);

                $headers = $command->queryAll();
            } else {
                if ($sch_cat == null) {
                    if ($zone != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.zone_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.zone_id='" . $zone . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($district != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.dis_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.dis_id='" . $district . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($province != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.pro_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.pro_id='" . $province . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    }
                } else {
                    if ($zone != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.zone_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.zone_id='" . $zone . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($district != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.dis_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.dis_id='" . $district . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($province != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.pro_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.pro_id='" . $province . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "';";

                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    }
                }
            }
        } else {
            if ($censusno != null) {

                $connection = Yii::$app->getDb();
                $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category, eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type, eh.seqi, eh.special_notes from evaluation_header eh, school sc where eh.school_census=sc.cen_no and eh.school_census='" . $censusno . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and eh.evaluation_year='" . $year . "';";
                $command = $connection->createCommand($query);

                $headers = $command->queryAll();
            } else {
                if ($sch_cat == null) {
                    if ($zone != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.zone_id='" . $zone . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($district != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.dis_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.dis_id='" . $district . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($province != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.pro_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.pro_id='" . $province . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    }
                } else {
                    if ($zone != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.zone_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.zone_id='" . $zone . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($district != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.dis_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.dis_id='" . $district . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    } else if ($province != null) {
                        $connection = Yii::$app->getDb();
                        $query = "select eh.header_id,eh.evaluation_type,eh.school_census,sc.school_category,eh.evaluation_year,eh.evaluation_term,eh.evaluated_date,eh.teachers_count,eh.project_type,ez.pro_id, eh.seqi, eh.special_notes from evaluation_header eh, edu_zone ez, school sc where eh.school_census=sc.cen_no and sc.zone_id=ez.zone_id and ez.pro_id='" . $province . "' and eh.project_type='" . $ptype."' and evaluation_type='External Evaluation' and sc.school_category='" . $sch_cat . "' and eh.evaluation_year='" . $year . "';";
                        $command = $connection->createCommand($query);

                        $headers = $command->queryAll();
                    }
                }
            }
        }


        $this->layout = false;
        return $this->render('show-headers', ['headers' => $headers, 'ptype' => $ptype]);
    }
	
	public function actionEvaluationDetails($id){
		$connection = Yii::$app->getDb();
		$query = "select * from genaral_evaluation_detail ged, evaluation_index ei,evaluation_criteria ec where  ged.`evaluation_index_id` = ei.`index_id` and   ei.`criteria_id` = ec.`criteria_id` and ged.`evaluation_header_id`=".$id;
		$command = $connection->createCommand($query);

		$data = $command->queryAll();
    
		return $this->render('evaluation-details', ['evaluationData' => $data]); 
	}
	
	public function actionSubCat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubCatList($cat_id);
                return Json::encode(['output' => $out, 'selected' => '']);
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function getSubCatList($cat_id) {
        $data = District::find()
                        ->where(['pro_id' => $cat_id])
                        ->select(['dis_id AS id', 'dis_name AS name'])->asArray()->all();
        return $data;
    }

    public function actionZone() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getZone($cat_id);
                return Json::encode(['output' => $out, 'selected' => '']);
            }
        }
        return Json::encode(['output' => '', 'selected' => '']);
    }

    public function getZone($dis_id) {
        $data = \common\models\EduZone::find()
                        ->where(['dis_id' => $dis_id])
                        ->select(['zone_id AS id', 'zone_name AS name'])->asArray()->all();
        return $data;
    }

    public function actionSchool() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSchool($cat_id);
                \Yii::$app->response->data = Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => ''], JSON_NUMERIC_CHECK);
    }

    public function getSchool($zoneId) {

        $query = \common\models\School::find()
                        ->leftJoin('institute', 'institute.census_no=school.cen_no')
                        ->where(['=', 'school.zone_id', $zoneId])
                        ->select(['school.cen_no AS id', "concat(institute.name , ' -[ ',  institute.census_no ,' ]' ) AS name"])
                        ->asArray()->all();
        return $query;
    }

    public function actionGetDetails(){
        return $this->render('school-inspection-report-select');        

    }

    public static function getSchoolNameByCensusNo($id) {
        $data = \common\models\School::find()
                ->where(['cen_no' => $id])
                ->select(['school_name'])
                ->one();
        return $data['school_name'];
    }

    public function actionSchoolInspectionReport(){
        $headers=EvaluationHeader::find()->where(['project_type'=>'General','evaluation_type'=>'External Evaluation'])->andWhere(['not', ['seqi' => null]])->asArray()->all();       
        return $this->render('school-inspection-report', ['headers'=>$headers]);
    }
    public function actionShowEvaluationGraphs(){       
        return $this->render('evaluation-graphs',['ptype' => 'General']);
    }

}

?>
