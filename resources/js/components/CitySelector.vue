<template>
  <li class="relative list-none p-2 group">
        <span class="text-white hover:text-gray-300 ml-2 flex items-center text-xs uppercase font-bold cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
          {{lead.cityName}}
        </span>
        <ul class="absolute left-0 top-0 mt-8 ml-2 p-2 rounded-lg shadow-lg bg-white z-10 hidden group-hover:block">
            <svg class="block fill-current text-white w-4 h-4 absolute left-0 top-0 ml-3 -mt-3 z-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path></svg>

            <li v-for="city in cityes" @click="setCity(city.id)">
              <span class="text-gray-700 hover:text-yellow-400 my-2 flex items-center text-xs uppercase font-bold cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                {{city.name}}
              </span>
            </li>
        </ul>
    </li>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  props: ['lang'],
  data(){
      return{
        cityes: [],
      }
  },
  mounted(){
    this.$store.dispatch('GET_ST_DATA');
    axios
      .get('/api/v1/get-cityes', {params: {locale: this.$ml.current}})
      .then(response => {
        this.cityes = response.data;
      });
      this.getStartCity();
  },

  methods:{
    setCity(id){
      this.$store.dispatch('GET_CITY', {id: id, locale: this.$ml.current});
    },
    getStartCity(){
      this.$store.dispatch('GET_CITY', {id: this.lead.cityID, locale: this.$ml.current});
    }

  },
  computed: {
    ...mapGetters(['lead']),
  },
  // задаем язык
  created: function(){
    this.$ml.change(this.lang);
  }

}
</script>

<style>
.group:hover .group-hover\:block {
  display: block !important;
  }
</style>
