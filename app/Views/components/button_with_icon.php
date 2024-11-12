<?php
$type = $type ?? 'button';
$variant = $variant ?? 'primary';
$icon = $icon ?? null;
$text = $text ?? 'Clique Aqui';
$id = $id ?? 'button';
?>

<button
    type="<?= $type ?>"
    id="<?= $id ?>"
    class="btn-custom btn-custom--<?= $variant ?>">
    <?php if ($icon): ?>
        <i class="ph <?= $icon ?> btn-custom__icon"></i>
    <?php endif; ?>
    <?= $text ?>
</button>