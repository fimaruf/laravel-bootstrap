<?php
$classList = [
    "btn-group"
];
if ($size) {
    $classList[] = "btn-group-$size";
}
if ($vertical) {
    $classList[] = "btn-group-vertical";
}
$attrs = [
    "class" => join(" ", $classList),
    "role" => $role
];

if ($ariaLabel) {
    $attrs["aria-label"] = $ariaLabel;
}
?>

<div {{$attributes->merge($attrs)}}>
    {{$slot}}
</div>
