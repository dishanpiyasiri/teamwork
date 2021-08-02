  
      <?php
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */

			$url1=$_SERVER['REQUEST_URI'];
            $url2= str_replace('frontend', 'backend', $url1);
            $query_text = '?'.$_SERVER['QUERY_STRING'];
            $url3= str_replace($query_text, '', $url2);
            $url= 'http://'.Yii::$app->request->serverName.$url3;

?>




<style type="text/css">
    .btn-link:hover,.text-white{
        color: white;
    }
</style>

<header class="main-header">

 <?= Html::a('<span class="logo-mini">SE</span><span class="logo-lg">' . 'School Evaluations' . '</span>', $url, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            
        </div>
    </nav>
</header>
