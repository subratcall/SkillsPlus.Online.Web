<template>
  <form>
    <label class="control-label margin-right">Length:</label>
    <select class="form-control" v-model="pagelength" @change="pageLength">
      <option v-for="(value, index) in length">{{ value }}</option>
    </select>
  </form>
</template>

<script>
export default {
  data() {
    return {
      length: [5, 30, 100],
      pagelength: 5
    };
  },
  methods: {
    pageLength() {
      console.log(this.pagelength);
      this.$events.fire("perpage-set", this.pagelength);
    }
  }
};
</script>

<style>
</style>