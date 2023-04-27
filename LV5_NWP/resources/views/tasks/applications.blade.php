@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="mainContent">
                    @if (auth()->user()->role == 'nastavnik')
                        @foreach ($tasks as $index => $task)
                            <div id="task">
                                <p><b>Task name:</b> {{ $task->naziv_rada }}</p>
                                <p><b>Task zadatak:</b> {{ $task->zadatak_rada }}</p>
                                <p><b>Study type:</b> {{ $task->tip_studija }}</p>
                                <p><b>Selected student id:</b> {{ $task->izabrani_student }}</p>
                                @if (count($task->studenti) <= 1)
                                    <div id="studentNames">
                                        <p><b>Student name:</b> {{ $students[0]->name }}</p>
                                        <a
                                            href="/task/{{ $task->id }}/{{ $students[0]->id }}"><button>Select</button></a>
                                    </div>
                                @else
                                    @foreach ($students as $student)
                                        <div id="studentNames">
                                            <p><b>Student name:</b> {{ $student->name }}</p>
                                            <a
                                                href="/task/{{ $task->id }}/{{ $student->id }}"><button>Select</button></a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
