<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\controllers\SystemHelper;
?>
<div class="panel-group"> 
<div class="panel panel-default">

<div class="panel-body">
	<h3>
		Evalution Headers
	</h3>
	<br>
	
	<table id="headers" class="table table-bordered table-striped display nowrap" style="width:100%">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th>Evaluation Type</th>
                                <th>School Census</th>
                                <th>School Name</th>
                                <th>School Category</th>
                                <th>Year</th>
                                <th>Term</th>
                                <th>Evaluated Date</th>
                                <th>No of Teachers</th>
                                <th>Project Type</th>
                                <th>SEQI</th>
                                <th>Special Notes</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                             $low = 0;
                            $medium1 = 0;
                            $medium2 = 0;
                            $high = 0 ;

                            foreach ($headers as $header) {
                                if($header['seqi']!=''){
                                    if(0<=$header['seqi']&&$header['seqi']<=39){
                                        $low=$low+1;
                                    }
                                    if(40<=$header['seqi']&&$header['seqi']<=59){
                                        $medium1=$medium1+1;
                                    }
                                    if(60<=$header['seqi']&&$header['seqi']<=79){
                                        $medium2=$medium2+1;
                                    }
                                    if(80<=$header['seqi']&&$header['seqi']<=100){
                                        $high=$high+1;
                                    }
                                }
                                ?>
                                <tr>
                                	<td><?= $x; ?></td>
                                    <td><?= $header['evaluation_type']; ?></td>
                                    <td><?= $header['school_census']; ?></td>
                                    <td><?= SystemHelper::getSchoolNameByCensusNo($header['school_census'])?></td>
                                    <td><?= $header['evaluation_year']; ?> </td>
                                    <td><?= $header['school_category']; ?></td>
                                    <td><?= $header['evaluation_term']; ?></td>
                                    <td><?= $header['evaluated_date']; ?></td>
                                    <td><?= $header['teachers_count']; ?> </td>
                                    <td><?= $header['project_type']; ?></td>
                                    <td><?= $header['seqi']; ?></td>
                                    <td><?= $header['special_notes']; ?></td>
                                    
                                    <td> 
                                        <div class="btn-group">
                                            <?php 
                                                                                        
											echo Html::a('', url::toRoute(['school-inspection-report/evaluation-details', 'id' =>$header['header_id']]), ['target'=>'_blank','class'=>'btn btn-warning glyphicon glyphicon-eye-open']);                
                                            
                                             ?>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                //    echo $row->institute_id;
                                $x = $x + 1;
                            }
                            
                            ?>
                        </tbody>

                    </table>
                    <br>
                    <br>
   
    <div id="graph1">
        
    </div>
</div>

</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#headers').DataTable( {
        'paging': true,
        'searching': true,
        'ordering': true,
        'responsive': true,
        'dom': 'Bfrtip',
        'buttons': [
            'excel','print'
        ],
    } );
} );
</script>

<script>
    Highcharts.chart('graph1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Evaluation Counts according to SEQI'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: 0,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Evaluation Count'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Number of Evaluations: <b>{point.y:1.0f}</b>'
    },
    series: [{
        name: 'Evaluation Count',
        data: [
            ['0-39', <?= $low ?>],
            ['40-59', <?= $medium1 ?>],
            ['60-79', <?= $medium2 ?>],
            ['80-100', <?= $high ?>],
            
        ],
        dataLabels: {
            enabled: true,
            rotation: 0,
            color: '#FFFFFF',
            align: 'center',
            format: '{point.y:1.0f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]

});
</script>