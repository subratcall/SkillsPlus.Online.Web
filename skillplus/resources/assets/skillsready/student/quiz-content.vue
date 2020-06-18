<template>
  <div class="row">
    <div class="col-12">
      <form
        method="post"
        id="form"
        :action="'/admin/user_student/student_quiz_save_answers/'+id+'/'+lid"
      >
        <div class="row" v-for="(value_a, index_a) in questions" :key="index_a">
          <input type="hidden" name="question_id" :value="value_a.id" />
          <div v-show="page == index_a">
            <div class="col-md-12 question-and-answer">
              <div class="row">
                <div class="col-lg-6">
                  <img
                    class="image"
                    width="100%"
                    height="300px"
                    :src="(value_a.attachment == true) ? value_a.attachment:'https://bostonparkingspaces.com/wp-content/themes/classiera/images/nothumb/nothumb370x300.png'"
                  />

                  <!-- random image -->
                  <!-- <img
                  class="image"
                  width="100%"
                  height="300px"
                  :src="(value_a.attachment == true) ? value_a.attachment:'https://bostonparkingspaces.com/wp-content/themes/classiera/images/nothumb/nothumb370x300.png'"
                  />-->
                </div>
                <div class="col-lg-6">
                  <div class="row col-md-12">
                    <h2 class="control-label">Question No. {{ index_a + 1 }}</h2>
                    <p class="title-question">{{ value_a.question }}</p>
                  </div>
                  

                  <div v-if="value_a.type == 'CHECKBOX'">
                    <div
                      class="col-xs-12"
                      v-for="(value_b, index_b) in qsplit(value_a.options)" @click="answer($event)"
                      :key="index_b"
                    >
                      <div class="col-xs-2">
                        <input
                          ref="element"
                          @change="answer($event)"
                          class="form-check-input"
                          type="checkbox"
                          id="checkbox"
                          :value="value_b"
                          name="input[]"
                        />
                        
                      </div>
                      <div class="col-xs-10">
                        <label class="form-check-label" for="defaultCheck1">{{ value_b }}</label>
                      </div>
                    </div>
                  </div>


                  <div v-if="value_a.type == 'MULTIPLE CHOICE'">
                    <div v-for="(value_b, index_b) in qsplit(value_a.options)" :key="index_b">
                      <input
                        ref="element"
                        @change="answer($event)"
                        class="form-check-input"
                        type="radio"
                        :value="value_b"
                        name="input[]"
                      />
                      <label class="form-check-label" :for="value_a">{{ value_b }}</label>
                    </div>
                  </div>

                  <div v-if="value_a.type == 'SHORT ANSWER'">
                    <input
                      ref="element"
                      @keyup="answer($event)"
                      type="text"
                      class="form-control"
                      name="input[]"
                    />
                  </div>

                  <div v-if="value_a.type == 'PARAGRAPH'">
                    <textarea
                      ref="element"
                      @keyup="answer($event)"
                      type="textarea"
                      class="form-control margin-top"
                      rows="4"
                      :name="'input[]'"
                    ></textarea>
                  </div>

                  <div v-if="value_a.type == 'SWITCH'">
                    <label class="switch">
                      <input
                        ref="element"
                        type="checkbox"
                        class="input-sw"
                        name="input[]"
                        @change="answer($event)"
                      />
                      <span class="button button-primary" @click="switchEffect($event)">True</span>
                    </label>

                    <!-- <input type="checkbox" class="switch" v-model="data[index_a][0]" /> -->

                    <!-- <input
                      type="checkbox"
                      :id="'sws_'+index_a"
                      :name="'sws_'+index_a"
                      checked
                      data-toggle="toggle"
                      data-onstyle="primary"
                      data-offstyle="danger"
                    />
                    <input type="hidden" name="type" value="SWITCH" />
                    <input type="hidden" name="qid" :value="value_a.id" />-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style lang="scss">
@import "https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css";
</style>

<style scoped>
.title-question {
  word-wrap: break-word;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.button {
  border: 1px thick black;
  border-radius: 5px;
  padding: 10px;
  color: white;
}

.button-danger {
  background-color: red;
}

.button-primary {
  background-color: blue;
}

.form-check-input {
  transform: scale(1.5);
  width: 50px;
}

.form-check-label {
  display: inline;
  text-indent: -1.5em;
}

.question-and-answer p {
  font-size: 24px;
}

.question-and-answer label {
  font-size: 18px;
}

.image {
  border: black 1px solid;
  border-radius: 5px;
}
</style>

<script>
export default {
  data() {
    return {
      data: [],
      questions: [],
      btnToggle: true,
      input: {}
    };
  },
  props: {
    id: Number,
    lid: Number,
    page: 0
  },
  methods: {
    switchEffect(event) {
      let element = event.target;

      if (element.classList[1] == "button-primary") {
        element.classList.remove("button-primary");
        element.classList.add("button-danger");
        element.textContent = "False";
      } else if (element.classList[1] == "button-danger") {
        element.classList.remove("button-danger");
        element.classList.add("button-primary");
        element.textContent = "True";
      }
    },
    passHintBack(hint) {
      this.$events.fire("display-hint", hint);
    },
    qsplit(data) {
      return data.split("|");
    },
    save() {
      let form = document.getElementById("form");
      let input = new FormData(form);

      axios({
        url: `/admin/user_student/student_quiz_save_answers/${this.id}/${this.lid}`,
        method: "post",
        data: input
      })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });

      // console.log(this.id, this.lid);
      // console.log(this.input);
      // let datas = {
      //   lesson_id: this.id,
      //   content_id: this.lid
      // };
      // axios({
      //       url: "/admin/user_student/student_quiz_submit_answers",
      //       type: "post",
      //       data: datas,
      //       dataType: 'JSON',
      //   }).then((res) => {
      //   }).catch((err) => {
      //     console.log(err);
      //   });
    },
    answer(event) {
      let self = this;

      let element = event.target;
      let textareaHasValue = false;

      if (element.type == "textarea") {
        if (element.value != "") {
          self.$events.fire("answered", this.page);
        } else {
          self.$events.fire("no-answered", this.page);
        }
      }

      if (element.classList[0] == "input-sw" && element.checked == true) {
        self.$events.fire("answered", this.page);
      }

      /*checkbox not available*/
  

      if (element.type == "radio") {
        if (element.checked == true) {
          self.$events.fire("answered", this.page);
        } else if (element.checked == false) {
          self.$events.fire("no-answered", this.page);
        }
      }

      if (element.type == "text") {
        if (element.value != "") {
          self.$events.fire("answered", this.page);
        } else {
          self.$events.fire("no-answered", this.page);
        }
      }
    },
    loadData() {
      var vm = this;

      if (vm.id != null || vm.id != "") {
        axios({
          url: `/admin/user_student/student_lesson_take_quiz/${vm.id}`,
          method: "get",
          dataType: "JSON"
        })
          .then(data => {
            // vm.data = data.data.data;
            vm.questions = data.data.data;

            vm.$events.fire("page-length", vm.questions.length);
          })
          .catch(err => {
            alert("Error! Contact IT Department.");
          });
      }
    }
  },
  events: {
    "get-hints"(index) {
      this.passHintBack(this.questions[index].hint);
    },
    "quiz-content-start"() {
      this.loadData();
    },
    "submit-answer"() {
      this.save();
    }
  },
  mounted() {
    // Error in event handler for "get-hints": "TypeError:
  }
};
</script>

<style>
</style>