{{-- Title Section --}}
<div class="row mb-3">
    <div class="col col-9">
        <h4>Admins</h4>
    </div>
    <div class="col col-3 w-5">
        <a href="/users/create">
            <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
        </a>
    </div>
</div>

{{-- List Section --}}
<ul class="list-group list-container">
    @foreach ($users as $user)
        {{-- Check if Manager is loged in, then skip the owner print --}}
        @if (auth()->user()->role == 'manager' && $user->role == 'owner')
            @continue
        @endif

        {{-- Print all the users --}}
        <a href="/users/{{$user->id}}">
            <li class="list-group-item mb-2">
                <div class="row">
                    {{-- image --}}
                    <div class="col col-4">
                        <img src="/storage/images/users/{{$user->image}}" alt="" class="display-img">
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