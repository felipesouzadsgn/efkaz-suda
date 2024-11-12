<?php
// Valores padrão para as variáveis
$id = isset($id) ? $id : 'input';
$type = isset($type) ? $type : 'text';
$name = isset($name) ? $name : 'nome';
$value = isset($value) ? $value : ''; 
$icon = $icon ?? null; 
$label = isset($label) ? $label : 'Como podemos te chamar?';
$placeholder = isset($placeholder) ? $placeholder : 'Digite seu nome';
$required = isset($required) && $required === true ? 'required' : '';
$maxlength = isset($maxlength) ? 'maxlength="' . $maxlength . '"' : ''; // Atributo maxlength dinâmico
$hasIcon = $icon ? true : false; // Verificar se tem ícone
?>

<div class="input-group">
  <label for="<?= $id ?>" class="input-group__label"><?= $label ?></label>
  <div class="input">
    <?php if ($hasIcon): ?>
      <i class="ph <?= $icon ?> input__icon" onclick="document.getElementById('<?= $id ?>').focus();"></i>
    <?php endif; ?>
    <input
      id="<?= $id ?>"
      type="<?= $type ?>"
      name="<?= $name ?>"
      value="<?= $value ?>"
      class="input__field <?= $hasIcon ? 'input--with-icon' : 'input--no-icon' ?>"
      placeholder="<?= $placeholder ?>"
      <?= $required ?>
      <?= $maxlength ?>
      <?= $type === 'date' ? 'onfocus="this.showPicker()"' : '' ?>>
  </div>
</div>
