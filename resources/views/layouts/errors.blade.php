@if(count($errors) > 0)
    <div class="form-group">
        <div class="alert alert-danger m-2">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
