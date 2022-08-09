@props(['classes'])
<?php
$class = $class ?? '';
?>
<svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" 
stroke="currentColor" stroke-width="2" role="button"  {{ $attributes->merge(['class' => 'h-8 w-8 ']) }}>
<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
</svg>