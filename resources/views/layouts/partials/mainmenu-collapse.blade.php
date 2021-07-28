<div class="block lg:hidden">

<ul class="flex flex-col list-none">

  @foreach (menu('main_menu', '_json')->translate( App::currentLocale() ) as $menuitem)
    <li class="flex justify-center submenu">
    <a href="{{route('page', $menuitem->url)}}"
      class="text-gray-800 px-3 py-4 flex items-center text-sm uppercase font-bold"
      style="transition: all 0.15s ease 0s;"
    >
    @if ($menuitem->icon_class)
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="mr-1">
        {!!$menuitem->icon_class!!}
      </svg>
    @endif
      {{$menuitem->title}}
    </a>
    {{-- @if ( count($menuitem->children) > 0 )
      <div class="">

      <ul class="p-2 bg-gray-700 z-10 hidden submenu-active:block w-full">

          @foreach ($menuitem->children->translate( App::currentLocale() ) as $subitem)
            <a href="{{route('page', $subitem->url)}}">
            <li class="p-2 py-3 text-white font-bold text-xs uppercase flex">
                @if ($subitem->icon_class)
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
                    {!!$subitem->icon_class!!}
                  </svg>
                @endif
                {{$subitem->title}}
            </li>
          </a>

          @endforeach
      </ul>
    </div>
    @endif --}}
  </li>
  @endforeach

  <div class="flex flex-wrap justify-center my-2">
    <div class="flex items-center mr-1">
      <online-button></online-button>
    </div>
    @if (app()->getLocale() != 'uk')
        <a href="{{route('setlocale', ['lang' => 'uk'])}}" class="text-gray-500 hover:text-gray-300 px-2 py-3 text-sm uppercase font-bold" rel="nofollow">UA</a>
    @endif
    @if (app()->getLocale() != 'ru')
        <a href="{{route('setlocale', ['lang' => 'ru'])}}" class="text-gray-500 hover:text-gray-300 px-2 py-3 text-sm uppercase font-bold" rel="nofollow">RU</a>
    @endif

  </div>

</ul>
</div>
