<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action' => 'images/upload', 'options' => ['enctype' => 'multipart/form-data']]) ?>

　<label for="picture">画像 ※pngのみ</label>
  <input type="file" name="picture" id="picture">
  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
  <br>
  <input type="submit" name="botan" value="send">
  
<?php ActiveForm::end() ?>
