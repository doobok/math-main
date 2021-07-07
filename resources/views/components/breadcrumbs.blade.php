<section class="py-4">
  <div class="px-2">
      <ol itemscope type="none" itemtype="https://schema.org/BreadcrumbList" class="list-reset py-4 flex flex-inline overflow-x-auto text-gray-500">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"
            class="whitespace-nowrap pr-2 hover:text-green-500"><a href="{{route('mainpage')}}" class="no-underline flex flex-inline items-center">
          <span class="pr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"/></svg>
          </span>
          <span>
            {{__('site.mainpage')}}
          </span>
          </a>
          <meta itemprop="position" content="1" />
        </li>

        @foreach ($crumbs as $key => list($uri, $title))
          <span class="whitespace-nowrap mx-3">/</span>
          <li class="whitespace-nowrap px-2 hover:text-green-500" itemprop="itemListElement" itemscope
              itemtype="https://schema.org/ListItem">

            @if (!$uri)
              <a class="underline" itemprop="item" href="{{url()->current()}}">
            @else
              <a class="no-underline" itemprop="item" href="{{ $uri }}">
            @endif

                <span itemprop="name">{{ $title }}</span></a>
            <meta itemprop="position" content="{{ $key + 2 }}" />
          </li>
        @endforeach

      </ol>
  </div>
</section>
