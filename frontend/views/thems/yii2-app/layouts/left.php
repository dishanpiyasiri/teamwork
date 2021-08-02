<?php
?>
<aside class="main-sidebar">

    <section class="sidebar">
        
        <?php
            $url1=$_SERVER['REQUEST_URI'];
            $url2= str_replace('frontend', 'backend', $url1);
            $query_text = '?'.$_SERVER['QUERY_STRING'];
            $url3= str_replace($query_text, '', $url2);
            $url= 'https://'.Yii::$app->request->serverName.$url3;

         if (!Yii::$app->user->isGuest) {}
         else{
           
        ?>
        
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        
                        [
                            'label' => 'Home',
                            'icon' => 'home',
                            'url' => '?r=school-inspection-report/get-details',
                            
                        ],                        
                        [
                            'label' => 'Evaluation Report',
                            'icon' => 'list-alt',
                            'url' => '?r=school-inspection-report/school-inspection-report',
                           
                        ],
                        [
                            'label' => 'Graphs',
                            'icon' => 'line-chart',
                            'url' => '?r=school-inspection-report/show-evaluation-graphs',
                           
                        ],
                        [
                            'label' => 'Login',
                            'icon' => 'sign-in',
                            'url' => $url,
                            
                        ]
//                        [
//                            'label' => 'Evaluation',
//                            'icon' => 'users',
//                            'url' => '/#',
//                            'items' => [
//                                ['label' => 'Inspectorate', 'icon' => 'child', 'url' => ['/inspection/genaral-inspection'],],
//                                ['label' => 'GEM', 'icon' => 'dashboard', 'url' => ['/inspection'],],
// 
//                            ],
//                        ],
                       
                        
                    ],
                ]
        )
        ?>
        <?php
        
         }
        ?>
    </section>
</aside>



