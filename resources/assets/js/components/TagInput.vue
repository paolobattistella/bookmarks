<template>
<div>
  <multiselect v-model="value"
   tag-placeholder="Add this as new tag" placeholder="Search or add a tag"
    track-by="id" label="title"
    :options="options" :multiple="true" :taggable="true"
    @tag="addTag"></multiselect>
</div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  props: {
      selected: {
          type: Array,
      },
  },
  data () {
    return {
      value: [],
      options: []
    }
  },
  created: function () {
      this.isLoading = true;
      axios.get('/api/v0/tags')
          .then((response) => {
              this.isLoading = false;
              this.options = response.data;
              this.value = this.selected
          })
          .catch(error => {});
  },
  methods: {
    addTag (newTag) {
      const tag = {
        title: newTag,
        id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)
    }
  }
}
</script>
