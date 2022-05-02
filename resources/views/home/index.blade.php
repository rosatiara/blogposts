@extends('layout.app')
@section('title', 'Home page')
@section('content')
    <div>
        <p>
            <h5>GIPE 2022 - {{_('Hello!')}}
            <hr>
            {{__('This is our home page!')}}
            </h5>
        </p>
    </div>
@endsection
{{-- use double underscore (__) followed by a key in brackets to tell
    Laravel that it should look for translations! --}}
