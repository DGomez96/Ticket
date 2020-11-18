@extends('layouts.app')

@section('content')
    @if($user['rol_id'] == '1')
        @include('layouts.partials.content-admin')
    @else
        @include('layouts.partials.content-client')
    @endif

    @include('layouts.partials.modals')
@endsection
