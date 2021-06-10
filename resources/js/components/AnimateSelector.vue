<template>
  <div class="pt-8 px-4 flex flex-wrap md:flex-nowrap justify-center">
    <div class="flex-grow p-2 leading-3">
      <select v-model="selector"
      @change="selected"
      class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
        <option value="" disabled selected hidden>{{paper}}</option>
        <option
        class="text-base leading-3"
        v-for="t in thems" :value="t">{{t}}</option>
      </select>
    </div>
    <div class="flex-none p-2">
      <button
        class="bg-green-400 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
        type="button"
        style="transition: all 0.15s ease 0s;"
        @click="sendPool"
      >        
        {{$ml.get('getTutor')}}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data(){
      return{
        thems: [
          'Репетитор з математики',
          'Репетитор з укрмови',
        ],
        theme: '',
        selector:'',
        paper: '',
        cycle:null,
        timer:null
      }
  },
  mounted(){
    this.getString()
    this.printer()
    this.startCircle()

  },

  methods:{
    printer(){
        this.stoper();
          let i = -1;
          // запускаємо анімацію
           this.timer = setInterval(()=>{
             // зупиняємо анімацію
             if (this.paper.length == this.theme.length - 1) {
               clearInterval(this.timer)
             }
        i++
          const x = i%this.theme.length
          this.paper += this.theme[x]
        },200-(Math.random()*50));

    },
    stoper(){
      clearInterval(this.timer)
      this.paper=''
    },
    selected(){
      clearInterval(this.timer)
      clearInterval(this.cycle)
    },
    startCircle(){
      this.cycle = setInterval(()=>{
        this.getString()
        this.printer()
      },7000)
    },
    getString(){
      this.theme = this.thems[Math.floor(Math.random() * this.thems.length)];
    },
    sendPool(){
      console.log(this.selector);
    }
  },

}


</script>
