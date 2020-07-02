<template>
 <div class="row">
  <div class="col-12">
   <form
    id="form"
    method="post"
    :action="`/admin/user_student/student_quiz_save_answers/${lid}/${id}`"
   >
    <div class="row" v-for="(value_a, index_a) in questions" :key="index_a">
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
          <div v-for="(value_b, index_b) in value_a.answer" :key="index_b">
           <div class="col-xs-2">
            <input
             ref="element"
             @change="answer($event)"
             class="form-check-input"
             type="checkbox"
             id="checkbox"
             :value="value_b.id"
             :name="'qid-'+value_a.id+'_t-'+value_a.type+'_input[]'"
            />
           </div>
           <div class="col-xs-10">
            <label class="form-check-label" for="defaultCheck1">{{ value_b.description }}</label>
           </div>
          </div>
         </div>

         <div v-if="value_a.type == 'MULTIPLE CHOICE'">
          <div v-for="(value_b, index_b) in value_a.answer" :key="index_b">
           <input
            ref="element"
            @change="answer($event)"
            class="form-check-input"
            type="radio"
            :value="value_b.id"
            :name="'qid-'+value_a.id+'_t-'+value_a.type+'_input[]'"
           />
           <label class="form-check-label" :for="value_a">{{ value_b.description }}</label>
          </div>
         </div>

         <div v-if="value_a.type == 'SHORT ANSWER'">
          <div v-for="(value_b, index_b) in value_a.answer" :key="index_b">
           <input
            ref="element"
            @keyup="answer($event)"
            type="text"
            class="form-control"
            :name="'qid-'+value_a.id+'_t-'+value_a.type+'_input[]'"
           />
          </div>
         </div>

         <div v-if="value_a.type == 'PARAGRAPH'">
          <textarea
           ref="element"
           @keyup="answer($event)"
           type="textarea"
           class="form-control margin-top"
           rows="4"
           :name="'qid-'+value_a.id+'_t-'+value_a.type+'_input[]'"
          ></textarea>
         </div>

         <div v-if="value_a.type == 'SWITCH'">
          <div v-for="(value_b, index_b) in value_a.answer" :key="index_b">
           <label class="switch">
            <input
             ref="element"
             type="checkbox"
             class="input-sw"
             :name="'qid-'+value_a.id+'_t-'+value_a.type+'_input[]'"
             @change="answer($event)"
            />
            <span class="button button-primary" @click="switchEffect($event)">True</span>
           </label>
          </div>
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
 import Modal from "../components/Modal";

 export default {
  data() {
   return {
    data: [],
    questions: [],
    btnToggle: true,
    input: {},
    options: [],
    question_id: 0
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

   submitAnswer() {
    let form = document.getElementById("form");
    let input = new FormData(form);

    form.submit();
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

    if (element.type == "checkbox") {
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
    this.submitAnswer();
   },
   "save-answer"() {
    console.log("save_answer");
   }
  },
  mounted() {
   // Error in event handler for "get-hints": "TypeError:
  }
 };
</script>

<style>
</style>