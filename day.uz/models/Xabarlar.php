<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xabarlar".
 *
 * @property int $id
 * @property int $bolim_id
 * @property string $rasm
 * @property string $sarlavha_uz
 * @property string $sarlavha_uzc
 * @property string $sarlavha_en
 * @property string $sarlavha_ru
 * @property string $matn_uz
 * @property string $matn_uzc
 * @property string $matn_en
 * @property string $matn_ru
 * @property string $sana
 */
class Xabarlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $sarlavha_;

    public function bolimuchun()
    {
        return $this->sarlavha_ = "sarlavha_uz";
    }

    public static function tableName()
    {
        return 'xabarlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bolim_id', 'rasm', 'sarlavha_uz', 'sarlavha_uzc', 'sarlavha_en', 'sarlavha_ru', 'matn_uz', 'matn_uzc', 'matn_en', 'matn_ru'], 'required'],
            [['bolim_id'], 'integer'],
            [['matn_uz', 'matn_uzc', 'matn_en', 'matn_ru'], 'string'],
            [['sana'], 'safe'],
            [['sarlavha_uz', 'sarlavha_uzc', 'sarlavha_en', 'sarlavha_ru'], 'string', 'max' => 255],
            [['rasm'], 'file', 'extensions'=>'png, jpg, jpeg, bmp'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bolim_id' => Yii::t('app', "Bo'lim"),
            'rasm' => Yii::t('app', 'Rasm'),
            'sarlavha_uz' => Yii::t('app', 'Sarlavha (lotin)'),
            'sarlavha_uzc' => Yii::t('app', 'Sarlavha (kirill)'),
            'sarlavha_en' => Yii::t('app', 'Sarlavha (ingliz)'),
            'sarlavha_ru' => Yii::t('app', 'Sarlavha (rus)'),
            'matn_uz' => Yii::t('app', 'Matn (lotin)'),
            'matn_uzc' => Yii::t('app', 'Matn (kirill)'),
            'matn_en' => Yii::t('app', 'Matn (ingliz)'),
            'matn_ru' => Yii::t('app', 'Matn (rus)'),
            'sana' => Yii::t('app', 'Sana'),
        ];
    }
    public function getBolimlar()
    {
        return $this->hasOne(Bolimlar::className(), ['id' => 'bolim_id']);
    }
}
