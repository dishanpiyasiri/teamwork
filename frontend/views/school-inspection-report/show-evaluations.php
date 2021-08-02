<?php

use common\models\EvaluationInstruction;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\School;
use kartik\depdrop\DepDrop;
use common\models\Province;

$this->title = "School Evaluation Management System";

?>

<div class="panel-group"> 
<div class="panel panel-default">

<div class="panel-body">

                <?php $form = ActiveForm::begin([
                  'id' => 'step1',
                  'enableAjaxValidation' => FALSE,
                  'enableClientValidation' => true,
                  'options' => ['enctype' => 'multipart/form-data'], // important
              ]);
              ?> 
    
            <div class="box-body">
        <div class="row">
    <!--    // Top most parent-->
    <div class="col-lg-4">  
        <?= $form->field($school, 'province_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Province::find()->asArray()->all(), 'pro_id', 'pro_name')
        ]); ?>
    </div>
    <!--// Child level 1-->
    <div class="col-lg-4">
        <?= $form->field($school, 'district_id')->widget(DepDrop::classname(), [
    //        'data' => [1 => 'Colombo'],
            'options' => ['placeholder' => 'Select ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => [Html::getInputId($school, 'province_id')],
                'url' => Url::to(['/school-inspection-report/sub-cat']),
                'loadingText' => 'Loading child level 1 ...',
            ]
        ]);?>
    </div>
    <!--// Child level 2-->
    <div class="col-lg-4">
        <?= $form->field($school, 'zone_id')->widget(DepDrop::classname(), [
//            'data' => [1 => 'Colombo'],
            'options' => ['placeholder' => 'Select ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => [Html::getInputId($school, 'district_id')],
                'url' => Url::to(['/school-inspection-report/zone']),
                'loadingText' => 'Loading child level 2 ...',
            ]
        ]);?>
    </div>
        </div>
    <!--// Child level 3-->
    <div class="row">

    <div class="col-lg-4">

        <?php echo $form->field($school, 'school_category')->dropdownList([
        '1AB' => '1AB',
        '1C' => '1C',
        '2' => '2',
        '3' => '3'],
        ['prompt'=>'Select ...'])->label('School Category');
 ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($school, 'cen_no')->widget(DepDrop::classname(), [
    //        'data' => [1 => 'DE LA SALLE COLLEGE'],
            'options' => ['placeholder' => 'Select ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => [Html::getInputId($school, 'zone_id')],
                'initialize' => true,
                'initDepends' => [Html::getInputId($school, 'province_id')],
                'url' => Url::to(['/school-inspection-report/school']),
                'loadingText' => 'Loading child level 3 ...',                
            ]
        ])->label('Census No');
        ?>
    </div>
    
    <div class="col-lg-4">
        <div class="form-group">
            <label class="control-label" for="evaluation-year">Evaluation Year</label>
            <select id="evaluation-year" class="form-control" name="">
              <option value="">Select ...</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
            </select>

            <p class="help-block help-block-error"></p>
        </div>        
    </div>
    </div>
    </div>
    <br>
    <div class="text-right">

        <?= Html::button('Show', ['id'=>'step2','class' => 'btn btn-info','onclick'=>'showHeaders()']) 

        ?>
    </div>    
    
                <?php ActiveForm::end(); ?> 
</div>

</div>
</div>
<div id='details'>
    
</div>


<script type="text/javascript">

function showHeaders(){
    var cen_no=null;
    var zone_id=null;
    var district_id=null;
    var province_id=null;
    var sch_cat=null;
    var year=null;

    if(document.getElementById("school-cen_no").value){
        cen_no=document.getElementById("school-cen_no").value;
    }
    else if(document.getElementById("school-school_category").value){
        sch_cat=document.getElementById("school-school_category").value
    }
    
    if(document.getElementById("school-zone_id").value){
        zone_id=document.getElementById("school-zone_id").value
    }
    else if(document.getElementById("school-district_id").value){
        district_id=document.getElementById("school-district_id").value
    }
    else if(document.getElementById("school-province_id").value){
        province_id=document.getElementById("school-province_id").value
    }
    
    if(document.getElementById("evaluation-year").value){
        year=document.getElementById("evaluation-year").value
    }

    $.ajax({
            type: "GET",
            data: {'censusno':cen_no,'sch_cat':sch_cat,'zone':zone_id,'district':district_id,'province':province_id,'year':year,'ptype':'<?= $ptype ?>'},
            url: 'index.php?r=school-inspection-report/find-evaluation-header',
            beforeSend: function () {

                $('#details').html("");
            },
            success: function (data) {
                $('#details').html(data);
            },
            error: function () {
                
            }
        });
}
</script>