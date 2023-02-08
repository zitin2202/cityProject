<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 *
 *
 */
class AdminRequest extends Request
{

    public function rules()
    {
        $rules = parent::rules();
        array_push($rules,
            [['img_after','status',"date_after"],'required']
        );
        return $rules;

    }

}
