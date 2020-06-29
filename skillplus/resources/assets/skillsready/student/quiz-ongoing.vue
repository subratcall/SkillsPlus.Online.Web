<template>
  <div class="row">
    <modal v-if="showModal" @close="showModal = false" class="visible-xs">
      <h3 slot="header">Hint</h3>
      <div slot="body">
        <textarea class="form-control" rows="5" :disabled="true" :value="hintText"></textarea>
      </div>
      <div slot="footer">
        <button class="modal-default-button" @click="showModal = false; hint = false">Close</button>
      </div>
    </modal>

    <div class="col-12">
      <div class="row margin-bottom" style="border-bottom:solid 1px #555555">
        <h1 class="col-md-6">Quiz title - {{ quizTitle }}</h1>
        <h1 class="col-md-6 text-right">Timer - {{ timer }}</h1>
      </div>

      <div class="row">
        <div class="col-12">
          <div v-bind:class="[content]">
            <div class="row">
              <div class="quiz-content">
                <div class="row">
                  <div class="col-md-12 text-right hidden-xs">
                    <button type="button" class="btn btn-primary" @click="sidebarToggle">
                      <span v-bind:class="[sidebarIcon]"></span>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div
                      class="col-sm-8 col-md-6 col-lg-8 col-lg-offset-2"
                      v-bind:class="{'col-sm-offset-2 col-md-offset-4': !sidebar, 'col-md-offset-3': sidebar}"
                    >
                      <quiz-content :id="id" :lid="lid" :page="pageState"></quiz-content>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-right padding-top" style="border-top:solid 1px #555555">
                <button type="button" class="btn btn-default" @click="back">Back</button>
                <button type="button" class="btn btn-primary" @click="skip">Skip</button>
                <button
                  type="button"
                  class="btn btn-warning"
                  @click="hint = !hint; showModal = !showModal"
                >Hint</button>
              </div>
            </div>
          </div>

          <div v-show="sidebar" class="col-md-2 col-sm-4 sidebar hidden-xs">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div
                  class="col-sm-3 col-md-5 col-lg-4 margin-top"
                  v-for="(item, index) in pageLimit"
                  :key="index"
                >
                  <button
                    ref="indexes"
                    type="button"
                    class="btn btn-lg btn-default"
                    @click="pageSkip($event)"
                  >{{ item }}</button>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 margin-top text-center">
                <button type="button" class="btn btn-primary" @click="submitAnswer($event)">Submit</button>
              </div>
            </div>
          </div>

          <div class="visible-xs">
            <div class="sidebar-button-small">
              <button
                type="button"
                class="btn btn-primary"
                @click="sidebarToggle"
                v-show="sidebar == false"
              >
                <span v-bind:class="[sidebarIcon]"></span>
              </button>
            </div>
            <div class="sidebar-small" v-show="sidebar">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-2">
                    <div class="row">
                      <div class="col-xs-12 margin-top text-right visible-xs">
                        <button type="button" class="btn btn-primary" @click="sidebarToggle">
                          <span v-bind:class="[sidebarIcon]"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-10">
                    <div
                      class="col-xs-3 margin-top"
                      v-for="(item, index) in pageLimit"
                      :key="index"
                    >
                      <button
                        ref="indexes_xs"
                        type="button"
                        class="btn btn-lg btn-default"
                        @click="pageSkip($event)"
                      >{{ item }}</button>
                    </div>
                    <div class="col-xs-12 margin-top text-right">
                      <button
                        type="button"
                        class="btn btn-primary"
                        @click="submitAnswer($event)"
                      >Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div v-show="hint" class="col-md-12 hidden-xs">
            <div class="col-md-6 col-md-offset-3">
              <h3>Hint:</h3>
              <textarea class="form-control" rows="5" :disabled="true" :value="hintText"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.quiz-content {
  min-height: 100px;
  margin-bottom: 20px;
}
.sidebar {
  min-height: 600px;
  /* background-color: #0000009f; */
}

.sidebar-small {
  position: absolute;
  top: 10px;
  right: 1px;
  width: 80%;
  background-color: #0000009f;
  height: 100%;
}

.sidebar-button-small {
  position: absolute;
  top: 20px;
  right: 1px;
}
</style>
<script>
import Quizcontent from "./quiz-content.vue";
import Modal from "../components/Modal.vue";

