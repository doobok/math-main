<section id="prices" class="pb-20 relative block bg-gray-300">
  <div
    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
    style="height: 80px;"
  >
    <svg
      class="absolute bottom-0 overflow-hidden"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
      version="1.1"
      viewBox="0 0 2560 100"
      x="0"
      y="0"
    >
      <polygon
        class="text-gray-300 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
  <div class="container mx-auto px-4 pt-16 md:pb-12 lg:pt-24 lg:pb-24">

    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold">{{__('site.course-price')}}</h2>
        <p class="text-lg leading-relaxed mt-4">
          {{__('site.course-price-desc')}} *
        </p>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-center my-4 md:my-10">

    {{-- simple --}}
    <div class="flex flex-col bg-white lg:w-1/3 w-full mx-auto lg:mx-0 rounded-lg lg:rounded-l-lg mt-4 shadow hover:shadow-lg">
      <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
        <div class="p-8 text-3xl font-bold text-center border-b-4 flex flex-wrap justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor">
            <path d="M14.003 17.23c-.178.247-1.456.922-1.462-.396v-.464c.43-.208.731-.634.731-1.015 0-.526-.571-.762-1.272-.762-.701 0-1.271.236-1.271.762 0 .377.294.796.717 1.007v.472c-.008 1.227-1.18.829-1.392.453-.404-.716-1.249-.153-.94.423.29.541 1.001.918 1.73.918.446 0 .848-.146 1.149-.416.302.27.703.416 1.15.416.727 0 1.439-.377 1.729-.918.316-.584-.417-1.105-.869-.48zm.997-5.73c-.459 0-.833.374-.833.834 0 .459.374.833.833.833.459 0 .833-.374.833-.833 0-.46-.374-.834-.833-.834zm0 2.667c-1.011 0-1.833-.823-1.833-1.833 0-1.012.822-1.834 1.833-1.834 1.011 0 1.833.822 1.833 1.834 0 1.01-.822 1.833-1.833 1.833zm-6-2.667c-.459 0-.833.374-.833.834 0 .459.374.833.833.833.46 0 .834-.374.834-.833 0-.46-.374-.834-.834-.834zm0 2.667c-1.011 0-1.833-.823-1.833-1.833 0-1.012.822-1.834 1.833-1.834 1.011 0 1.834.822 1.834 1.834 0 1.01-.823 1.833-1.834 1.833zm1.545-5.66c.772-.195 2.101-.198 2.909 0 .977-1.478 1.643-2.298 3.03-3.507 2.7 3.301 3.762 9.095 4.196 13.732-2.015 2.591-5.152 4.268-8.68 4.268-3.56 0-6.721-1.708-8.733-4.339.347-4.718 1.237-10.618 3.733-13.661 1.469 1.16 2.426 2.15 3.545 3.507zm1.455-8.507c-6.623 0-12 5.376-12 12 0 6.623 5.377 12 12 12s12-5.377 12-12c0-6.624-5.377-12-12-12z"/>
          </svg>
          <span>{{__('site.course-simple')}}</span>
        </div>
        <ul class="w-full text-center text-sm">
          <div class="w-full pt-6 text-4xl text-gray-600 font-bold text-center py-4 flex justify-center">
              <div class="rounded-full bg-green-200 py-4 px-10">
                {{ number_format($page->price, 0, ',', ' ')}}
                <span class="text-base">грн.</span>
              </div>
          </div>
          <li class="py-4 border-b mx-4 text-base">
            {{$page->getTranslatedAttribute('price_desc')}}
          </li>
        </ul>
      </div>
      <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
        <div class="flex items-center justify-center relative">
          @if (setting('info.payment'))
            <img class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
          @endif
          <smpl-buttoncrs price="{{$page->price}}" txt="Курс «{{$page->getTranslatedAttribute('h1') . ' (' . __('site.course-simple') . ')'}}»"></smpl-buttoncrs>
        </div>
      </div>
    </div>

    {{-- extra --}}
    @if ($page->price_extra > 0)
      <div class="flex flex-col bg-white lg:w-1/3 w-full mx-auto lg:mx-0 rounded-lg lg:rounded-l-lg mt-4 shadow hover:shadow-lg">
        <div class="flex-1 bg-green-100 text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
          <div class="p-8 text-3xl font-bold text-center border-b-4 border-green-300 flex flex-wrap justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor">
              <path d="M11.954 11c3.33 0 7.057 6.123 7.632 8.716.575 2.594-.996 4.729-3.484 4.112-1.092-.271-3.252-1.307-4.102-1.291-.925.016-2.379.836-3.587 1.252-2.657.916-4.717-1.283-4.01-4.073.774-3.051 4.48-8.716 7.551-8.716zm10.793-4.39c1.188.539 1.629 2.82.894 5.27-.704 2.341-2.33 3.806-4.556 2.796-1.931-.877-2.158-3.178-.894-5.27 1.274-2.107 3.367-3.336 4.556-2.796zm-21.968.706c-1.044.729-1.06 2.996.082 5.215 1.092 2.12 2.913 3.236 4.868 1.87 1.696-1.185 1.504-3.433-.082-5.215-1.596-1.793-3.824-2.599-4.868-1.87zm15.643-7.292c1.323.251 2.321 2.428 2.182 5.062-.134 2.517-1.405 4.382-3.882 3.912-2.149-.407-2.938-2.657-2.181-5.061.761-2.421 2.559-4.164 3.881-3.913zm-10.295.058c-1.268.451-1.92 2.756-1.377 5.337.519 2.467 2.062 4.114 4.437 3.269 2.06-.732 2.494-3.077 1.377-5.336-1.125-2.276-3.169-3.721-4.437-3.27z"/>
            </svg>
            <span>{{__('site.course-extra')}}</span>
          </div>
          <ul class="w-full text-center text-sm">
            <div class="w-full pt-6 text-4xl text-gray-600 font-bold text-center py-4 flex justify-center">
                <div class="rounded-full bg-yellow-200 py-4 px-10">
                  {{ number_format($page->price_extra, 0, ',', ' ')}}
                  <span class="text-base">грн.</span>
                </div>
            </div>
            <li class="py-4 border-b border-green-300 mx-4 text-base">
              {{__('site.course-all-that-and')}} "{{__('site.course-simple')}}" + <br>
              {{$page->getTranslatedAttribute('price_extra_desc')}}
            </li>
          </ul>
        </div>
        <div class="flex-none mt-auto bg-green-100 rounded-b rounded-t-none overflow-hidden shadow p-6">
          <div class="flex items-center justify-center relative">
            @if (setting('info.payment'))
              <img class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
            @endif
            <smpl-buttoncrs price="{{$page->price_extra}}" txt="Курс «{{$page->getTranslatedAttribute('h1') . ' (' . __('site.course-extra') . ')'}}»"></smpl-buttoncrs>
          </div>
        </div>
      </div>
    @endif

    {{-- vip --}}
    @if ($page->price_vip > 0)
      <div class="flex flex-col bg-yellow-400 lg:w-1/3 w-full mx-auto lg:mx-0 rounded-lg lg:rounded-l-lg mt-4 shadow hover:shadow-lg">
        <div class="flex-1 bg-yellow-200 text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
          <div class="p-8 text-3xl font-bold text-center border-b-4 border-yellow-400 flex flex-wrap justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor">
              <path d="M3 16l-3-10 7.104 4 4.896-8 4.896 8 7.104-4-3 10h-18zm0 2v4h18v-4h-18z"/>
            </svg>
            <span>{{__('site.course-vip')}}</span>
          </div>
          <ul class="w-full text-center text-sm">
            <div class="w-full pt-6 text-4xl text-gray-600 font-bold text-center py-4 flex justify-center">
                <div class="rounded-full bg-pink-200 py-4 px-10">
                  {{ number_format($page->price_vip, 0, ',', ' ')}}
                  <span class="text-base">грн.</span>
                </div>
            </div>
            <li class="py-4 border-b border-yellow-400 mx-4 text-base">
              {{__('site.course-all-that-and')}} "{{__('site.course-extra')}}" + <br>
              {{$page->getTranslatedAttribute('price_vip_desc')}}
            </li>
          </ul>
        </div>
        <div class="flex-none mt-auto bg-yellow-200 rounded-b rounded-t-none overflow-hidden shadow p-6">
          <div class="flex items-center justify-center relative">
            @if (setting('info.payment'))
              <img class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
            @endif
            <smpl-buttoncrs price="{{$page->price_vip}}" txt="Курс «{{$page->getTranslatedAttribute('h1') . ' (' . __('site.course-vip') . ')'}}»"></smpl-buttoncrs>
          </div>
        </div>
      </div>
    @endif
    </div>
    <div class="text-sm pt-4 text-center">
      * {{__('site.course-price-post-desc')}}
    </div>
  </div>
</section>
