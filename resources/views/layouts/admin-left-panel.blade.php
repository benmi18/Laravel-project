{{-- Title Section --}}
<div class="row mb-2">
    <div class="col col-9">
        <h4>Admins</h4>
    </div>
    <div class="col col-3">
        <a href="/users/create">
            <img src="/storage/images/plus.png" width="65%">
        </a>
    </div>
</div>

{{-- List Section --}}
<ul class="list-group">
    @foreach ($users as $user)
        <a href="/users/{{$user->id}}">
            <li class="list-group-item mb-2">
                <div class="row">
                    {{-- image --}}
                    <div class="col col-4">
                        <img src="/storage/images/users/{{$user->image}}" alt="" width="100%">
                    </div>
                    
                    {{-- Name/Phone --}}
                    <div class="col col-8">
                        <p>Name: {{$user->name}}</p>
                        <p>Role: {{$user->role}}</p>
                    </div>
                </div>
            </li>
        </a>
    @endforeach
</ul>