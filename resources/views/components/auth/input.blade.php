<div {{ $attributes->merge(['class' => "fromGroup"]) }}>
    <label class="block capitalize form-label">{{ $label }}</label>
    <div class="relative ">
        <input type="{{$type}}" name="{{$name}}" class="form-control py-2" placeholder="{{$placeholder}}"
            value="{{$value}}">
    </div>
    @error($name)
        <div class="">
            <p class="" style="color: red; font-size:13px; font-weigth:300">
                {{ $message }}
            </p>
        </div>
    @enderror
</div>