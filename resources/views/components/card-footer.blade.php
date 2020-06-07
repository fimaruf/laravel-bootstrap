<?php
$classList = [
    "card-footer"
];
if ($bgVariant) {
    $classList[] = "bg-$bgVariant";
}
if ($textVariant) {
    $classList[] = "text-$textVariant";
}
if ($borderVariant) {
    $classList[] = "border-$borderVariant";
}
?>

<{{$tag}} {{$attributes->merge(["class"=>join(" ",$classList)])}}>
{{$slot}}
</{{$tag}}>
