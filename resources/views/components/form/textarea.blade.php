
@props([
    'name', 'value' => '','lable' => false
])

@if ($lable)
<label for="">{{$lable}}</label>
@endif

<textarea  
    name="{{ $name }}" 
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
>{{ old( $name , $value) }}</textarea>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
