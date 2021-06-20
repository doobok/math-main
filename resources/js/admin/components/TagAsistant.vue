<template>
  <div>
    <h4>Робота з тегами</h4>

    <div v-for="mod in models" class="d-flex flex-wrap col-md-12">

      <div v-for="mo in mod" class="card col-md-3"  style="margin: 10px;">
          <div class="card-body">
            <h4>{{mo.name}}</h4>

            <tag-asistant-elm :tags="mo.tags" :taglist="tags" :item="mo"></tag-asistant-elm>

          </div>
      </div>

    </div>

  </div>

</template>

<script>
export default {
  data(){
      return{
        models: [],
        tags: [],
      }
  },
  mounted(){
    axios
      .get('/api/get-tag-state')
      .then(response => {
        this.models = response.data.models;
        this.tags = response.data.tags;
      });

  },

  methods:{
    show(mod) {
      console.log(mod);
    }

  },

}
</script>
