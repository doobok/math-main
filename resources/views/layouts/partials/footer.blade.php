<footer class="relative bg-gray-900 pt-8 pb-6">
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
        class="text-gray-900 fill-current"
        points="2560 0 2560 100 0 100"
      ></polygon>
    </svg>
  </div>
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap">
      <div class="w-full lg:w-6/12 px-4">
        <h4 class="text-3xl font-semibold text-gray-700">Tutor-Math <span class="text-xl">- {{__('main.h1-mp')}}</span></h4>
        <p class="text-sm mt-0 mt-2 text-gray-600 uppercase font-semibold">
          {{__('site.follow-us')}}
        </p>

        <div class="my-6 flex">
          @if (setting('social.fb'))
          <a href="{{setting('social.fb')}}"
            rel="nofollow" target="_blank"
            class="text-gray-900 hover:text-blue-400 rounded-full h-12 w-12 flex items-center justify-center bg-gray-700 mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
          </a>
          @endif
          @if (setting('social.instagram'))
          <a href="{{setting('social.instagram')}}"
            rel="nofollow" target="_blank"
            class="text-gray-900 hover:text-pink-500 rounded-full h-12 w-12 flex items-center justify-center bg-gray-700 mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
          @endif
          @if (setting('social.youtube'))
          <a href="{{setting('social.youtube')}}"
            rel="nofollow" target="_blank"
            class="text-gray-900 hover:text-red-400 rounded-full h-12 w-12 flex items-center justify-center bg-gray-700 mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
          </a>
          @endif


        </div>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span
              class="block uppercase text-gray-600 text-sm font-semibold mb-2"
              >{{__('site.useful-links')}}</span
            >
            <ul class="list-unstyled">
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://www.creative-tim.com/presentation"
                  >About Us</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://blog.creative-tim.com"
                  >Blog</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://www.github.com/creativetimofficial"
                  >Github</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://www.creative-tim.com/bootstrap-themes/free"
                  >Free Products</a
                >
              </li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span
              class="block uppercase text-gray-600 text-sm font-semibold mb-2"
              >Other Resources</span
            >
            <ul class="list-unstyled">
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                  >MIT License</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://creative-tim.com/terms"
                  >Terms &amp; Conditions</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://creative-tim.com/privacy"
                  >Privacy Policy</a
                >
              </li>
              <li>
                <a
                  class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                  href="https://creative-tim.com/contact-us"
                  >Contact Us</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-400" />
    <div
      class="flex flex-wrap items-center md:justify-between justify-center"
    >
      <div class="w-full md:w-5/12 px-4 mx-auto text-center">
        <div class="text-sm text-gray-600 font-semibold py-1">
          Turor-Math © 2020 - {{date('Y')}} {{__('site.all-rights-reserved')}}.
          <a
            href="#"
            class="text-gray-600 hover:text-gray-700"
            >{{__('site.policy')}}</a
          >.
        </div>
      </div>
    </div>
  </div>
</footer>
