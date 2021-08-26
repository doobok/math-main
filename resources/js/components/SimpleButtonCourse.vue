<template>
    <button
      class="bg-blue-400 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
      type="button"
      style="transition: all 0.15s ease 0s;"
      @click="opnForm"
    >
      {{$ml.get('priceCardBtn')}}
    </button>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  props: ['price', 'txt'],
  data(){
      return{
        // theme: '',

      }
  },

  methods:{

    opnForm(){
      this.$store.dispatch('TUGGLE_FORM', true);
      this.$store.dispatch('PUSH_MARKER', {'marker':this.txt, 'type':'course'});
      this.$store.dispatch('PUSH_CUSTOM_PRICE', this.price);
    },
  },

}


</script>
