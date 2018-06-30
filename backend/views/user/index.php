<?php
use yii\grid\GridView;
use common\models\User;

?>
<?= GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns'=>[
        [
            'attribute'=> 'id'
        ],
        [
            'attribute'=> 'username'
        ],
        [
            'attribute' => 'email',
        ],
        [
            'attribute' => 'status',
            'value' => function($model) {
                if ($model->status == User::STATUS_ACTIVE) {
                    return Yii::t('app', 'Normal');
                } else {
                    return Yii::t('app', 'Disabled');
                }
            },
            'filter' => User::getStatuses(),
        ],
        ['attribute'=> 'created_at'],
        ['attribute'=> 'updated_at']
    ]
])?>
