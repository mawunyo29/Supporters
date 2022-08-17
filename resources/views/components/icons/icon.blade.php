@props(['icon'])
<?php
$id = md5($icon);
?>
<span {{ $attributes->merge(['class' => 'cursor-pointer material-symbols-outlined ']) }}
    id="{{$id}}">
  
   {{$icon}}
</span>