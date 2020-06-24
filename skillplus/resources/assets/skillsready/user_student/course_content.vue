<template>
 <section class="col-12 course">
  <!-- <legend>List of Lessons:</legend>
        <div class="accordion" id="accordionExample">
            <div class="card" id="secAc"></div>
  </div>-->

  <div class="video-tutorials">
   <video
    class="padding-top video"
    id="video"
    width="100%"
    controls
    autoplay="false"
    poster="https://homepages.cae.wisc.edu/~ece533/images/monarch.png"
   >
    <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm />
    <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg />
    <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4 />
    <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp />
   </video>
   <div class="video-details">

    <button class="button buy-now">Take Quiz</button>
    <br />
    <div class="video-descriptions">
     <p>Updates:</p>
     <ul>
      <li>
       <i class="far fa-file-video"></i>&nbsp;Hours On demand videos
      </li>
      <li>
       <i class="far fa-file"></i>&nbsp;Lessons
      </li>
      <li>
       <i class="far fa-compass"></i>&nbsp;lifetime access
      </li>
      <li>
       <i class="fas fa-mobile-alt"></i>&nbsp;on mobile and tv
      </li>
     </ul>
    </div>
   </div>
  </div>

  <div class="row wrap-header">
   <div class="col-lg-12">
    <div class="col-lg-12 course-header text-left">
     <!-- <h1 id="titleData"></h1> -->
     <div class="title">
      <h1>{{ course.title }}</h1>
      <h6>{{ course.subtitle }}</h6>
     </div>

     <div class="col-xs-6">
      <div class="raty-product-section">
       <div v-for="(value, index) in 5" :key="index" style="display:inline">
        <i
         class="fas fa-star filled"
         :class="{'star-live': (index <= courseRate),  'star-dead': (index >= courseRate)}"
        ></i>
       </div>
       <div></div>
       <span class="raty-text">{{ courseRate }} ratings</span>
       <span class>{{ countCourseSold }} students / vendors purchased this book</span>
      </div>
     </div>
     <div class="col-xs-12">
      <div class="raty-product-section">
       <span class>Vendor: {{ vendorName }}</span>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row margin-top-next">
     <div class="col-lg-6 offset-lg-1 section-1">
      <h5>What will i learn?</h5>
      <ul>
       <li v-for="(value, index) in courseWhatWillLearn" :key="index">
          {{ value }}
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-2">
      Curriculum for this course
      <p style="display:inline; font-size:14px">17 Lessons 23:47:22 Hours</p>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-3" v-for="(value, index) in quizList" :key="index">
      <div class="header-custom-border">
       <a
        class="btn"
        data-toggle="collapse"
        data-target="#demo"
        style="display:inline; font-size:15px"
       >
        <i class="fas fa-plus" style="color: #007791"></i>&nbsp;&nbsp; {{ value.title }}
       </a>
      </div>


      <div id="demo" class="collapse">
       <div class="list-custom-border">
        <a href="javascript:void(0)" @click="takeQuiz(value.id)" ><i class="fas fa-play-circle"></i>&nbsp;&nbsp;{{ value.desc }}</a>
       </div>
      </div>


     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-4">
      <p class="section-4-header">Requirements</p>

      <ul>
       <li v-for="(value, index) in requirements" :key="index">
         {{ value }}
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-5">
      <p class="section-5-header">Description</p>
       <div v-html="description"></div>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-6">
      <p class="section-6-header">Other related courses</p>
      <ul>
       <li class="col-lg-12">
        <div class="row">
         <div class="col-lg-3">
          <b>01:50:56 Hours</b>
         </div>
         <div class="col-lg-5 row">
          <div class="col-lg-12">
           <a
            href="https://demo.academy-lms.com/addon/home/course/how-to-shoot-b-roll-footage-with-peter-mckinnon/26"
           >How To Shoot B-Roll Footage with Peter McKinnon</a>
          </div>
          <div class="col-lg-12">
           <div class="updated-time">Updated Sat, 06-Jul-2019</div>
          </div>
         </div>
         <div class="col-lg-3 row">
          <div class="col-lg-6">
           <span class="item-rating">
            <i class="fas fa-star star-live"></i>
            <span class="d-inline-block average-rating">4</span>
           </span>
          </div>
          <div class="col-lg-6">
           <span class="enrolled-">
            <i class="far fa-user"></i>
            1
           </span>
          </div>
         </div>
         <div class="col-lg-1 text-right">
          <span class="item-price">
           <span class="current-price">
            <b>Free</b>
           </span>
          </span>
         </div>
        </div>
       </li>
       <li class="col-lg-12">
        <div class="row">
         <div class="col-lg-3">
          <b>01:50:56 Hours</b>
         </div>
         <div class="col-lg-5 row">
          <div class="col-lg-12">
           <a
            href="https://demo.academy-lms.com/addon/home/course/how-to-shoot-b-roll-footage-with-peter-mckinnon/26"
           >How To Shoot B-Roll Footage with Peter McKinnon</a>
          </div>
          <div class="col-lg-12">
           <div class="updated-time">Updated Sat, 06-Jul-2019</div>
          </div>
         </div>
         <div class="col-lg-3 row">
          <div class="col-lg-6">
           <span class="item-rating">
            <i class="fas fa-star star-live"></i>
            <span class="d-inline-block average-rating">4</span>
           </span>
          </div>
          <div class="col-lg-6">
           <span class="enrolled-student">
            <i class="far fa-user"></i>
            1
           </span>
          </div>
         </div>
         <div class="col-lg-1 text-right">
          <span class="item-price">
           <b>
            <span class="current-price">$1800</span>
           </b>
          </span>
         </div>
        </div>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-7">
      <div class="row">
       <div class="col-lg-12">
        <p class="section-7-header">About the instructor </p>
       </div>

      </div>
      <div class="col-lg-12 row">
       <div class="col-lg-4 vendor-profile">
        <img
         src="https://demo.academy-lms.com/addon/uploads/user_image/1.jpg"
         class="rounded-circle"
        />
        <ul>
         <li>
          <i class="fas fa-comment"></i>&nbsp;5 Reviews
         </li>
         <li>
          <i class="fas fa-user"></i>&nbsp;3 Students
         </li>
         <li>
          <i class="fas fa-play-circle"></i>&nbsp;{{ vendorCountCourses }} Courses
         </li>
        </ul>
       </div>
       <div class="col-lg-8">
        <label>
         <h4>
          <a href="#">{{ vendorName }}</a>
         </h4>
        </label>
        <div v-html="userAbout"></div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-8">
      <div class="row">
       <div class="col-lg-12">
        <p class="section-8-header">Student feedback</p>
       </div>
      </div>
      <div class="row">
       <div class="col-lg-12 row">
        <div class="col-lg-3 row">
         <div class="col-lg-12 text-center">
          <div class="average-rating">
           <b>4</b>
          </div>
          <div class="rating">
           <i class="fas fa-star filled star-live"></i>
           <i class="fas fa-star filled star-live"></i>
           <i class="fas fa-star filled star-live"></i>
           <i class="fas fa-star filled star-live"></i>
           <i class="fas fa-star star-dead"></i>
          </div>Average rating
         </div>
        </div>
        <div class="col-lg-9">
         <div class="individual-rating">
          <ul>
           <li>
            <div class="col-lg-12 row">
             <div class="col-lg-8">
              <div class="progress">
               <div class="progress-bar" style="width: 0%"></div>
              </div>
             </div>
             <div class="col-lg-3">
              <span class="rating">
               <i class="fas fa-star star-dead"></i>
               <i class="fas fa-star star-dead"></i>
               <i class="fas fa-star star-dead"></i>
               <i class="fas fa-star star-dead"></i>
               <i class="fas fa-star filled star-dead"></i>
              </span>
             </div>
             <div class="col-lg-1">
              <span>0%</span>
             </div>
            </div>
           </li>
           <li>
            <div class="col-lg-12 row">
             <div class="col-lg-8">
              <div class="progress">
               <div class="progress-bar" style="width: 50%"></div>
              </div>
             </div>
             <div class="col-lg-3">
              <span class="rating">
               <i class="fas fa-star star-live"></i>
               <i class="fas fa-star star-live"></i>
               <i class="fas fa-star star-live"></i>
               <i class="fas fa-star star-live"></i>
               <i class="fas fa-star filled star-live"></i>
              </span>
             </div>
             <div class="col-lg-1">
              <span>50%</span>
             </div>
            </div>
           </li>
          </ul>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="col-lg-6 offset-lg-1 section-9">
     <div class="row">
      <div class="col-lg-12">
       <p class="section-9-header">Reviews</p>
      </div>
     </div>
     <div class="row">
      <div class="col-lg-12">
       <ul>
        <li v-for="(value, index) in courseReview" :key="index">
         <div class="col-lg-12 row">
          <div class="col-lg-5 row">
           <div class="col-lg-4">
            <div class="reviewer-details clearfix">
             <div class="reviewer-img float-left">
              <img src="https://demo.academy-lms.com/addon/uploads/user_image/6.jpg" width="46" alt />
             </div>
            </div>
           </div>
           <div class="col-lg-8">
            <div class="review-time">
             <div class="time">{{ value.created_at }}</div>
             <div class="reviewer-name">{{ commentName }}</div>
            </div>
           </div>
          </div>
          <div class="col-lg-7">
           <div class="review-details">
            <div class="rating">
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star star-live"></i>
            </div>
            <div class="review-text star-dead">{{ value.comments }}</div>
           </div>
          </div>
         </div>

         <!-- <div class="col-lg-12 row">
          <div class="col-lg-5 row">
           <div class="col-lg-4">
            <div class="reviewer-details clearfix">
             <div class="reviewer-img float-left">
              <img src="https://demo.academy-lms.com/addon/uploads/user_image/6.jpg" width="46" alt />
             </div>
            </div>
           </div>
           <div class="col-lg-8">
            <div class="review-time">
             <div class="time">Sun, 07-Jul-2019</div>
             <div class="reviewer-name">Jane Doe</div>
            </div>
           </div>
          </div>
          <div class="col-lg-7">
           <div class="review-details">
            <div class="rating">
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star filled star-live"></i>
             <i class="fas fa-star star-live"></i>
            </div>
            <div class="review-text star-dead">This course taught me a lot. Very effective!!</div>
           </div>
          </div>
         </div> -->
        </li>
        <!-- <li>
        <div class="col-lg-12 row">
         <div class="col-lg-4">
           <img src="https://demo.academy-lms.com/addon/uploads/user_image/3.jpg" width="46" alt />
         </div>
         <div class="col-lg-7">
           <div class="review-time">
            <div class="time">Sun, 04-Aug-2019</div>
            <div class="reviewer-name">Jane Doe</div>
           </div>
          <div class="review-details">
           <div class="rating">
            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
            <i class="fas fa-star" style="color: #abb0bb;"></i>
            <i class="fas fa-star" style="color: #abb0bb;"></i>
           </div>
           <div class="review-text">Nah!</div>
          </div>
         </div>
        </div>
        </li>-->
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
</template>

