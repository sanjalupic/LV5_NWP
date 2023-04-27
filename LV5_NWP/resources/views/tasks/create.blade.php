@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 id="headline">{{ __('messages.createTask') }}</h1>

                    <form action="/task" method="POST" id="create_tasks">
                        @csrf
                        @if (auth()->user()->role == 'nastavnik')
                            <label for="naziv_rada">{{ __('messages.taskName') }}</label>
                            <input type="text" name="naziv_rada" id="naziv_rada" required class="formInputs">

                            <label for="naziv_rada_en">{{ __('messages.taskNameEn') }}</label>
                            <input type="text" name="naziv_rada_en" id="naziv_rada_en" required class="formInputs">

                            <label for="zadatak_rada">{{ __('messages.description') }}</label>
                            <textarea name="zadatak_rada" id="zadatak_rada" cols="30" rows="10" required class="formInputs"></textarea>
                            <div id="study_type">
                                <input type="radio" id="type1" name="type" value="stručni">
                                <label for="type1">{{ __('messages.profStudProg') }}</label><br>
                                <input type="radio" id="type2" name="type" value="preddiplomski">
                                <label for="type2">{{ __('messages.undergraduate') }}</label><br>
                                <input type="radio" id="type3" name="type" value="diplomski" checked="checked">
                                <label for="type3">{{ __('messages.graduate') }}</label><br><br>
                            </div>
                        @endif

                        <button type="submit">{{ __('messages.createTask') }}</button>
                    </form>

                </div>
                @if (Config::get('app.locale') == 'en')
                    <a href="/setLang/hr"><button>{{ __('messages.changeLangToCro') }}</button></a>
                @else
                    <a href="/setLang/en"><button>{{ __('messages.changeLangToEng') }}</button></a>
                @endif
            </div>
        </div>
    </div>
@endsection
