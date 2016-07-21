<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\brancon\cms\models\BcwPage;

/**
 * BcwPageSearch represents the model behind the search form about `common\modules\brancon\cms\models\BcwPage`.
 */
class BcwPageSearch extends BcwPage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 225],
            [['id', 'isHome', 'isOnline', 'isMenu', 'menuParent', 'menuPosition', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BcwPage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['menuPosition' => SORT_ASC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere(['like', 'name', $this->name]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'isHome' => $this->isHome,
            'isOnline' => $this->isOnline,
            'isMenu' => $this->isMenu,
            'menuParent' => $this->menuParent,
            'created_at' => $this->created_at,
            'menuPosition' => $this->menuPosition,
        ]);

        return $dataProvider;
    }
}