<script>
 export default {
  data() {
   return {
    course: [],
    courseRate: 0,
    courseUnrate: 0,
    countCourseSold: 0,
    courseWhatWillLearn: [],
    vendorName: '',
    quizList: [],
    requirements: [],
    urlid: '',
    description: '',
    vendorCountCourses: 0,
    userAbout: '',
    courseReview: [],
    commentName: ''
   };
  },
  methods: {
   takeQuiz(id) {
    
    window.location.href=`/admin/user_student/student_lesson_quiz/${id}/${this.urlid}`;
   },

   getAbout(id) {
     axios
     .get(`/admin/user_vendor/vendor_course_vendor/${id}`)
     .then(res => {
      this.vendorName = res.data[0].name;
      this.userAbout = res.data[0].about;
      this.commentName = res.data[0].name;
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });
   },

   get() {
    var self = this;

    var id = window.location.href;
    id = id.substring(id.lastIndexOf("/") + 1);

/* get course_content */

    axios
     .get(`/admin/user_vendor/vendor_course_show/${id}`)
     .then(res => {
      self.course = res.data;
      self.vendor_id = res.data.user_id;

      let whatWillLearn = res.data.what_will_learn;

      self.courseWhatWillLearn = whatWillLearn.split("|");
      self.requirements = res.data.requirements.split("|");
      self.description = res.data.description;
      self.getAbout(res.data.user_id);

     })
     .catch(err => {
      console.log(err);
      alert("Error! Contact IT Department.");
     });

/* get course rate */

    axios
     .get(`/admin/user_vendor/vendor_course_rate/${id}`)
     .then(res => {
      let average = 0;

      for (let i = 0; i < res.data.length; i++) {
       average += res.data[i].rate;
      }

      average = average / res.data.length;
      this.courseRate = Math.ceil(average);
      this.courseUnrate = Math.abs(Math.ceil(average) - 5);
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });
     
/* get course count sold */

    axios
     .get(`/admin/user_vendor/vendor_course_sold/${id}`)
     .then(res => {
      this.countCourseSold = res.data;
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });

/*  get vendor details */

  

/* get course quiz list  */

    axios
     .get(`/admin/user_student/student_lesson_get_list/${id}`)
     .then(res => {
      this.quizList = res.data;
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });

/* get vendor count courses */

   axios
     .get(`/admin/user_vendor/vendor_count_courses/${id}`)
     .then(res => {
      this.vendorCountCourses = res.data;
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });

 /* get course comment */

    axios
     .get(`/admin/user_vendor/vendor_course_comment/${id}`)
     .then(res => {
      this.courseReview = res.data;
       getAbout(res.data.tbl_user_id);
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });

   }
  },
  mounted() {
   var id = window.location.href;
   this.urlid = id.substring(id.lastIndexOf("/") + 1);

   this.get();
  }
 };
