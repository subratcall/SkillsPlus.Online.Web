<template>
      <form>
          <label>Search for:</label>
          <input type="text" v-model="filterText" class="form-control" @keyup="doFilter" placeholder="Search...">
      </form>
</template>

<script>
  export default {
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
        console.log(this.filterText);
        this.$events.fire('filter-set', this.filterText)
      }
    }
  }
</script>
<style>
.filter-bar {
  padding: 10px;
}
</style>
