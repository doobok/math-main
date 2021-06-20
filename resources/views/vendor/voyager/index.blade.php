@extends('voyager::master')

@section('content')
  <div id="dash">

    <div class="page-content col-md-12">
        <h3>Привіт {{Auth::user()->name}}! </h3>
        <p > Сподіваюсь в тебе сьогодні хороший день. Можливо пора привести в порядок деякі справи? </p>

        <tag-asistant></tag-asistant>

    </div>


  </div>
@stop

@section('javascript')
  <script type="text/javascript" src="{{ mix('vendor/tcg/voyager/assets/js/dash.js') }}"></script>
@stop
