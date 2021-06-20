@extends('app')

@section('head')
@component('components.meta')

  @slot('title') Tutor-Math @endslot
  @slot('description') Desc
  @endslot
  @slot('image') /main.png @endslot
  @slot('date') {{config('app.startdate')}} @endslot

@endcomponent
@endsection

@section('main')

  <h1>Page</h1>


@endsection
