<template>
  <div>

  <div class="flex flex-wrap justify-center">
    <button
      class="bg-gray-400 hover:bg-green-400 text-white active:bg-gray-700 text-sm font-bold uppercase my-3 py-2 px-4 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 flex"
      v-bind:class="{ 'bg-green-400': button.title == selectedgroup }"
      type="button"
      style="transition: all 0.15s ease 0s;"
      v-for="button in buttons"
      @click="selectedgroup = button.title"
    >
      <span v-html="button.svg"></span>
      {{$ml.get(button.title)}}
    </button>
  </div>

  <div class="flex flex-col sm:flex-row justify-center md:pt-8 my-12 sm:my-4">

    <template v-for="itm in itemsCards">

      <div v-if="!itm.fav" class="flex flex-col bg-white lg:w-1/4 w-5/6 mx-auto lg:mx-0 rounded-lg lg:rounded-l-lg mt-4 shadow hover:shadow-lg">
        <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
          <div class="p-8 text-3xl font-bold text-center border-b-4 flex flex-wrap justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor"
              v-html="itm.svg">
            </svg>
            <span>{{itm.name}}</span>
          </div>
          <ul class="w-full text-center text-sm">
            <div class="w-full pt-6 text-4xl text-gray-600 font-bold text-center py-4 flex justify-center">
                <div class="rounded-full bg-yellow-200 py-4 px-10">
                  {{itm.count}} <span class="text-xl align-middle">{{$ml.get('plessons')}}*</span>
                </div>
            </div>
            <li class="py-4 border-b mx-4 text-base">
              {{itm.desc}}
            </li>
          </ul>
        </div>
        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
          <div class="w-full text-3xl text-gray-600 font-bold text-center">
            <span v-if="itm.discount && lead.cityDiscount" class="text-xl line-through text-red-400 align-top leading-3">{{ packagePrice(itm.multipl, itm.count) }}</span>
            {{ discountPrice(itm.multipl, itm.discount, itm.count) }}
            <span class="text-base">грн.</span>
          </div>

          <div class="flex items-center justify-center relative">
            <img v-if="pays" class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
            <button
              class="bg-blue-400 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
              type="button"
              style="transition: all 0.15s ease 0s;"
              @click="opnForm(itm)"
            >
            {{$ml.get('priceCardBtn')}}
            </button>
          </div>
        </div>
      </div>

      <div v-else class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 bg-green-100 shadow hover:shadow-lg z-10">
        <div class="flex-1 rounded-t rounded-b-none overflow-hidden">
          <div class="w-full p-8 text-3xl font-bold text-center border-b-4 border-green-300 flex flex-wrap justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mr-2" viewBox="0 0 24 24" fill="currentColor"
              v-html="itm.svg">
            </svg>
            <span>{{itm.name}}</span>
          </div>
          <ul class="w-full text-center text-base">
            <div class="w-full pt-6 text-4xl text-white font-bold text-center py-4 flex justify-center">
                <div class="rounded-full bg-green-400 py-4 px-10">
                  {{itm.count}} <span class="text-xl align-middle">{{$ml.get('plessons')}}*</span>
                </div>
            </div>
            <li class="py-4 border-b border-white mx-4 text-base">
              {{itm.desc}}
            </li>
          </ul>
        </div>
        <div class="flex-none mt-auto rounded-b rounded-t-none overflow-hidden p-6 pb-12">
          <div class="w-full pt-6 text-4xl font-bold text-center">
            <span v-if="itm.discount && lead.cityDiscount" class="text-2xl line-through text-red-400 align-top leading-3">{{ packagePrice(itm.multipl, itm.count) }}</span>
            {{ discountPrice(itm.multipl, itm.discount, itm.count) }}
            <span class="text-base">грн.</span>
          </div>
          <div class="flex items-center justify-center relative">
            <img v-if="pays" class="top-0 right-0 h-8 absolute" src="/pays.png" alt="installment plan" />
            <button
              class="bg-green-400 text-white active:bg-gray-700 text-sm font-bold uppercase my-6 py-4 px-8 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
              type="button"
              style="transition: all 0.15s ease 0s;"
              @click="opnForm(itm)"
            >
            {{$ml.get('priceCardBtn')}}
            </button>
          </div>
        </div>
      </div>

    </template>
  </div>

  <div class="flex flex-nowrap justify-center mt-4">
    <button class="bg-gray-400 hover:bg-yellow-400 text-white text-sm font-bold uppercase my-3 py-2 px-4 rounded-l-full outline-none focus:outline-none"
    v-bind:class="{ 'bg-green-400': packageselector }"
    @click="packageselector = true"
    type="button">
      {{$ml.get('pricePackage')}}
    </button>
    <button class="bg-gray-400 hover:bg-yellow-400 text-white text-sm font-bold uppercase my-3 py-2 px-4 rounded-r-full outline-none focus:outline-none"
    v-bind:class="{ 'bg-green-400': !packageselector }"
    @click="packageselector = false"
    type="button">
      {{$ml.get('priceLesson')}}
    </button>
  </div>

