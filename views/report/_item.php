<?php
use dosamigos\tinymce\TinyMce;

?>

<td>
       <?=$model->nisn?>
   </td> 
<td>
    <?=$model->nama_murid?>
</td>

<td>

<?= $form->field($model, "[$key]hasil_report")->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'id',
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic subscript superscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]]) ->label(false) ?>
<?=$form->field($model, "[$key]id_murid")->hiddenInput()->label(false)?>


</td>