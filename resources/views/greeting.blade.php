@extends('layouts.master')

@section('content')
    <div>
        <a href="{{route('greeting', 'en')}}" class="btn btn-primary">English</a>
        <a href="{{route('greeting', 'ar')}}" class="btn btn-warning">Arabic</a>
    </div>
    <div>
        <div class="display-3 mt-2">{{__('frontend.Welcome to our application!')}}</div>
        <p class="mt-4">{{__('frontend.Laravel localization features provide a convenient way to retrieve strings in various languages, allowing you to easily support multiple languages within your application.')}}</p>

        <div class="row mt-5">
            <ul class="row">
                <li>{{__('frontend.Home')}}</li>
                <li>{{__('frontend.About')}}</li>
                <li>{{__('frontend.Contact')}}</li>
                <li>{{__('frontend.More')}}</li>
            </ul>
        </div>
    </div>

@endsection
