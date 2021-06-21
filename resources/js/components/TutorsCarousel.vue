<template>
  <div id="tutors" class="mx-4">

    <VueSlickCarousel v-bind="settings" :slidesToShow="this.itemsCount" >

      <div v-for="item in items" class="px-4 text-center">
        <div
          class="relative flex flex-col min-w-0 break-words bg-green-400 w-full shadow-lg mb-2 rounded-lg"
        >
          <div class="px-4 py-5 flex-auto">
            <div
              class="text-white p-3 text-center inline-flex items-center justify-center mb-5 shadow-lg rounded-full bg-yellow-400"
            >
            <div class="relative w-36 h-36">
              <img class="rounded-full border border-gray-100 shadow-sm w-full" :src="'/storage/' + item.image" :alt="'Репетитор ' + item.name" />
            </div>
            </div>

            <h6 class="text-xl font-semibold">{{item.name}}</h6>

            <div class="mt-2 text-gray-900 bg-green-100 p-2 shadow-lg rounded-lg relative">
              <svg class="block fill-current text-green-100 w-4 h-4 absolute left-0 top-0 ml-7 -mt-3 z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path></svg>
              <p class="mt-2 mb-4 text-gray-600" v-html="item.text">
              </p>
            </div>
          </div>
          <div class="flex flex-wrap justify-center p-4 space-x-1">
            <a v-for="t in item.tgs" :href="getUll(t.url)" class="rounded-full p-1 bg-gray-700 text-white hover:bg-yellow-400 hover:text-gray-900 text-xs mb-1" :title="t.title">{{t.name}}</a>
          </div>
          <div class="p-4 flex justify-center">
            <button
              class="bg-yellow-400 text-white hover:text-gray-700 flex flex-nowrap active:bg-gray-700 text-sm font-bold uppercase mb-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
              type="button"
              style="transition: all 0.15s ease 0s;"
              @click="opnForm($ml.get('connectTutor') + ': ' + item.name)"
            >
            <svg class="mr-2 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M2.001 9.352c0 1.873.849 2.943 1.683 3.943.031 1 .085 1.668-.333 3.183 1.748-.558 2.038-.778 3.008-1.374 1 .244 1.474.381 2.611.491-.094.708-.081 1.275.055 2.023-.752-.06-1.528-.178-2.33-.374-1.397.857-4.481 1.725-6.649 2.115.811-1.595 1.708-3.785 1.661-5.312-1.09-1.305-1.705-2.984-1.705-4.695-.001-4.826 4.718-8.352 9.999-8.352 5.237 0 9.977 3.484 9.998 8.318-.644-.175-1.322-.277-2.021-.314-.229-3.34-3.713-6.004-7.977-6.004-4.411 0-8 2.85-8 6.352zm20.883 10.169c-.029 1.001.558 2.435 1.088 3.479-1.419-.258-3.438-.824-4.352-1.385-.772.188-1.514.274-2.213.274-3.865 0-6.498-2.643-6.498-5.442 0-3.174 3.11-5.467 6.546-5.467 3.457 0 6.546 2.309 6.546 5.467 0 1.12-.403 2.221-1.117 3.074zm-7.563-3.021c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82z"/></svg>
            <span>{{$ml.get('connectTutor')}}</span>
            </button>
          </div>
        </div>

      </div>
    </VueSlickCarousel>
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'

export default {
  props: ['items'],
  components: { VueSlickCarousel },
  data(){
    return{
      width: 0,
      settings: {
        "arrows": true,
        "dots": true,
        "infinite": true,
        "initialSlide": 2,
        "speed": 500,
        "slidesToScroll": 1,
        "swipeToSlide": true,
        "autoplay": true,
      }
    }
  },

  computed: {
    itemsCount() {
      if (this.width > 1300) {
        return 3;
      } else if (this.width > 750) {
        return 2;
      } else {
        return 1;
      }
    }
  },
  methods: {
     updateWidth() {
       this.width = window.innerWidth;
     },
     opnForm(mrk){
       this.$store.dispatch('TUGGLE_FORM', true);
       this.$store.dispatch('PUSH_MARKER', mrk);
     },
     getUll(u) {
       if (this.$ml.current === 'uk') {
         return '/uk/' + u
       } else {
         return '/' + u
       }
     }
  },
  created() {
    window.addEventListener('resize', this.updateWidth);
  },
  mounted() {
    console.log(this.items);
    this.width = window.innerWidth;
  }
}
</script>
