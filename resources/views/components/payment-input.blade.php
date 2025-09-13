<input
    {{$attributes}}
    class="form-check-input"
    {{ old('payment_method') == $attributes->get('value') ? 'checked' : ''  }}
/>
