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

    <span v-for="t in tags" class="label label-info"
      style="font-size: x-small;"
      v-bind:class="{  'label-danger' : !t.active }"
      @click="remTag(t.id)"
      >
      {{t.name}}
      <i class="voyager-x"></i>
    </span>

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
            this.tags.push(this.selected);
          }
        }).catch(err => {
          let e = { ...err    }
          alert('Error! - ' + e.response.data.message)
        });
    },
    remTag(id) {
      axios
        .post('/api/rem-tag', {'id': id, 'model_id': this.item.id, 'model_type': this.item.model}).then(response => {
          if (response.data.success === true) {
            let index = this.tags.findIndex(tag => tag.id === id);
            this.tags.splice(index, 1);
          }
        }).catch(err => {
          let e = { ...err    }
          alert('Error! - ' + e.response.data.message)
        });
    }

  },

}
</script>
