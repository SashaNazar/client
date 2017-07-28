<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SmsForm extends Model
{
    public $text;
    public $receiver;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['text', 'receiver'], 'required'],
        ];
    }
}
