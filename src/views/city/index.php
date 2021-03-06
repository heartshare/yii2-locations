<?php

/**
 * @author      José Lorente <jose.lorente.martin@gmail.com>
 * @license     The MIT License (MIT)
 * @copyright   José Lorente
 * @version     1.0
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel jlorente\location\models\SearchCity */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('jlorente/location', 'Cities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('jlorente/location', 'Countries'), 'url' => ['country/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->region->country->name, 'url' => ['country/view', 'id' => $searchModel->region->country_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('jlorente/location', 'Regions'), 'url' => ['region/index', 'countryId' => $searchModel->region->country_id]];
$this->params['breadcrumbs'][] = ['label' => $searchModel->region->name, 'url' => ['region/view', 'id' => $searchModel->region_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?=
        Html::a(Yii::t('jlorente/location', 'Create {modelClass}', [
                    'modelClass' => Yii::t('jlorente/location', 'Place')
                ]), ['create', 'regionId' => $searchModel->region_id], [
            'class' => 'btn btn-success'
        ])
        ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'created_at:datetime',
            'created_by',
            'updated_at:datetime',
            'updated_by',
            ['class' => ActionColumn::className()],
        ],
    ]);
    ?>
</div>