<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bolimlar".
 *
 * @property int $id
 * @property string $bolim_nomi_uz
 * @property string $bolim_nomi_uzc
 * @property string $bolim_nomi_ru
 * @property string $bolim_nomi_en
 */
class Bolimlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $bolim_nomi_;

    public static function tableName()
    {
        return 'bolimlar';
    }

    /**
     * {@inheritdoc}
     */
    public function bolimuchun()
    {
        return $this->bolim_nomi_ = "bolim_nomi_uz";
    }
    
    public function rules()
    {
        return [
            [['bolim_nomi_uz', 'bolim_nomi_uzc', 'bolim_nomi_ru', 'bolim_nomi_en'], 'required'],
            [['bolim_nomi_uz', 'bolim_nomi_uzc', 'bolim_nomi_ru', 'bolim_nomi_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bolim_nomi_uz' => Yii::t('app', 'Bolim Nomi Uz'),
            'bolim_nomi_uzc' => Yii::t('app', 'Bolim Nomi Uzc'),
            'bolim_nomi_ru' => Yii::t('app', 'Bolim Nomi Ru'),
            'bolim_nomi_en' => Yii::t('app', 'Bolim Nomi En'),
        ];
    }
}
