<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\base\Exception;
use yii\helpers\FileHelper;

/**
* author zhoushuo <z_s106@126.com>
*/
class Upload extends Model
{
	public $file;
    public $type;   //上传文件类型(1.图片 2.视频)
	private $_appendRules;

	public function init()
	{
		parent::init();
		$extensions = Yii::$app->params['webuploader']['baseConfig']['accept']['extensions'];
		$this->_appendRules = [
			['file','file','extensions' => $extensions]
		];
	}
	public function rules()
	{
		$baseRules = [];
		return array_merge($baseRules,$this->_appendRules);

	}

	 public function upImage ()
    {
        // $model = new static;
        $this->file = UploadedFile::getInstanceByName('file');
        if (!$this->file) {
            return false;
        }
        $relativePath = $successPath = '';
        if ($this->validate()) {
            $dirPath = date('Ymd').'/';
            if(strpos($this->file->type, 'image') === 0)
            {
                $successPath = Yii::$app->params['imageUploadSuccessPath'].$dirPath;
                $this->type = 'image';
            }
            else if(strpos($this->file->type, 'video') === 0)
            {
                $successPath = Yii::$app->params['videoUploadSuccessPath'].$dirPath;
                $this->type = 'video';
            }
            $relativePath = Yii::$app->params['imageUploadRelativePath'].$successPath;
            $fileName = $this->file->baseName . '.' . $this->file->extension;
            $filePath = $relativePath . $fileName;
            if (!is_dir($relativePath)) {
                FileHelper::createDirectory($relativePath);    
            }
            if(!file_exists($filePath))
            {
                $this->file->saveAs($filePath);
            }
            return [
                'code' => 0,
                'url' => Yii::$app->params['domain'] . $successPath. $fileName,
                'attachment' => $successPath. $fileName,
                'type' => $this->type
            ];
        } else {
            $errors = $this->errors;
            return [
                'code' => 1,
                'msg' => current($errors)[0]
            ];
        }
    }




}