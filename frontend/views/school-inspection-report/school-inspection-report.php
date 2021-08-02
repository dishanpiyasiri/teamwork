<?php
use yii\helpers\Html;
use backend\controllers\SystemHelper;

$this->title='';
?>

<div class="panel-group"> 
<div class="panel panel-default">

<div class="panel-body">
	<h3>
		School Evaluation Details
	</h3>
	<br>
	
	<table id="details" class="table table-bordered table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                            	<th>Province</th>
                                <th>Zone</th>
                                <th>School</th>
                                <th>Evaluated Date</th>
                                <th>Evaluation Type</th>
                                <th>SEQI</th>
                                <th>Special Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $low = 0;
                            $medium1 = 0;
                            $medium2 = 0;
                            $high = 0 ;
                            foreach ($headers as $header) {
                            	$data=SystemHelper::findSchoolZoneAndProvinceByCensus($header['school_census']);
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
                                	<td><?= $data['pro_name'] ?></td>
                                    <td><?= $data['zone_name'] ?></td>
                                    <td><?= $data['school_name'] ?></td>
                                    <td><?= $header['evaluated_date']; ?></td>
                                    <td><?= $header['evaluation_type']; ?></td>
                                    <td><?= $header['seqi']; ?> </td>
                                    <td><?= $header['special_notes']; ?></td>

                                </tr>

                            <?php } ?>
                                
                        </tbody>

                    </table>
                    <br>
                    <br>
                    <div id="graph1">
        
    </div>


</div>
</div>
</div>

<script>
	$(document).ready(function() {
    $('#details').DataTable( {
        'paging': true,
        'searching': true,
        'ordering': true,
        'responsive': true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ]
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