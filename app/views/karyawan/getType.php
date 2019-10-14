<label for="IdType">Tipe</label>
<select class="browser-default custom-select" name="IdType" id="IdType">
  <option value="" selected disabled>Pilih Tipe</option>
  <?php
  foreach ($data['typeOption'] as $typeOption) :
    echo '<option value="' . $typeOption['IdType'] . '">' . $typeOption['NmType'] . '</option>';
  endforeach;
  ?>
</select>