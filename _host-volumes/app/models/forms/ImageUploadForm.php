<?php
namespace app\models\forms;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $picture;

    public function rules()
    {
        return [
            [['picture'], 'safe'],
            [['picture'], 'required'],
            [['picture'], 'file', 'extensions' => 'png'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            return true;
        } else {
            return false;
        }
    }
}