</div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  props: ['category','pays'],
  data(){
      return{
        buttons: {
          1: {
            title: 'personal',
            svg: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/></svg>'
          },
          2: {
            title: 'group',
            svg: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M10.118 16.064c2.293-.529 4.428-.993 3.394-2.945-3.146-5.942-.834-9.119 2.488-9.119 3.388 0 5.644 3.299 2.488 9.119-1.065 1.964 1.149 2.427 3.394 2.945 1.986.459 2.118 1.43 2.118 3.111l-.003.825h-15.994c0-2.196-.176-3.407 2.115-3.936zm-10.116 3.936h6.001c-.028-6.542 2.995-3.697 2.995-8.901 0-2.009-1.311-3.099-2.998-3.099-2.492 0-4.226 2.383-1.866 6.839.775 1.464-.825 1.812-2.545 2.209-1.49.344-1.589 1.072-1.589 2.333l.002.619z"/></svg>'
          },
          3: {
            title: 'online',
            svg: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M16 18c0 1.104-.896 2-2 2h-12c-1.105 0-2-.896-2-2v-12c0-1.104.895-2 2-2h12c1.104 0 2 .896 2 2v12zm8-14l-6 6.223v3.554l6 6.223v-16z"/></svg>'
          },
        },
        selectedgroup: '',
        personal: [],
        group: [],
        online: [],
        packageselector: false,
      }
  },
  mounted(){
    this.selectedgroup = this.category
    axios
      .get('/api/v1/get-prices', {params: {locale: this.$ml.current}})
      .then(response => {
        this.personal = response.data.personal;
        this.group = response.data.group;
        this.online = response.data.online;
      });
  },
  methods: {
    packagePrice(multiply, count) {
      return multiply * this.lead.cityIndex * this.getCount(count);
    },
    discountPrice(multiply, disc, count) {
        if (disc) {
          return Math.round(((multiply * this.lead.cityIndex) / 100) * (100 - this.lead.cityDiscount) * this.getCount(count))
        } else {
          return multiply * this.lead.cityIndex * this.getCount(count)
        }
     },
     opnForm(mrk){
       this.$store.dispatch('TUGGLE_FORM', true);
       this.$store.dispatch('PUSH_MARKER', {'marker':'Пакет: ' + mrk.name, 'type':''});
       this.$store.dispatch('PUSH_PICE', mrk.id);
     },
     getCount(cnt) {
       if (this.packageselector) {
         return cnt
       } else {
         return 1
       }
     }
  },
  computed: {
    ...mapGetters(['lead']),
    itemsCards() {
      switch (this.selectedgroup) {
        case 'personal': return this.personal; break;
        case 'group': return this.group; break;
        case 'online': return this.online; break;
        default: return this.personal
      }
    },

  },
}

</script>
