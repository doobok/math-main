@extends('app-pays')

@section('main')

  <h2 class="text-center mb-5">Оплата замовлення</h2>
  <div class="flex flex-wrap text-gray-600 rounded-2xl border-4 border-yellow-400 bg-yellow-100 border-dashed shadow hover:shadow-lg p-5 justify-center">
    <div class="text-xl font-bold w-full text-center">
      Ваше замовлення від {{$deal->created_at}}
    </div>
    <div class="text-green-400 text-4xl font-bold pt-2">
      <span class="text-lg text-gray-700">до сплати:</span>
      <span>{{$deal->total}}</span>
      <span class="text-lg text-gray-700">грн.</span>
    </div>
    <span class="text-xl text-gray-500 w-full text-center my-4">будь-ласка, оберіть зручний спосіб оплати:</span>
    <div class="flex flex-wrap justify-center">
      <div class="flex flex-wrap content-center mr-2">
        <input class="focus:outline-none focus:ring m-1 inline" type="radio" id="privat">
        <label class="inline" for="privat">На карту Приватбанка</label>
      </div>
      <div class="flex flex-wrap content-center mr-2">
        <input class="focus:outline-none focus:ring m-1 inline" type="radio" id="mono">
        <label class="inline" for="mono">На карту Монобанка</label>
      </div>

    </div>

  </div>

@endsection
