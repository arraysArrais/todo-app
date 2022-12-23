<div class="inputArea">
    <label for="{{$name}}">
        <input type="checkbox" id="{{$name}}" name="{{$name}}" {{empty($required) ? '': 'required'}} {{$checked ? 'checked' : ''}}>
        {{$label}}
    </label>
    
    
</div>