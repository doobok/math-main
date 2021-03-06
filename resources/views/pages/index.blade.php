@extends('app')

@section('head')
@component('components.meta')

  @slot('title') {{__('seo.mp-title')}} @endslot
  @slot('description') {{__('seo.mp-desc', [
      'phone' => setting('info.phone')
    ])}} @endslot
  @slot('image') /tutor-math.jpg @endslot
  @slot('date') {{config('app.startdate')}} @endslot

@endcomponent
@endsection

@section('main')

  @include('layouts.partials.mainpage.firstscreen')

  @include('layouts.partials.mainmenu')

  @include('layouts.partials.mainpage.introduce')
  @include('layouts.partials.mainpage.subjects')
  @include('layouts.partials.mainpage.advantages')
  @include('layouts.partials.mainpage.tutors')
  @include('layouts.partials.mainpage.reviews')
  @include('layouts.partials.mainpage.universe')
  @include('layouts.partials.mainpage.pricing')
  {{-- @include('layouts.partials.mainpage.form') --}}
  @include('layouts.partials.mainpage.todo-block')





  {{-- <section class="relative py-20">
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
          class="text-white fill-current"
          points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
    <div class="container mx-auto px-4">
      <div class="items-center flex flex-wrap">
        <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
          <img
            alt="..."
            class="max-w-full rounded-lg shadow-lg"
            src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
          />
        </div>
        <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
          <div class="md:pr-12">
            <div
              class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
            >
              <i class="fas fa-rocket text-xl"></i>
            </div>
            <h3 class="text-3xl font-semibold">A growing company</h3>
            <p class="mt-4 text-lg leading-relaxed text-gray-600">
              The extension comes with three pre-built pages to help you get
              started faster. You can change the text and images and you're
              good to go.
            </p>
            <ul class="list-none mt-6">
              <li class="py-2">
                <div class="flex items-center">
                  <div>
                    <span
                      class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                      ><i class="fas fa-fingerprint"></i
                    ></span>
                  </div>
                  <div>
                    <h4 class="text-gray-600">
                      Carefully crafted components
                    </h4>
                  </div>
                </div>
              </li>
              <li class="py-2">
                <div class="flex items-center">
                  <div>
                    <span
                      class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                      ><i class="fab fa-html5"></i
                    ></span>
                  </div>
                  <div>
                    <h4 class="text-gray-600">Amazing page examples</h4>
                  </div>
                </div>
              </li>
              <li class="py-2">
                <div class="flex items-center">
                  <div>
                    <span
                      class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                      ><i class="far fa-paper-plane"></i
                    ></span>
                  </div>
                  <div>
                    <h4 class="text-gray-600">Dynamic components</h4>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pt-20 pb-48">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-center text-center mb-24">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold">Here are our heroes</h2>
          <p class="text-lg leading-relaxed m-4 text-gray-600">
            According to the National Oceanic and Atmospheric
            Administration, Ted, Scambos, NSIDClead scentist, puts the
            potentially record maximum.
          </p>
        </div>
      </div>
      <div class="flex flex-wrap">
        <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
          <div class="px-6">
            <img
              alt="..."
              src="./assets/img/team-1-800x800.jpg"
              class="shadow-lg rounded-full max-w-full mx-auto"
              style="max-width: 120px;"
            />
            <div class="pt-6 text-center">
              <h5 class="text-xl font-bold">Ryan Tompson</h5>
              <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                Web Developer
              </p>
              <div class="mt-6">
                <button
                  class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-twitter"></i></button
                ><button
                  class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-facebook-f"></i></button
                ><button
                  class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-dribbble"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
          <div class="px-6">
            <img
              alt="..."
              src="./assets/img/team-2-800x800.jpg"
              class="shadow-lg rounded-full max-w-full mx-auto"
              style="max-width: 120px;"
            />
            <div class="pt-6 text-center">
              <h5 class="text-xl font-bold">Romina Hadid</h5>
              <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                Marketing Specialist
              </p>
              <div class="mt-6">
                <button
                  class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-google"></i></button
                ><button
                  class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-facebook-f"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
          <div class="px-6">
            <img
              alt="..."
              src="./assets/img/team-3-800x800.jpg"
              class="shadow-lg rounded-full max-w-full mx-auto"
              style="max-width: 120px;"
            />
            <div class="pt-6 text-center">
              <h5 class="text-xl font-bold">Alexa Smith</h5>
              <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                UI/UX Designer
              </p>
              <div class="mt-6">
                <button
                  class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-google"></i></button
                ><button
                  class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-twitter"></i></button
                ><button
                  class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-instagram"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
          <div class="px-6">
            <img
              alt="..."
              src="./assets/img/team-4-470x470.png"
              class="shadow-lg rounded-full max-w-full mx-auto"
              style="max-width: 120px;"
            />
            <div class="pt-6 text-center">
              <h5 class="text-xl font-bold">Jenna Kardi</h5>
              <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                Founder and CEO
              </p>
              <div class="mt-6">
                <button
                  class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-dribbble"></i></button
                ><button
                  class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-google"></i></button
                ><button
                  class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-twitter"></i></button
                ><button
                  class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                >
                  <i class="fab fa-instagram"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="relative block py-24 lg:pt-0 bg-gray-900">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
        <div class="w-full lg:w-6/12 px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
          >
            <div class="flex-auto p-5 lg:p-10">
              <h4 class="text-2xl font-semibold">Want to work with us?</h4>
              <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                Complete this form and we will get back to you in 24 hours.
              </p>
              <div class="relative w-full mb-3 mt-8">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="full-name"
                  >Full Name</label
                ><input
                  type="text"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                  placeholder="Full Name"
                  style="transition: all 0.15s ease 0s;"
                />
              </div>
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="email"
                  >Email</label
                ><input
                  type="email"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                  placeholder="Email"
                  style="transition: all 0.15s ease 0s;"
                />
              </div>
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  for="message"
                  >Message</label
                ><textarea
                  rows="4"
                  cols="80"
                  class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                  placeholder="Type a message..."
                ></textarea>
              </div>
              <div class="text-center mt-6">
                <button
                  class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                  type="button"
                  style="transition: all 0.15s ease 0s;"
                >
                  Send Message
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

@endsection
