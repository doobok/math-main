<div class="hidden lg:block my-5 sticky top-2 z-50">

<ul class="flex flex-wrap justify-center">

  @foreach (menu('main_menu', '_json')->translate( App::currentLocale() ) as $menuitem)
    <li class="relative group">
    <a href="{{route('page', $menuitem->url)}}"
      class="bg-gray-700 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 flex"
      style="transition: all 0.15s ease 0s;"
    >
    @if ($menuitem->icon_class)
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="mr-1">
        {!!$menuitem->icon_class!!}
      </svg>
    @endif
      {{$menuitem->title}}
    </a>
    @if ( count($menuitem->children) > 0 )
      <ul class="absolute left-0 top-0 mt-8 p-2 rounded-lg shadow-lg bg-white z-10 hidden group-hover:block w-60">
          <svg class="block fill-current text-white w-4 h-4 absolute left-0 top-0 ml-3 -mt-3 z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path></svg>
          @foreach ($menuitem->children->translate( App::currentLocale() ) as $subitem)
            <a href="{{route('page', $subitem->url)}}">
            <li class="p-2 py-3 text-gray-700 hover:bg-gray-700 hover:text-white font-bold text-xs uppercase rounded flex">
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
    @endif
  </li>
  @endforeach

</ul>
</div>
