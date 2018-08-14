<div class="row">
    <div class="col col-6">
        <div class="row">
            <div class="col col-9"><p>Courses</p></div>
            <div class="col col-3"><a href="/courses/create">+</a></div>
        </div>
        <ul class="list-group">
            @foreach ($courses as $course)
                <a href="/courses/{{$course->id}}">
                    <li class="list-group-item">
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
    <div class="col col-6">
        <div class="row">
            <div class="col col-9"><p>Students</p></div>
            <div class="col col-3"><a href="/students/create">+</a></div>
        </div>
        <ul class="list-group">
            @foreach ($students as $student)
                <a href="/students/{{$student->id}}">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col col-4">
                                <img src="/storage/images/students/{{$student->image}}" alt="" width="100%">
                            </div>
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
</div>