<template>
  <div>
    <div class="form-group">
      <label>Виберіть тег щоб додати</label>
      <select class="form-control"
        v-model="selected"
        @change="setTag"
        >
        <option v-for="tag in taglist" :value="tag">{{tag.name}}</option>
      </select>
    </div>

    <button v-for="t in tags" type="button" class="btn btn-sm btn-primary"
      style="font-size: x-small;"
      v-bind:class="{  'btn-danger' : !t.active }"
      >
      {{t.name}}
      <i class="voyager-x"></i>
    </button>

  </div>

</template>

<script>
export default {
  props: ['tags', 'taglist', 'item'],
  data(){
      return{
        selected: '',
      }
  },
  methods:{
    setTag() {
      axios
        .post('/api/set-tag', {'id': this.selected.id, 'model_id': this.item.id, 'model_type': this.item.model}).then(response => {
          if (response.data.success === true) {
            // this.sended = true;
            this.tags.push(this.selected);
            console.log('ok');
          }
        }).catch(err => {
          let e = { ...err    }
          alert('Error! - ' + e.response.data.message)
        });
    }

  },

}
</script>
