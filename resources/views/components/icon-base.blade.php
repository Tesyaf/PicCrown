@props(['path', 'class' => 'w-4 h-4', 'stroke' => null])

<svg xmlns="http://www.w3.org/2000/svg"
     fill="currentColor"
     viewBox="0 0 24 24"
     {{ $attributes->merge(['class' => "inline-block align-[0.125em] $class"]) }}>
  <path d="{{ $path }}" @if($stroke) stroke="{{ $stroke }}" @endif/>
</svg>