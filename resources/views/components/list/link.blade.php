@props(['link', 'name'])
<a href="{{ '/'.  $link }}" class="{{ request()->is($link) ? 'text-blue-500' : '' }}">{{ $name }}</a>
