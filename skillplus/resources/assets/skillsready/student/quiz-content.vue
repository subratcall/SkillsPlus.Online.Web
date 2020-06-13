<template>
  <div>
    <div v-for="(value, index) in data" :key="index">
      <div v-show="page == index">
        <div class="col-md-12"># {{ index + 1 }}</div>
        <div class="col-md-12">{{ value.question }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: null
    };
  },
  props: {
    id: Number,
    page: 0
  },
  methods: {
    loadData() {
      var vm = this;

      if (vm.id != null || vm.id != "") {
        axios({
          url: `/admin/user_student/student_lesson_take_quiz/${vm.id}`,
          method: "get",
          dataType: "JSON"
        })
          .then(data => {
            vm.data = data.data.data;
            
            vm.$events.fire("page-length", vm.data.length - 1);
          })
          .catch(err => {
            alert("Error! Contact IT Department.");
          });
      }
    }
  },
  events: {
    "quiz-content-start"() {
      this.loadData();
    }
  },
  mounted() {}
};
</script>

<style>
</style>