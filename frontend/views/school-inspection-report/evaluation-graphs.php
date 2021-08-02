<?php
  
  use backend\controllers\SystemHelper;

  use backend\assets\HighChartsAsset;

  HighChartsAsset::register($this);
  $this->title = 'General Evaluations';
?>
<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<br>
<br>

<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<script>

// Create the chart
Highcharts.chart('container1', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Number of Evaluated Schools for <?php echo $ptype; ?> Evaluations - <?php echo date("Y") ."<br>Total Schools - ".SystemHelper::totalEvaluatedSchoolCount($ptype,'External Evaluation');  ?>'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
        type: 'category'
    },
  yAxis: {
    title: {
      text: 'Total'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: false,
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
  },

  series: [
    {
      name: "Province",
      colorByPoint: true,
      data: [
        {
          name: "Western Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(1,$ptype,'External Evaluation'); ?>,
          drilldown: "Western Province"
        },
        {
          name: "Central Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(2,$ptype,'External Evaluation'); ?>,
          drilldown: "Central Province"
        },
        {
          name: "Southern Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(3,$ptype,'External Evaluation'); ?>,
          drilldown: "Southern Province"
        },
        {
          name: "Nothern Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(4,$ptype,'External Evaluation'); ?>,
          drilldown: "Nothern Province"
        },
        {
          name: "Eastern Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(5,$ptype,'External Evaluation'); ?>,
          drilldown: "Eastern Province"
        },
        {
          name: "North Western Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(6,$ptype,'External Evaluation'); ?>,
          drilldown: "North Western Province"
        },
        {
          name: "North Central Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(7,$ptype,'External Evaluation'); ?>,
          drilldown: "North Central Province"
        },
        {
          name: "Uva Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(8,$ptype,'External Evaluation'); ?>,
          drilldown: 'Uva Province'
        },
        {
          name: "Sabaragamuwa Province",
          y: <?php echo SystemHelper::provinceEvalSchoolCount(9,$ptype,'External Evaluation'); ?>,
          drilldown: "Sabaragamuwa Province"
        }
      ]
    }
  ],
  drilldown: {
    
    series: [
      {
        name: "Western Province",
        id: "Western Province",
        data: [
        <?php $zones = SystemHelper::getZonesByProvinceId(1);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
            ]
      },
      {
        name: "Central Province",
        id: "Central Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(2);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Southern Province",
        id: "Southern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(3);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Nothern Province",
        id: "Nothern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(4);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Eastern Province",
        id: "Eastern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(5);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "North Western Province",
        id: "North Western Province",
        data: [
         <?php $zones = SystemHelper::getZonesByProvinceId(6);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "North Central Province",
        id: "North Central Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(7);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Uva Province",
        id: "Uva Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(8);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Sabaragamuwa Province",
        id: "Sabaragamuwa Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(9);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalSchoolCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
    ]
  }

});

//------------------------------------------------

Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Number of <?php echo $ptype; ?> Evaluations - <?php echo date("Y") ."<br>Total Evaluations - ".SystemHelper::totalEvaluationCount($ptype,'External Evaluation');  ?>'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
        type: 'category'
    },
  yAxis: {
    title: {
      text: 'Total'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: false,
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
  },

  series: [
    {
      name: "Province",
      colorByPoint: true,
      data: [
        {
          name: "Western Province",
          y: <?php echo SystemHelper::provinceEvalCount(1,$ptype,'External Evaluation'); ?>,
          drilldown: "Western Province"
        },
        {
          name: "Central Province",
          y: <?php echo SystemHelper::provinceEvalCount(2,$ptype,'External Evaluation'); ?>,
          drilldown: "Central Province"
        },
        {
          name: "Southern Province",
          y: <?php echo SystemHelper::provinceEvalCount(3,$ptype,'External Evaluation'); ?>,
          drilldown: "Southern Province"
        },
        {
          name: "Nothern Province",
          y: <?php echo SystemHelper::provinceEvalCount(4,$ptype,'External Evaluation'); ?>,
          drilldown: "Nothern Province"
        },
        {
          name: "Eastern Province",
          y: <?php echo SystemHelper::provinceEvalCount(5,$ptype,'External Evaluation'); ?>,
          drilldown: "Eastern Province"
        },
        {
          name: "North Western Province",
          y: <?php echo SystemHelper::provinceEvalCount(6,$ptype,'External Evaluation'); ?>,
          drilldown: "North Western Province"
        },
        {
          name: "North Central Province",
          y: <?php echo SystemHelper::provinceEvalCount(7,$ptype,'External Evaluation'); ?>,
          drilldown: "North Central Province"
        },
        {
          name: "Uva Province",
          y: <?php echo SystemHelper::provinceEvalCount(8,$ptype,'External Evaluation'); ?>,
          drilldown: 'Uva Province'
        },
        {
          name: "Sabaragamuwa Province",
          y: <?php echo SystemHelper::provinceEvalCount(9,$ptype,'External Evaluation'); ?>,
          drilldown: "Sabaragamuwa Province"
        }
      ]
    }
  ],
  drilldown: {
    
    series: [
      {
        name: "Western Province",
        id: "Western Province",
        data: [
        <?php $zones = SystemHelper::getZonesByProvinceId(1);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
            ]
      },
      {
        name: "Central Province",
        id: "Central Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(2);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Southern Province",
        id: "Southern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(3);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Nothern Province",
        id: "Nothern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(4);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Eastern Province",
        id: "Eastern Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(5);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "North Western Province",
        id: "North Western Province",
        data: [
         <?php $zones = SystemHelper::getZonesByProvinceId(6);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "North Central Province",
        id: "North Central Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(7);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Uva Province",
        id: "Uva Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(8);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
      {
        name: "Sabaragamuwa Province",
        id: "Sabaragamuwa Province",
        data: [
          <?php $zones = SystemHelper::getZonesByProvinceId(9);

          foreach ($zones as $zone) {          

        ?>
        
          [
            '<?= $zone['zone_name']; ?>',
            <?= SystemHelper::zoneEvalCount($zone['zone_id'],$ptype,'External Evaluation');?>
          ],
        
        <?php 
              }
            ?>
        ]
      },
    ]
  }

});
</script>
