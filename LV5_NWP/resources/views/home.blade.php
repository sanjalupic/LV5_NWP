@extends('layouts.app')

@section('content')
    @if (session()->has('jsAlert'))
        <script>
            const msg = '{{ Session::get('jsAlert') }}';
            const exist = '{{ Session::has('jsAlert') }}';
            if (exist) {
                alert(msg);
            }
        </script>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        {{ __('messages.adminMessage') }}
                    @elseif(auth()->user()->role == 'nastavnik')
                        {{ __('messages.profMessage') }}
                    @elseif(auth()->user()->role == 'student')
                        {{ __('messages.studMessage') }}
                    @else
                        {{ __('messages.guestMessage') }}
                    @endif
                </div>
                @if (auth()->user()->role != 'nastavnik')
                    <div class="card" id="mainContent">
                    @else
                        <div class="card">
                @endif
                @if (auth()->user()->role == 'admin')
                    @foreach ($users as $user)
                        <div class="userInfo">
                            <p><b>User name:</b> {{ $user->name }}</p>
                            <p><b>User Email:</b> {{ $user->email }}</p>
                            <p><b>User Role:</b> {{ $user->role }}</p>
                            <a href="/user/{{ $user->id }}"><button>Update</button></a>
                        </div>
                    @endforeach
                @elseif(auth()->user()->role == 'student')
                    @foreach ($tasks as $index => $task)
                        @if (!$task->izabrani_student)
                            <div id="taskToApply">
                                <p><b>Task name:</b> {{ $task->naziv_rada }}</p>
                                <p><b>Task name(english):</b> {{ $task->naziv_rada_en }}</p>
                                <p><b>Study type:</b> {{ $task->tip_studija }}</p>
                                @foreach ($professors[$index] as $professor)
                                    <p><b>Professor</b> : {{ $professor->name }}</p>
                                @endforeach
                                <a href="/task/{{ $task->id }}"><button>Apply</button></a>
                            </div>
                        @endif
                    @endforeach
                @endif


            </div>
        </div>

    </div>
    </div>
@endsection
