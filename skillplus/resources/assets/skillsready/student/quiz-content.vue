<template>
  <div class="row">
    <div class="col-12">
      <div class="row" v-for="(value_a, index_a) in data" :key="index_a">
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
                <h2 class="control-label">Question No. {{ index_a + 1 }}</h2>
                <p>{{ value_a.question }}</p>

                <div v-if="value_a.type == 'CHECKBOX'">
                  <div
                    class="col-md-12"
                    v-for="(value_b, index_b) in qsplit(value_a.options)"
                    :key="index_b"
                  >
                    <div class="row">
                      <div class="form-check">
                        <input
                          ref="element"
                          @change="answer($event)"
                          class="col-md-3 form-check-input"
                          type="checkbox"
                          :value="value_b"
                          name="checkbox[]"
                          id="checkbox"
                        />
                        <label class="col-md-9 form-check-label" for="defaultCheck1">{{ value_b }}</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div v-if="value_a.type == 'MULTIPLE CHOICE'">
                  <div v-for="(value_b, index_b) in qsplit(value_a.options)" :key="index_b">
                    <div class="form-check">
                      <input
                        ref="element"
                        @change="answer($event)"
                        class="form-check-input"
                        type="radio"
                        :value="value_b"
                        name="mc"
                        :id="'mc_'+value_b"
                      />
                      <label class="form-check-label" :for="value_b">
                        <input type="hidden" name="type" value="MULTIPLE CHOICE" />
                        <input type="hidden" name="qid" :value="value_a.id" />
                        {{ value_b }}
                      </label>
                    </div>
                  </div>
                </div>

                <div v-if="value_a.type == 'SHORT ANSWER'">
                  <input type="hidden" :name="'qid'+value_a.id" :value="value_a.id" />
                  <input
                    ref="element"
                    @keyup="answer($event)"
                    type="text"
                    name="shortanswer"
                    id="shortanswer"
                    class="form-control"
                  />
                  <input type="hidden" name="type" value="SHORT ANSWER" />
                  <input type="hidden" name="qid" :value="value_a.id" />
                </div>

                <div v-if="value_a.type == 'PARAGRAPH'">
                  <textarea
                    ref="element"
                    @keyup="answer($event)"
                    type="textarea"
                    name="paragraph"
                    id="paragraph"
                    class="form-control margin-top"
                    rows="4"
                  ></textarea>
                </div>

                <div v-if="value_a.type == 'SWITCH'">
                  <button
                    ref="element"
                    @change="answer($event)"
                    type="button"
                    v-bind:class="{'btn btn-lg btn-primary': btnToggle}"
                    @click="btnToggle = !btnToggle"
                  >{{ btnToggle }}</button>

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
    </div>
  </div>
</template>

<style lang="scss">
@import "https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css";
</style>

<style scoped>
.form-check-input {
  width: 100px;
  transform: scale(1.5);
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
.question-and-answer {
}
</style>

<script>
export default {
  data() {
    return {
      data: null,
      btnToggle: true
    };
  },
  props: {
    id: Number,
    page: 0
  },
  methods: {
    qsplit(data) {
      return data.split("|");
    },
    answer(event) {
      let self = this;
      let element = self.$refs["element"];
      let countUncheck = 0;
      let textareaHasValue = false;
      let textHasValue = false;

      element.forEach((item, index) => {
        if (item.type == "checkbox") {
          if (item.checked == true) {
            self.$events.fire("answered", this.page);
          }
          if (item.checked == false) {
            countUncheck++;
          }
        }

        if (item.type == "textarea") {
          if (event.target.value != "") {
            textareaHasValue = true;
          } else {
            textareaHasValue = false;
          }
        }

        if (item.type == "text") {
          if (event.target.value != "") {
            textHasValue = true;
          } else {
            textHasValue = false;
          }
        }
      });

      // Checkbox
      if (countUncheck == 4) {
        self.$events.fire("no-answered", this.page);
      }

      //Textarea
      if (textareaHasValue == true) {
        self.$events.fire("answered", this.page);
      } else {
        self.$events.fire("no-answered", this.page);
      }

      //Text
      if (textHasValue == true) {
        self.$events.fire("answered", this.page);
      } else {
        self.$events.fire("no-answered", this.page);
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