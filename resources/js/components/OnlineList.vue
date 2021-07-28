<template>
  <div>
    <button
      class="bg-blue-400 hover:bg-red-400 text-white active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none flex"
      type="button"
      style="transition: all 0.15s ease 0s;"
      @click="open"
    >
      <svg class="h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-3 17v-10l9 5.146-9 4.854z"/></svg>
      Online
    </button>

    <transition name="modal">
      <div v-show="showlist" class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container text-white h-full lg:h-auto">

            <div class="relative">
              <button @click="close" class="text-white absolute top-0 right-0">
                <svg  width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z"/></svg>
              </button>

              <div class="w-full flex text-center justify-center flex-col pb-5">
                <div class="text-2xl font-semibold text-white flex flex-row justify-center">
                  <span>{{$ml.get('onlineListTitle')}}</span>
                </div>

              </div>
              <div class="text-gray-700" v-for="city in cityes">
                <div class="pb-2 w-full">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-yellow-100 w-full shadow-lg rounded-lg"
                  >
                    <div class="px-4 py-3 flex flex-row">
                      <svg class="mr-2 text-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                      <p class="text-xl font-semibold flex-grow">
                          {{city.name}}
                      </p>
                      <a :href="'https://' + city.slug + '.tutor-math.com.ua/online'"
                      target="_blank"
                      class="bg-blue-400 hover:bg-green-400 text-white active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none"
                      >
                      {{$ml.get('onlineRoom')}}
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data(){
        return{
          showlist: false,
        }
    },
    methods: {
      open(){
        this.showlist = true;
      },
      close(){
        this.showlist = false;
      },
    },
    computed: {
      ...mapGetters(['cityes']),
    },


  }
</script>