</script>

<style scoped>
 .custom-card {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
  background-color: #fff;
  border-radius: 3px;
  border: none;
  position: relative;
  margin-bottom: 30px;
 }

 #myKanban {
  overflow-x: auto;
  padding: 20px 0;
 }

 .success {
  background: #00b961;
  color: #fff;
 }

 .info {
  background: #2a92bf;
  color: #fff;
 }

 .warning {
  background: #f4ce46;
  color: #fff;
 }

 .error {
  background: #fb7d44;
  color: #fff;
 }

 .raty-text {
  color: #e6d816 !important;
 }

 .raty {
  color: #e6d816 !important;
 }

 .course {
  font-family: "Open Sans", sans-serif;
 }

 .course a {
  color: #007791;
 }

 .course .course-header {
  margin-left: 100px;
  margin-top: 50px;
  margin-bottom: 50px;
  padding: 0px;
  min-width: 1980px;
 }

 .course-header .title {
  width: 600px;
 }

 .section.section-header {
  margin-top: -15px;
 }

 .wrap-header {
  background-color: #29303b;
  color: white;
 }

 .no-padding {
  padding: 0px;
 }

 .no-margin {
  margin: 0px;
 }

 .main-content.header {
  margin-top: 15px;
 }

 .margin-top-next {
  margin-top: 40px;
 }

 .header-custom-border {
  border-top: #dedfe0 solid 1px;
  border-left: #dedfe0 solid 1px;
  border-right: #dedfe0 solid 1px;
  border-bottom: #dedfe0 solid 1px;
  padding: 10px 0px;
 }

 .list-custom-border {
  border-bottom: #dedfe0 solid 1px;
  border-left: #dedfe0 solid 1px;
  border-right: #dedfe0 solid 1px;
  font: 15px;
  color: #007791;
  padding-top: 10px;
  padding-left: 40px;
  padding-right: 5px;
  padding-bottom: 10px;
  text-indent: -0.8em;
 }

 .list-custom-border > i {
  opacity: 0.5;
  padding-right: 10px;
 }

 .section-1 {
  border: #dedfe0 solid 1px;
  color: #29303b;
  padding: 30px;
 }

 .section-1 ul {
  list-style: none;
  padding: 0;
 }

 .section-7 ul {
  list-style: none;
  padding: 0;
 }

 .section-7 {
  color: #29303b;
 }

 .section-7 .vendor-profile img {
  margin-bottom: 10px;
  width: 96px;
  height: 96px;
 }

 .section-7 ul li i {
  padding-right: 10px;
 }

 .section-1 ul > li {
  padding-left: 1.3em;
 }

 .section-1 li:before {
  content: "\f00c";
  font-family: FontAwesome;
  display: inline-block;
  margin-left: -1.3em;
  width: 1.3em;
  color: #a1a7b3;
 }

 .section-2 {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-3 {
  padding: 2.5px 0px;
 }

 .section-4-header {
  font-size: 22px !important;
  padding-top: 10px !important;
  color: #29303b !important;
 }

 .section-4 ul > li {
  font-size: 15px;
  color: #29303b;
 }

 .section-4 p {
  font-size: 14px;
  color: #29303b;
 }

 .section-5-header {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-6-header {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-6 .item-price {
  font-size: 18px;
 }

 .section-7-header {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-8-header {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-8 .average-rating {
  font-size: 72px;
  padding: 0px;
  margin-top: -20px;
 }

 .section-9-header {
  font-size: 22px;
  padding: 10px 0px;
  color: #29303b;
 }

 .section-8 .individual-rating ul {
  list-style-type: none;
  padding: 0px;
 }

 .section-9 ul {
  list-style-type: none;
  padding: 0px;
 }

 .section-5 {
  color: #29303b;
 }

 .video-tutorials {
  position: absolute;
  z-index: 1;
  right: 200px;
  top: 50px;
  background: white;
  border: 1px solid white;
  box-shadow: 0.5px 1px 5px 0.5px #00000080;
  border-radius: 2px;
  height: 700px;
 }

 .video-tutorials video {
  width: 400px;
  height: 300px;
  border: 10px solid white;
 }

 .video-tutorials.video-details {
  font-size: 16px;
 }

 .video-details {
  padding: 10px;
  padding-left: 20px;
  text-align: center;
 }

 .video-details-header {
  font-size: 24px;
  font-weight: bold;
  text-align: left;
  padding-left: 40px;
 }

 .video-details p {
  font-size: 32px;
 }

 .button {
  border-style: none;
  padding: 15px;
  width: 300px;
 }

 .add-to-cart {
  margin-top: 10px;
  border: black 1px solid;
  background-color: #ffffff;
  font-weight: bold;
  color: #686f7a;
 }

 .buy-now {
  background-color: #ec5252;
  color: #ffffff;
  font-weight: bold;
 }

 .video-descriptions {
  color: #686f7a;
  text-align: left;
  padding-left: 1;
 }

 .video-descriptions p {
  font-size: 14px;
  padding-left: 40px;
  font-weight: bold;
  padding-top: 10px;
 }

 .video-descriptions ul {
  padding-left: 60px;
 }

 .video-descriptions ul li {
  list-style: none;
  padding: 0;
 }

 .section-6 ul li {
  border-bottom: 2px solid #dedfe0;
  padding: 20px 0px;
 }

 .section-6 ul {
  list-style-type: none;
  padding: 0;
  border-bottom: 2px solid #dedfe0;
  border-top: 2px solid #dedfe0;
 }

 .raty-product-section i {
  margin-left: 5px;
  margin-bottom: 10px;
 }

 b {
  color: #29303b;
 }

 .fas.fa-star.star-live {
  color: rgb(245, 200, 91);
 }

 .fas.fa-star.star-dead {
  color: #abb0bb;
 }
</style>