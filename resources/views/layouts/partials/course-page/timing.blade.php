@if ($days > 0)
  <h3>{{__('site.catch-subscribe')}}</h3>

  <div class="flex flex-wrap justify-center space-x-8 m-2 md:m-8">
    <div class="flex flex-wrap items-center justify-center space-x-4 my-2 p-4 border-4 border-yellow-200 border-dashed rounded-3xl">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-pink-500 h-16 w-16">
        <path d="M15.91 13.34l2.636-4.026-.454-.406-3.673 3.099c-.675-.138-1.402.068-1.894.618-.736.823-.665 2.088.159 2.824.824.736 2.088.665 2.824-.159.492-.55.615-1.295.402-1.95zm-3.91-10.646v-2.694h4v2.694c-1.439-.243-2.592-.238-4 0zm8.851 2.064l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.927-1.5-1.328zm-18.851 4.242h8v2h-8v-2zm-2 4h8v2h-8v-2zm3 4h7v2h-7v-2zm21-3c0 5.523-4.477 10-10 10-2.79 0-5.3-1.155-7.111-3h3.28c1.138.631 2.439 1 3.831 1 4.411 0 8-3.589 8-8s-3.589-8-8-8c-1.392 0-2.693.369-3.831 1h-3.28c1.811-1.845 4.321-3 7.111-3 5.523 0 10 4.477 10 10z"/></svg>
        <span>{{__('site.let-start')}}</span>
        <div class="text-4xl font-bold my-2">
          {{$page->next_start}}
        </div>
      </div>
      <div class="flex flex-wrap items-center justify-center space-x-4 my-2 p-4 border-4 border-blue-200 border-dashed rounded-3xl">
        <span>{{__('site.remains')}}</span>
        <div class="text-4xl font-bold my-2">
          {{$days}}
        </div>
        <span>{{__('site.days')}}</span>
      </div>
    </div>
@else
  <div class="bg-red-100 p-3 md:p-5 w-full border-l-4 border-red-400 my-5">
    <div class="flex space-x-2">

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-red-400 h-8 w-8">
        <path d="M8 0l5.958 8h-3.958l-6-8h4zm6.604 7.194l5.396-7.194h-4l-3.376 4.534 1.98 2.66zm-2.604 4.806c-2.762 0-5 2.239-5 5s2.238 5 5 5 5-2.239 5-5-2.238-5-5-5zm1.854 7.755l-1.854-.992-1.854.992.369-2.07-1.515-1.457 2.083-.287.917-1.892.917 1.892 2.083.287-1.516 1.457.37 2.07zm-1.854-9.755c-3.865 0-7 3.134-7 7s3.135 7 7 7 7-3.134 7-7-3.135-7-7-7zm0 13c-3.314 0-6-2.687-6-6s2.686-6 6-6 6 2.687 6 6-2.686 6-6 6z"/></svg>

      <div class="flex-1 leading-tight">
        <p class="font-bold text-left">{{__('site.course-no-set')}}</p>
        {{__('site.course-no-set-desc')}}
      </div>
    </div>
  </div>

  @if (setting('social.telegram'))
    <a href="{{setting('social.telegram')}}"
      rel="nofollow" target="_blank"
      class="flex flex-wrap items-center justify-center space-x-4 my-2 p-4 border-4 border-blue-200 border-dashed rounded-3xl bg-white hover:bg-blue-100"
      >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-blue-400 h-16 w-16" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
          <path d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z"/></svg>
        <span>{{__('site.catch-subscribe-telegram')}}</span>
    </a>
  @endif

@endif
