<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/30
 * Time: 16:25
 */

namespace backend\models\search;

use yii\data\ActiveDataProvider;
class UserSearch extends \backend\models\User
{
    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'string'],
            ['status', 'integer'],
        ];
    }

    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'updated_at' => SORT_DESC,
                    'username' => SORT_ASC,
                ]
            ]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['status' => $this->status]);
        return $dataProvider;
    }
}