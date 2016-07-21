<?php

namespace common\modules\brancon\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\brancon\cms\models\BcwContent;

/**
 * BcwContentSearch represents the model behind the search form about `common\modules\brancon\cms\models\BcwContent`.
 */
class BcwContentSearch extends BcwContent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'FK_pageId', 'created_at', 'position'], 'integer'],
            [['type'], 'string', 'max' => 50],
            [['content'], 'safe'],
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
        $query = BcwContent::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'FK_pageId' => $this->FK_pageId,
            'position' => $this->position,
            'created_at' => $this->created_at,
        ]);
        
        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'content', $this->content]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
