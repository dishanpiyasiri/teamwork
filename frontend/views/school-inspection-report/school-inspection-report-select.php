<?php
	use yii\helpers\Html;

  
  use yii\helpers\Url;
  use common\models\EvaluationHeader;

  $this->title = '';
?>

<style type="text/css">
    .small-box{
        width : 230px;
        height: 150px;
    }
    h3,h4{
        color:white;
    }
</style>



<div class="row">            
      <div class="col-lg-4 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                  <a href="<?= Url::to(['school-inspection-report/show','ptype'=> 'General'])?>" target="_blank">
                  <h3>
                      <img style="width:100px" src="img/inspection.png">
                      <span><?= EvaluationHeader::getInspectionCountByProject('General') ?></span>
                  </h3>
                  <h4 style="text-align:center">General Evaluations</h4>
                  </a>
              </div>
          </div>
      </div> 
      <div class="col-lg-4 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-purple">
              <div class="inner">
                  <a href="<?= Url::to(['school-inspection-report/show','ptype'=> 'Gem'])?>" target='_blank'>
                  <h3>
                      <img style="width:85px" src="img/rating.png">
                      <span><?= EvaluationHeader::getInspectionCountByProject('Gem') ?></span>

                  </h3>
                  <h4 style="text-align:center">SEQI</h4>
                  </a>
              </div>
          </div>
      </div>
    </div>