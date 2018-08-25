<div class="row">
    {{-- Courses List Column --}}
    <div class="col col-6">
        {{-- Title Section --}}
        <div class="row mb-3">
            <div class="col col-9">
                <h4>Courses</h4>
            </div>

            {{-- If Sales Loged In, Do Not Show Add Button--}}
            @if (auth()->user()->role != 'sales')
                <div class="col col-3">
                    <a href="/courses/create">
                        <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
                    </a>
                </div>
            @endif
        </div>

        {{-- List Section --}}
        <ul class="list-group list-container">
            @foreach ($courses as $course)
                <a href="/courses/{{$course->id}}">
                    <li class="list-group-item mb-2">
                        <div class="row">
                            <div class="col col-4">
                                <img src="/storage/images/courses/{{$course->image}}" alt="" width="100%">
                            </div>
                            <div class="col col-8">
                                <p>Name: {{$course->name}}</p>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
    {{-- End Courses List Column --}}

    {{-- Students List Column --}}
    <div class="col col-6">
        {{-- Title Section --}}
        <div class="row mb-3">
            <div class="col col-9">
                <h4>Students</h4>
            </div>
            @if (auth()->user()->role != 'sales')
                <div class="col col-3">
                    <a href="/students/create">
                        <img src="/storage/icons/svg/si-glyph-button-plus.svg" class="glyph-icon"/>
                    </a>
                </div>
            @endif
        </div>

        {{-- List Section --}}
        <ul class="list-group list-container">
            @foreach ($students as $student)
                <a href="/students/{{$student->id}}">
                    <li class="list-group-item mb-2">
                        <div class="row">
                            {{-- image --}}
                            <div class="col col-4">
                                <img src="/storage/images/students/{{$student->image}}" alt="" width="100%">
                            </div>
                            
                            {{-- Name/Phone --}}
                            <div class="col col-8">
                                <p>Name: {{$student->name}}</p>
                                <p>Phone: {{$student->phone}}</p>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
    {{-- End Students List Column --}}
</div>