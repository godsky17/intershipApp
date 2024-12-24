<form {{ $attributes->merge(['class' => "space-y-4"])}}  action="{{ $action }}" method="{{ $method }}">
    @csrf
   {{ $slot }}
</form>