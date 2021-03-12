<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view".
 *
 * @property int $id
 * @property int $xabar_id
 * @property int $soni
 */
class View extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xabar_id', 'soni'], 'required'],
            [['xabar_id', 'soni'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xabar_id' => 'Xabar ID',
            'soni' => 'Soni',
        ];
    }
}
