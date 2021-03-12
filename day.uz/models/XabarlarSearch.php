<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Xabarlar;

/**
 * XabarlarSearch represents the model behind the search form of `app\models\Xabarlar`.
 */
class XabarlarSearch extends Xabarlar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bolim_id'], 'integer'],
            [['rasm', 'sarlavha_uz', 'sarlavha_uzc', 'sarlavha_en', 'sarlavha_ru', 'matn_uz', 'matn_uzc', 'matn_en', 'matn_ru', 'sana'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Xabarlar::find();

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
            'bolim_id' => $this->bolim_id,
            'sana' => $this->sana,
        ]);

        $query->andFilterWhere(['like', 'rasm', $this->rasm])
            ->andFilterWhere(['like', 'sarlavha_uz', $this->sarlavha_uz])
            ->andFilterWhere(['like', 'sarlavha_uzc', $this->sarlavha_uzc])
            ->andFilterWhere(['like', 'sarlavha_en', $this->sarlavha_en])
            ->andFilterWhere(['like', 'sarlavha_ru', $this->sarlavha_ru])
            ->andFilterWhere(['like', 'matn_uz', $this->matn_uz])
            ->andFilterWhere(['like', 'matn_uzc', $this->matn_uzc])
            ->andFilterWhere(['like', 'matn_en', $this->matn_en])
            ->andFilterWhere(['like', 'matn_ru', $this->matn_ru]);

        return $dataProvider;
    }
}
