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
        <h4 class="text-3xl font-semibold text-gray-700">Tutor-Math <span class="text-xl">- репетиторський освітній центр</span></h4>
        <h5 class="text-sm mt-0 mt-2 text-gray-600 uppercase font-semibold">
          Слідкуй за нами в соціальних мережах
        </h5>

        <div class="my-6 flex">
          @for ($i=0; $i < 5; $i++)
            <a href="#" class="text-gray-900 hover:text-gray-400 rounded-full h-12 w-12 flex items-center justify-center bg-gray-700 mr-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
            </a>
          @endfor


        </div>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span
              class="block uppercase text-gray-600 text-sm font-semibold mb-2"
              >Корисні посилання</span
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
      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
        <div class="text-sm text-gray-600 font-semibold py-1">
          Turor-Math © 2020 - {{date('Y')}} Усі права захищено.
          <a
            href="#"
            class="text-gray-600 hover:text-gray-700"
            >Публічна оферта</a
          >.
        </div>
      </div>
    </div>
  </div>
</footer>
