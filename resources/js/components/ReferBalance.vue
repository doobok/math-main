<template>
  <div class="px-4 flex flex-wrap md:flex-nowrap justify-center">
    <template v-if="!geted">
      <input
        type="text"
        v-model="refercode"
        class="border-0 px-3 my-2 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-xl shadow focus:outline-none focus:ring flex-grow text-center"
        :placeholder="$ml.get('promo')"
      />
      <button
        class="bg-yellow-400 text-gray-700 p-3 m-3 text-sm font-bold uppercase rounded shadow hover:shadow-lg outline-none focus:outline-none flex-none"
        type="button"
        @click="checkBalance">
        {{$ml.get('check')}}
      </button>
    </template>
    <template v-else>
      <p class="text-3xl bg-blue-100 p-3">{{balance}}</p>
    </template>

  </div>
</template>

<script>
export default {
  data(){
      return{
        geted: false,
        refercode: '',
        balance: 0,
      }
  },

  methods:{
    checkBalance(){
      axios
          .get('/api/v1/check-refer-balance', { params: {code: this.refercode}})
          .then(response => {
            console.log(response);
              this.balance = response.data;
              this.geted = true;

          });
      // console.log(this.refercode);
    },
  },

}


</script>
