<template>
    <button
      class="text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
      :class="'bg-'+ clr +'-400'"
      type="button"
      style="transition: all 0.15s ease 0s;"
      @click="opnForm"
    >
      {{txt}}
    </button>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  props: ['clr', 'txt'],
  data(){
      return{
        // theme: '',

      }
  },

  methods:{

    opnForm(){
      this.$store.dispatch('TUGGLE_FORM', true);
      this.$store.dispatch('PUSH_MARKER', {'marker':this.txt, 'type':''});
    },
  },

}


</script>
