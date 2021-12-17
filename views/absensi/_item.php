   <td>
       <?=$model->nisn?>
   </td> 
<td>
    <?=$model->nama_murid?>
</td>

<td>

<?= $form->field($model, "[$key]status_kehadiran")->dropdownList([
        'Hadir' => 'Hadir',
        'Sakit' => 'Sakit',
        'Izin' => 'Izin',
        'Alpa' => 'Alpa',
    ], ['prompt' => 'Pilih Status Kehadiran'])->label(false)   ?>

<?=$form->field($model, "[$key]id_murid")->hiddenInput()->label(false)?>


</td>