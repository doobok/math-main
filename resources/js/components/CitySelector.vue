<template>
  <li class="relative -top-4 group">
        <!-- <a class="font-semibold whitespace-no-wrap text-gray-600 hover:text-blue-800" href="http://www.italiansubs.local:8081/forum/moderate/">
            <span class="firstlevel">Modera</span>
        </a> -->
        <span class="text-white hover:text-gray-300 ml-2 flex items-center text-xs uppercase font-bold cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
          {{city}}
        </span>
        <ul class="absolute left-0 top-0 mt-12 p-2 rounded-lg shadow-lg bg-white z-10 hidden group-hover:block">
            <svg class="block fill-current text-white w-4 h-4 absolute left-0 top-0 ml-3 -mt-3 z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path></svg>

            <li v-for="city in citys" @click="setCity(city)">
              <span class="text-gray-700 hover:text-yellow-400 my-2 flex items-center text-xs uppercase font-bold cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                {{city}}
              </span>
            </li>

            <!-- <li class="p-1 whitespace-no-wrap rounded-full text-sm md:text-base text-gray-600 hover:text-gray-800 hover:bg-gray-100">
                <a class="px-2 py-1" href="http://www.italiansubs.local:8081/forum/moderate/?area=modlog">
                    <span class="">Registro moderazione</span>
                </a>
            </li> -->

        </ul>
    </li>


  <!-- <div @mouseover="show = true" @mouseleave="show = false">

    <span
      class="text-white hover:text-gray-300 px-3 py-2 flex items-center text-xs uppercase font-bold cursor-pointer"

      >
      <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
      Буча
    </span>
    <div class="origin-top-right absolute"
      v-show="show" v-for="city in citys"
      >
      <ul class="absolute left-0 top-0 mt-10 p-2">
        <li class="text-white hover:text-gray-300 px-3 py-2 text-xs uppercase font-bold cursor-pointer">{{city}}</li>
      </ul>



  </div> -->


</template>

<script>
export default {
  data(){
      return{
        city: 'Буча',
        citys: [
          'Буча',
          'Ірпінь',
          'Київ',
          'Гостомель',
        ],
      }
  },
  mounted(){
console.log();

  },

  methods:{
    setCity(c){
      this.city = c;
    }

  },

}


</script>

<style>
.group:hover .group-hover\:block {
  display: block !important;
  }
</style>
