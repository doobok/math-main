<template>
  <div class="mx-4">

    <VueSlickCarousel v-bind="settings" :slidesToShow="this.itemsCount" >

      <div v-for="item in items">
          <div class="pt-6 px-4 text-center">

            <div class="flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
              <div class="px-4 py-5 flex-auto">
                <div class="text-white p-3 text-center inline-flex items-center justify-center w-26 h-26 mb-5 shadow-lg rounded-full bg-green-400">
                <div class="relative w-24 h-24">
                  <img class="rounded-full border border-white shadow-sm w-full" :src="getImg(item.image)" :alt="$ml.get('review') + ' ' + item.name" />
                </div>
                </div>
                <h6 class="text-xl font-semibold">{{item.name}}</h6>
                <div class="flex space-x-2 text-yellow-400 justify-center">

                  <svg v-for="s in item.stars" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>

                </div>
                <p class="mt-2 mb-4 text-gray-600" v-html="item.text">
                </p>
              </div>
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
      if (this.width > 1100) {
        return 3;
      } else if (this.width > 650) {
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
     getImg(img) {
       if (img) {
         return '/storage/' + img;
       } else {
         return '/review-ava.png'
       }
     },
  },
  created() {
    window.addEventListener('resize', this.updateWidth);
  },
  mounted() {
    this.width = window.innerWidth;
  }
}
</script>
