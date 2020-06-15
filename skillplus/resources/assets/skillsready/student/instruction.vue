<template>
  <div class="row col-12">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h1>Course: {{ course }}</h1>
      </div>
      <div class="col-md-12">
        <h1>Quiz: {{ quiz }}</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1>Instruction:</h1>
        <p class="text-center">
          Tests & Quizzes: Example Instructions
          When writing test or quiz instructions, there are several items you may want to consider including, depending on the structure of your quiz. Some of the information below may not apply:
          Focus and Purpose of the Test/Quiz - Provide students context by letting them know what content is being focused on for the quiz and the learning goals the quiz is measuring.
          Number and Type of Questions - Letting students know how many questions and whether the questions include multiple-choice, true-false, fill-in-the-blank, or essay will let them know what to expect and an idea of how long it will take them to complete the quiz.
          Whether Students Can Expect Feedback - Including question feedback is recommended, as it helps students better learn from the test experience. This is especially important for practice quizzes. Let students know if they will be receiving feedback so they know what to expect.
          Navigation Instructions - In an online environment, letting students know what to expect with the quiz navigation is important. Will all the questions be on one screen? Or, will they need to click "Next" to see the next question? What buttons do they click to start or submit a quiz?
          Whether Students Get Multiple Attempts - You can set up a test or quiz so students can take it as many times as you indicate with either their last attempt or highest score for their grade. Let students know what to expect if you set up your test or quiz in this way.
          If the Test/Quiz is Timed - If a test or quiz is timed, emphasize this to students letting them know when the time starts and the importance of completing the test in one sitting.
          Weighting - If you weight your tests or quizzes in the course, let students know what that is and the impact this may have on their final grade.
          Course or University Policy Regarding Cheating - If you are worried about cheating, you may want to include the course expectations or university policy regarding cheating to emphasize this information.
        </p>
      </div>
      <div class="col-md-12 text-right">
        <button type="button" class="btn btn-primary btn-lg" @click="start">Start</button>
        <button type="button" class="btn btn-default btn-lg" @click="cancel">Go Back</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    course: String,
    quiz: String
  },
  methods: {
    start() {
      this.$events.fire("start-quiz");
    },

    cancel() {
      window.location.href = `/admin/user_student/student_show_course/${this.lid}`;
    }
  }
};
</script>

<style>
</style>