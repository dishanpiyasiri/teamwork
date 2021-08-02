<?php $this->title = ""; ?>


<div class="panel-group"> 
<div class="panel panel-default">

<div class="panel-body">
	<h3>
		Evaluation Details
	</h3>
	<br>
    	
	<table id="details" class="table table-bordered table-stripped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Criteria</th>
                                <th>Index</th>
                            	<th>Strengths</th>
                                <th>Problems</th>
                                <th>Recommendations</th>
                                <th>Implementing Institute</th>
                                <th>Implemrnting Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $currCriId = '';
                            foreach ($evaluationData as $evaluation) {
                                ?>
                                
                                <tr>
                                                               
                                
                                <?php 
                                    if($currCriId!=$evaluation['criteria_id']){

                                ?>
                                
                                    <td>
                                        <?= $evaluation['criteria_name_sinhala']; ?>
                                    </td>
                                    
                               
                                
                                <?php 
                                        $currCriId= $evaluation['criteria_id'];
                                    }else{
                                         
                                        ?>

                                        <td>
                                            &nbsp;
                                        </td>

                                        <?php
                                    }
                                    
                                ?>
                                    <td>
                                        <?= $evaluation['index_name_sinhala']; ?>
                                    </td>
                                	<td><?= $evaluation['investigated_strenths']; ?></td>
                                    <td><?= $evaluation['investigated_problems']; ?> </td>
                                    <td><?= $evaluation['recommandations']; ?></td>
                                    <td><?= $evaluation['implementing_type']; ?></td>
                                    <td><?= $evaluation['implementing_time']; ?> </td>
                                </tr>
                                <?php
                                   
                                
                            }
                            
                            ?>
                        </tbody>

                    </table>
</div>

</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#details').DataTable( {
        'searching': false,
        'ordering':false,
        'responsive':true,
        'dom': 'Bfrtip',
        'buttons': [
            'excel','copy','print'
        ]
    } );
} );
</script>