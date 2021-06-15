<template>
  <transition name="modal">
    <div v-show="formstatus" class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container text-gray-800">

          <!-- <template v-if="!sended">

            <div class="flex justify-between items-start pb-3">
              <div>
                <p class="text-2xl font-bold">{{$ml.get('contTitle')}}</p>
                <p class="text-xl font-bold">{{$ml.get('contTitle2')}}</p>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="#1FACB9" d="M20.89 23.654c-7.367 3.367-18.802-18.86-11.601-22.615l2.107-1.039 3.492 6.817-2.083 1.026c-2.189 1.174 2.37 10.08 4.609 8.994.091-.041 2.057-1.007 2.064-1.011l3.522 6.795c-.008.004-1.989.978-2.11 1.033zm-9.438-2.264c-1.476 1.072-3.506 1.17-4.124.106-.47-.809-.311-1.728-.127-2.793.201-1.161.429-2.478-.295-3.71-1.219-2.076-3.897-1.983-5.906-.67l.956 1.463c.829-.542 1.784-.775 2.493-.609 1.653.388 1.151 2.526 1.03 3.229-.212 1.223-.45 2.61.337 3.968 1.243 2.143 4.579 2.076 6.836.316-.412-.407-.811-.843-1.2-1.3z"/></svg>
            </div>


              <div class="modal-body">
                    <label>
                      <span class="text-gray-700">{{$ml.get('youName')}}</span>
                      <input
                      v-model="name"
                      name="name"
                      @blur="$v.name.$touch()"
                      type="text">
                      <p v-if="$v.name.$error" class="text--dander pb-2">{{$ml.get('errName')}}</p>
                    </label>
                    <label>
                      <span class="text-gray-700">{{$ml.get('phone')}}</span>
                      <input
                        ref="phone"
                        v-model="phone"
                        @blur="$v.phone.$touch()"
                        type="text">
                        <p v-if="$v.phone.$error" class="text--dander">{{$ml.get('errPhone')}}</p>
                    </label>
              </div>

            <div class="mt-4">
              <div class="flex justify-end">
                <button @click="close" class="px-4 bg-transparent p-3 hover:bg-gray-100 mr-2">{{$ml.get('cancel')}}</button>
                <button @click="sendPhone"
                  :disabled="$v.$invalid"
                  :class="!$v.$invalid ? 'gradient' : 'gray--btn'"
                  class="px-4 p-3 text-white">{{$ml.get('send')}}
                </button>
              </div>
            </div>
          </template>

          <template v-else>

            <span class="text-2xl">{{$ml.get('succesMsg')}}</span>
            <div class="flex justify-end">
              <button @click="close" class="px-4 gradient p-3 text-white mr-2">Ok</button>
            </div>

          </template> -->
          <button @click="close" class="px-4 bg-red-400 p-3 text-white mr-2">Close</button>

        </div>
      </div>
    </div>
  </transition>
</template>

<script>

import Inputmask from 'inputmask';
import { required, maxLength } from "vuelidate/lib/validators";
import { mapGetters } from "vuex";

export default {
  data(){
        return{
          name: '',
          phone: '',

        }
    },
    methods: {
      close(){
        this.$store.dispatch('TUGGLE_FORM', false);
      }

    },
    computed: {
      ...mapGetters(['formstatus']),
    },
    // mounted() {
    //     var im = new Inputmask('+38 '+'(999) 999-9999');
    //     im.mask(this.$refs.phone);
    // },
    // validations: {
    //   phone: {
    //     required,
    //     validFormat: val => /^\+38 \(0\d{2}\) \d{3}\-\d{4}$/.test(val),
    //   },
    //   name: {
    //     required,
    //     alpha: val => /^[a-яёії\s]+$/i.test(val),
    //   },
    //
    // },
  }


</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  display: table;
  transition: opacity 0.3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  width: 98%;
  max-width: 450px;
  margin: 0px auto;
  padding: 20px 30px;
  transition: all 0.3s ease;
}
.modal-body {
  margin: 10px 0;
}
.modal-enter {
  opacity: 0;
}
.modal-leave-active {
  opacity: 0;
}
.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
