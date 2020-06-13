<template>
  <div>
    <div class="row">
      <h1 class="col-md-6">Quiz title - {{ quizTitle }}</h1>
      <h1 class="col-md-6 text-right">Timer - {{ timer }}</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="quiz-content">
          <quiz-content :id="id" :page="pageState"></quiz-content>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-default" @click="back">Back</button>
        <button type="button" class="btn btn-primary" @click="skip">Skip</button>
      </div>
    </div>
  </div>
</template>

<script>
import Quizcontent from "./quiz-content.vue";

export default {
  props: {
    id: Number
  },
  data() {
    return {
      timer: "00:00",
      quizTitle: "",
      data: "",
      pageState: 0,
      pageLimit: 0
    };
  },
  components: {
    "quiz-content": Quizcontent
  },
  methods: {
    skip() {
      if (this.pageState < this.pageLimit) {
        this.pageState = this.pageState + 1;
      }
    },
    back() {
      if (this.pageState > 0) {
        this.pageState = this.pageState - 1;
      }
    },
    submit() {},
    startTimer(duration) {
      let vm = this;

      var timer = duration;
      var minutes;
      var seconds;

      var x = setInterval(() => {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        if (timer == 0) {
          clearInterval(x);
        }

        vm.timer = `${minutes} : ${seconds}`;

        if (--timer < 0) {
          timer = duration;
        }
      }, 1000);
    },
    loadHQ() {
      var vm = this;

      axios({
        url: `/admin/question/get_qh/${this.id}`,
        method: "get",
        dataType: "JSON"
      })
        .then(data => {
          vm.quizTitle = data.data.title;

          var fiveMinutes = 60 * data.data.timer;

          vm.startTimer(fiveMinutes);
        })
        .catch(err => {
          alert("Error! Contact IT Department.");
        });
    }
  },
  events: {
    "page-length"(pageLength) {
      this.pageLimit = pageLength;
    },
    start() {
      this.loadHQ();

      this.$events.fire("quiz-content-start");
    }
  },
  mounted() {}
};
</script>

<style>
</style>