<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn--subtle']) }}>
    {{ $slot }}
</button>
