<template>
  <div>
    <div v-for="(value_a, index_a) in data" :key="index_a">
      <div v-show="page == index_a">
        <div class="col-md-12"># {{ index_a + 1 }}</div>
        <div class="col-md-12">{{ value_a.question }}</div>
        <div class="col-md-12">
          <img
            :src="(value_a.attachment == true) ? value_a.attachment:'https://bostonparkingspaces.com/wp-content/themes/classiera/images/nothumb/nothumb370x300.png'"
          />
        </div>

        <div v-if="value_a.type == 'CHECKBOX'">
          <div v-for="(value_b, index_b) in qsplit(value_a.options)" :key="index_b">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                :value="value_b"
                name="checkbox[]"
                id="checkbox"
              />
              <label class="form-check-label" for="defaultCheck1">{{ value_b }}</label>
            </div>
          </div>
        </div>

        <div v-if="value_a.type == 'MULTIPLE CHOICE'">
          <div v-for="(value_b, index_b) in qsplit(value_a.options)" :key="index_b">
            <div class="form-check">
              <input
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
          <input type="text" name="shortanswer" id="shortanswer" class="form-control" />
          <input type="hidden" name="type" value="SHORT ANSWER" />
          <input type="hidden" name="qid" :value="value_a.id" />
        </div>

        <div v-if="value_a.type == 'PARAGRAPH'">
          <textarea name="paragraph" id="paragraph" class="form-control"></textarea>
        </div>

        <div v-if="value_a.type == 'SWITCH'">
          <div class="col-md-12 margin-bottom">

            <button type="button" v-bind:class="{'btn btn-primary': btnToggle}" @click="btnToggle = !btnToggle">{{ btnToggle }}</button>

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
            <input type="hidden" name="qid" :value="value_a.id" /> -->

          </div>

        </div>
        

      </div>
    </div>
  </div>
</template>

<style lang="scss">
  @import "https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css";
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