export default {
  props: {
    id: Number,
    lid: Number
  },
  data() {
    return {
      width: 0,
      showModal: false,
      timer: "00:00",
      quizTitle: "",
      data: "",
      pageState: 0,
      pageLimit: 0,
      sidebar: false,
      hint: false,
      content: "col-md-12 col-sm-12",
      sidebarIcon: "glyphicon glyphicon-arrow-left",
      hintText: "",
      doubleClickOptions: {
        result: [],
        delay: 300,
        clicks: 0,
        timer: null
      }
    };
  },
  components: {
    "quiz-content": Quizcontent,
    modal: Modal
  },
  methods: {
    sidebarToggle() {
      this.sidebar = !this.sidebar;
      this.content =
        this.sidebar == true ? "col-md-10 col-sm-8" : "col-md-12 col-sm-12";
      this.sidebarIcon =
        this.sidebar == true
          ? "glyphicon glyphicon-arrow-right"
          : "glyphicon glyphicon-arrow-left";
    },
    skip() {
      if (this.pageState + 1 < this.pageLimit) {
        this.pageState = this.pageState + 1;
        this.$events.fire("get-hints", this.pageState);
      }
    },
    back() {
      if (this.pageState > 0) {
        this.pageState = this.pageState - 1;
        this.$events.fire("get-hints", this.pageState);
      }
    },
    save() {
      this.$events.fire("save-answer");
    },
    submitAnswer(event) {
      this.$events.fire("submit-answer");
      // let index = this.pageState;
      // let element = this.$refs["indexes"][index];
      // let markColor = this.$refs["indexes"][index].classList[2];

      // if (markColor == "btn-default" || markColor == "btn-danger") {
      //   element.classList.remove("btn-default");
      //   element.classList.remove("btn-danger");
      //   element.classList.add("btn-success");
      // }
    },

    firstHint(index) {
      this.$events.fire("get-hints", index);
    },

    pageSkip(event) {
      var self = this;
      let index = event.target.textContent - 1;
      let element = this.$refs["indexes"][index];
      let element_xs = this.$refs["indexes_xs"][index];
      let markColor = this.$refs["indexes"][index].classList[2];
      let markColor_xs = this.$refs["indexes_xs"][index].classList[2];

      self.pageState = index;

      this.firstHint(index);

      this.doubleClickOptions.clicks++;
      if (this.doubleClickOptions.clicks === 1) {
        this.doubleClickOptions.timer = setTimeout(function() {
          self.doubleClickOptions.clicks = 0;
        }, this.doubleClickOptions.delay);
      } else {
        clearTimeout(this.doubleClickOptions.timer);

        this.doubleClickOptions.clicks = 0;

        if (markColor != "btn-success") {
          if (markColor == "btn-default" || markColor != "btn-success") {
            element.classList.remove("btn-default");
            element.classList.add("btn-danger");
          }
          if (markColor == "btn-danger") {
            element.classList.remove("btn-danger");
            element.classList.add("btn-default");
          }
        }

        if (markColor_xs != "btn-success") {
          if (markColor_xs == "btn-default" || markColor != "btn-success") {
            element_xs.classList.remove("btn-default");
            element_xs.classList.add("btn-danger");
          }
          if (markColor_xs == "btn-danger") {
            element_xs.classList.remove("btn-danger");
            element_xs.classList.add("btn-default");
          }
        }
      }
    },

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
          setTimeout(() => {
           vm.firstHint(0);
          }, 500);
        })
        .catch(err => {
          alert("Error! Contact IT Department.");
        });
    }
  },
  events: {
    "display-hint"(data) {
      this.hintText = data;
    },
    "page-length"(pageLength) {
      this.pageLimit = pageLength;
    },
    start() {
      this.loadHQ();

      this.$events.fire("quiz-content-start");
    },
    answered(page) {
      let index = page;

      let element = this.$refs["indexes"][index];
      let element_xs = this.$refs["indexes_xs"][index];
      let markColor = this.$refs["indexes"][index].classList[2];
      let markColor_xs = this.$refs["indexes_xs"][index].classList[2];

      if (markColor == "btn-default" || markColor == "btn-danger") {
        element.classList.remove("btn-default");
        element.classList.remove("btn-danger");
        element.classList.add("btn-success");
      }

      if (markColor_xs == "btn-default" || markColor_xs == "btn-danger") {
        element_xs.classList.remove("btn-default");
        element_xs.classList.remove("btn-danger");
        element_xs.classList.add("btn-success");
      }
    },
    "no-answered"(page) {
      let index = page;

      let element = this.$refs["indexes"][index];
      let element_xs = this.$refs["indexes_xs"][index];
      let markColor = this.$refs["indexes"][index].classList[2];
      let markColor_xs = this.$refs["indexes_xs"][index].classList[2];

      if (markColor == "btn-success" || markColor == "btn-danger") {
        element.classList.remove("btn-success");
        element.classList.remove("btn-danger");
        element.classList.add("btn-default");
      }

      if (markColor_xs == "btn-success" || markColor_xs == "btn-danger") {
        element_xs.classList.remove("btn-success");
        element_xs.classList.remove("btn-danger");
        element_xs.classList.add("btn-default");
      }
    }
  },
  mounted() {
    window.addEventListener("resize", () => {});
  },
  onDestroyed() {
    window.removeEventListener("resize");
  }
};
</script>

<style>
</style>