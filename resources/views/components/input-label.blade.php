@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-neutral-100']) }}>
    {{ $value ?? $slot }}
</label>
