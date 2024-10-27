@props([
    'lable' => null ,
    'name' ,
    'placeholder' => null,
    'type' => 'text',
    'value'])

<label for="">{{$lable}}</label>
<input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control mb-2" value="{{ $value }}">
@error($name)
    <h6 class="text-danger">{{ $message }}</h6>
@enderror
