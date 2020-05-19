<template>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2">
          <label for="search" class="col-form-label">Search:</label>
        </div>
        <div class="col-xs-1 col-sm-10 col-md-10 col-lg-10">
          <input
            type="text"
            v-model="filterText"
            class="form-control"
            @keyup="doFilter"
            placeholder="Search..."
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      filterText: ""
    };
  },
  methods: {
    doFilter() {
      console.log(this.filterText);
      this.$events.fire("filter-set", this.filterText);
    }
  }
};
</script>
<style>
.filter-bar {
  padding: 10px;
}
</style>
