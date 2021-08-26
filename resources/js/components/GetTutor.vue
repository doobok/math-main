<template>
  <div>
    <button
      class="bg-red-400 hover:bg-red-500 text-white active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 mr-1 rounded shadow hover:shadow-md outline-none focus:outline-none flex"
      type="button"
      style="transition: all 0.15s ease 0s;"
      @click="open"
    >
      {{$ml.get('getTutorbtn')}}
    </button>

    <transition name="modal">
      <div v-show="showfrm" class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container text-white h-full lg:h-auto flex justify-center">

            <div class="relative modal-body">
              <button @click="close" class="text-white absolute top-0 right-0">
                <svg  width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"><path d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z"/></svg>
              </button>

              <template id="vacancy-form" v-if="!sended">

                <div class="w-full flex text-center justify-center flex-col">
                  <div class="text-2xl font-semibold text-white flex flex-row justify-center">
                    <span>{{$ml.get('getTutorTitle')}}</span>
                  </div>
                  <p class="text-sm text-gray-300 m-3">
                    {{$ml.get('fillFormTitle')}}
                  </p>
                </div>

                <div id="name" class="w-full p-2 relative">
                  <span class="text-xs text-gray-400">{{$ml.get('firstname')}}</span>
                  <input
                    type="text" name="name"
                    v-model="name"
                    class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    :placeholder="$ml.get('firstname')"
                    @blur="$v.name.$touch()"
                  />
                  <span v-if="$v.name.$error" class="text-xs text-red-400 absolute -bottom-2 left-3">{{$ml.get('checkField')}}</span>
                </div>
                <!-- phone -->
                <div id="phone" class="w-full p-2 relative">
                  <span class="text-xs text-gray-400">{{$ml.get('phone')}}</span>
                  <input
                    type="text" name="password" autocomplete="new-password"
                    v-model="phone"
                    ref="phonet"
                    class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                    :placeholder="$ml.get('phone')"
                    @blur="$v.phone.$touch()"
                  />
                  <span v-if="$v.phone.$error" class="text-xs text-red-400 absolute -bottom-2 left-3">{{$ml.get('checkField')}}</span>
                </div>
                <div id="comment" class="w-full p-2 relative">
                  <span class="text-xs text-gray-400">{{$ml.get('aboutyou')}}</span>
                  <textarea
                    type="text" name="comment"
                    v-model="comment"
                    rows="3"
                    @blur="$v.comment.$touch()"
                    class="border-0 p-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                  ></textarea>
                  <span v-if="$v.comment.$error" class="text-xs text-red-400 absolute -bottom-2 left-3">{{$ml.get('checkField')}}</span>
                </div>

                <div class="w-full p-2 relative">
                  <button
                    class="bg-green-400 text-gray-700 w-full p-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none"
                    type="button"
                    :disabled="$v.$invalid"
                    @click="sendForm"
                  >
                    <template v-if="$v.$invalid">
                      {{$ml.get('fillForm')}}
                    </template>
                    <template v-else>
                      {{$ml.get('send')}}
                    </template>
                  </button>
                </div>
              </template>

              <template v-else>
                <div class="w-full flex text-center justify-center flex-col">
                  <div class="text-2xl font-semibold text-white flex flex-row justify-center">

                    <svg class="mr-2 text-green-400" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M21.856 10.303c.086.554.144 1.118.144 1.697 0 6.075-4.925 11-11 11s-11-4.925-11-11 4.925-11 11-11c2.347 0 4.518.741 6.304 1.993l-1.422 1.457c-1.408-.913-3.082-1.45-4.882-1.45-4.962 0-9 4.038-9 9s4.038 9 9 9c4.894 0 8.879-3.928 8.99-8.795l1.866-1.902zm-.952-8.136l-9.404 9.639-3.843-3.614-3.095 3.098 6.938 6.71 12.5-12.737-3.096-3.096z"/></svg>
                    <span>Готово</span>
                  </div>
                  <p class="text-base text-gray-300 m-3">
                        {{$ml.get('formSended')}} ☎️
                  </p>
                </div>

              </template>



            </div>

          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import Inputmask from 'inputmask';
import { required, maxLength } from "vuelidate/lib/validators";

export default {
  data(){
        return{
          showfrm: false,
          name: '',
          phone: '',
          comment: '',
          send: false,
          sended: false,
        }
    },
    methods: {
      sendForm() {
        if (!this.send) {
          this.send = true;
          axios
            .post('/api/v1/send-vacancy', this.collectedVacancy).then(response => {
              if (response.data.success === true) {
                this.sended = true;

              }
            }).catch(err => {
              let e = { ...err    }
              alert('Error! - ' + e.response.data.message)
            });
        }
      },
      open(){
        this.showfrm = true;
      },
      close(){
        this.showfrm = false;
      },
    },
    mounted() {
        var im = new Inputmask('+38 '+'(999) 999-9999');
        im.mask(this.$refs.phonet);
    },
    computed: {
      collectedVacancy() {
        return {
          name: this.name,
          phone: this.phoneNum,
          comment: this.comment,
        };
      },
      phoneNum: function() {
                var str = this.phone;
                str = str.replace(/[^0-9.]/g, '');
                str = str.substr(2);
                return str;
      },
    },
    validations: {
      phone: {
        required,
        validFormat: val => /^\+38 \(0\d{2}\) \d{3}\-\d{4}$/.test(val),
      },
      name: {
        required,
        alpha: val => /^[a-яёії\s]+$/i.test(val),
      },
      comment: {
        maxLength: maxLength(230),
      }
    },


  }
</script>
