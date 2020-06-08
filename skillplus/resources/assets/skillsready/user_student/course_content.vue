<template></template>

<script>
export default {
  data() {
    return {
      tab: "course"
    };
  },
  mounted() {
      console.log("Course Mounted "+this.tab);
  }
};
</script>