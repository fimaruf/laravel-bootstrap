<?php
$classList = ['form-control'];
if ($size) {
    $classList[] = "form-control-$size";
}

$attrs = $attributes->merge([
    'class' => join(' ', $classList),
    'type' => $type ?? 'text'
]);
?>
<input {{$attrs}} />
