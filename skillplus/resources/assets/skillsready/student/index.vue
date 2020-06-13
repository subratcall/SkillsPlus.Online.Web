<template>
  <div class="content">
    <div v-show="view == '1'">
      <instruction-component :course="displayTitle.course" :quiz="displayTitle.quiz"></instruction-component>
    </div>
    <div v-show="view == '2'">
      <quiz-ongoing :id="id"></quiz-ongoing>
    </div>
  </div>
</template>

<style scoped>
.content {
  padding: 0 5%;
}
</style>

<script>
import Instruction from "./instruction.vue";
import Ongoingquiz from "./quiz-ongoing.vue";

export default {
  props: {
    id: Number,
    lid: Number
  },
  components: {
    "instruction-component": Instruction,
    "quiz-ongoing": Ongoingquiz
  },
  data() {
    return {
      view: "1",
      displayTitle: {
        course: "",
        quiz: ""
      }
    };
  },
  methods: {
    getTitle() {
      axios({
        url: `/admin/user_vendor/vendor_course_show/${this.lid}`,
        type: "get",
        dataType: "JSON"
      })
        .then(data => {
          this.displayTitle.course = data.data.content;
        })
        .catch(function(error) {

        });

      axios({
        url: `/admin/question/get_qh/${this.id}`,
        type: "get",
        dataType: "JSON"
      }).then(data => {
        this.displayTitle.quiz = data.data.title;
      });
    },
    quizStart() {
      this.view = "2";

      this.$events.fire('start');
    }
  },
  events: {
    "start-quiz"() {
      this.quizStart();
    }
  },
  mounted() {
    this.getTitle();
  }
};
</script>

<style>
</style>