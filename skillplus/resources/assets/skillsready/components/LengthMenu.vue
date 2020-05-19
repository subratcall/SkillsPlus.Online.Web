<template>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-xs-1 col-sm-3 col-md-3 col-lg-2">
          <label class="col-form-label">Limit</label>
        </div>
        <div class="col-xs-1 col-sm-5 col-md-4 col-lg-4">
          <select class="form-control" @change="pageLength" v-model="pagelength">
            <option v-for="(value, index) in menu" :key="index">{{ value }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["length"],
  data() {
    return {
      // length: this.vtLengthmenu,
      menu: this.length,
      pagelength: 5
    };
  },
  methods: {
    pageLength() {
      console.log(this.pagelength);
      this.$events.fire("perpage-set", this.pagelength);
    }
  },
  mounted() {}
};
</script>

<style>
</style>