@if ($errors->any())
    <div class="form-froup">
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger text-center">** {{$error}} **</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif