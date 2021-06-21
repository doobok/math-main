<template>
  <div>
    <h4>Робота з тегами</h4>

    <div v-for="mod in models">
      <h4>Модель {{mod[0].model}}</h4>

      <div class="panel panel-bordered">
      <div class="panel-body">
      <div class="table-responsive">
      <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <div class="row">
      <div class="col-sm-12">
      <table class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">

        <tbody>
        <tr v-for="mo in mod" role="row" class="odd">

        <td>
          <div>{{mo.name}}</div>
        </td>

        <td>
          <tag-asistant-elm :tags="mo.tags" :taglist="tags" :item="mo"></tag-asistant-elm>
        </td>


        </tr>

      </tbody>
      </table></div></div>
      </div>
      </div>
      </div>
      </div>

    </div>

    <!-- <div v-for="mod in models" class="d-flex flex-wrap col-md-12">
      <h4>Модель {{mod[0].model}}</h4>

      <div v-for="mo in mod" class="card col-md-3"  style="margin: 10px;">
          <div class="card-body">
            <h4>{{mo.name}}</h4>

            <tag-asistant-elm :tags="mo.tags" :taglist="tags" :item="mo"></tag-asistant-elm>

          </div>
      </div>

    </div> -->

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
