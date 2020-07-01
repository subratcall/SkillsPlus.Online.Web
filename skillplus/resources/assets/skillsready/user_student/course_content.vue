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
      <div class="raty-product-section">
       <span class>Vendor: {{ vendorName }}</span>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="row video-tablet margin-top-next">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-12">
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
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row margin-top-next">
     <div class="col-lg-6 offset-lg-1 section-1">
      <h5>What will i learn?</h5>
      <ul>
       <li v-for="(value, index) in courseWhatWillLearn" :key="index">{{ value.desc }}</li>
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
      <p style="display:inline; font-size:14px"></p>
     </div>
    </div>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div class="col-lg-6 offset-lg-1 section-3" v-for="(value, index) in quizList" :key="index">
      <div class="header-custom-border">
       <div class="row">
        <div class="col-lg-12">
         <a
          class="btn"
          data-toggle="collapse"
          :data-target="'#collapse_'+index"
          style="display:inline; font-size:15px"
         >
          <i class="fas fa-plus" style="color: #007791"></i>
          &nbsp;&nbsp; {{ value.title }}
         </a>
         <div class="float-right">
          <i class="fa fa-check-circle video-done text-right" aria-hidden="true"></i>
         </div>
        </div>
       </div>
      </div>

      <div :id="'collapse_'+index" class="collapse">
       <div class="list-custom-border">
        <a href="javascript:void(0)" @click="takeQuiz(value.id)">
         <!-- <i class="fas fa-play-circle"></i> -->
         &nbsp;&nbsp;{{ value.title }}
        </a>
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
       <li v-for="(value, index) in requirements" :key="index">{{ value.req }}</li>
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
       <li class="col-lg-12" v-for="(value, index) in courseRelatedList" :key="index">
        <div class="row">
         <div class="col-lg-3">
          <!-- <b>{{ value.duration }} Hours</b> -->
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
         </div>

         <div class="col-lg-4 row">
          <div class="col-lg-12">
           <div class="row">
            <div class="col-lg-12 md-text-center">
             <a
              href="https://demo.academy-lms.com/addon/home/course/how-to-shoot-b-roll-footage-with-peter-mckinnon/26"
             >{{ value.title }}</a>
            </div>
           </div>
           <div class="row">
            <div class="col-lg-12 md-text-center">
             <div class="updated-time">{{ formatDate(value.create_at) }}</div>
            </div>
           </div>
          </div>
         </div>

         <div class="col-lg-3 row">
          <div class="col-lg-6 md-text-center">
           <span class="item-rating">
            <i class="fas fa-star star-live"></i>
            <span class="d-inline-block average-rating">{{ value.rate }}</span>
           </span>
          </div>
          <div class="col-lg-6 md-text-center">
           <span class="enrolled-">
            <i class="far fa-user"></i>
            {{ value.sold }}
           </span>
          </div>
         </div>

         <div class="col-lg-2 float-sm-center float-md-right md-text-center">
          <span class="item-price">
           <span class="current-price">
            <b>{{ (value.price_post) ? value.price_post+' $' : "Not Available" }}</b>
           </span>
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
        <p class="section-7-header">About the instructor</p>
       </div>
      </div>
      <div class="col-lg-12 row">
       <div class="col-lg-4 vendor-profile">
        <div class="col-xs-6">
         <img
          src="https://demo.academy-lms.com/addon/uploads/user_image/1.jpg"
          class="rounded-circle"
         />
        </div>
        <div class="col-xs-6">
         <ul>
          <li>
           <i class="fas fa-comment"></i>&nbsp;5 Reviews
          </li>
          <li>
           <i class="fas fa-user"></i>&nbsp;3 Students
          </li>
          <li>
           <i class="fas fa-play-circle"></i>
           &nbsp;{{ vendorCountCourses }} Courses
          </li>
         </ul>
        </div>
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
           <b>{{ courseRate }}</b>
          </div>
          <div class="rating">
           <i
            class="fas fa-star filled"
            v-for="(value, index) in 5"
            :key="index"
            style="display:inline"
            :class="{'star-live': (index <= courseRate), 'star-dead': (index >= courseRate)}"
           ></i>
          </div>Average rating
         </div>
        </div>
        <div class="col-lg-9 margin-top-next">
         <div class="individual-rating">
          <ul>
           <li>
            <div class="progress">
             <div class="progress-bar" :style="'width: '+studentRate.onestar+'%'"></div>
            </div>
            <div>
             <span class="rating">
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-live"></i>
             </span>
             <span>{{ studentRate.onestar }}%</span>
            </div>
           </li>
           <li>
            <div class="progress">
             <div class="progress-bar" :style="'width: '+studentRate.twostar+'%'"></div>
            </div>
            <div>
             <span class="rating">
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
             </span>
             <span>{{ studentRate.twostar }}%</span>
            </div>
           </li>
           <li>
            <div class="progress">
             <div class="progress-bar" :style="'width: '+studentRate.threestar+'%'"></div>
            </div>
            <div>
             <span class="rating">
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
             </span>
             <span>{{ studentRate.threestar }}%</span>
            </div>
           </li>
           <li>
            <div class="progress">
             <div class="progress-bar" :style="'width: '+studentRate.fourstar+'%'"></div>
            </div>
            <div>
             <span class="rating">
              <i class="fas fa-star star-dead"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
             </span>
             <span>{{ studentRate.fourstar }}%</span>
            </div>
           </li>
           <li>
            <div class="progress">
             <div class="progress-bar" :style="'width: '+studentRate.fivestar+'%'"></div>
            </div>
            <div>
             <span class="rating">
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
              <i class="fas fa-star star-live"></i>
             </span>
             <span>{{ studentRate.fivestar }}%</span>
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
       <div class="row" v-for="(value_a, index_a) in courseReview" :key="index_a">
        <div class="col-lg-12">
         <div class="row">

          <div class="col-4 col-sm-2">
           <img src="https://demo.academy-lms.com/addon/uploads/user_image/6.jpg" width="46" alt />
          </div>

          <div class="col-4 col-sm-2">
           <p>
            {{ value_a.name }}<br>
            {{ formatDate(value_a.create_at) }}
            </p>
          </div>

          <div class="col-4 col-sm-6">
           <div class="row">
            <div class="col-12">
             <div class="comment">{{ value_a.comment }}</div>
            </div>
            <div class="col-12">
             <div v-for="(value_b, index_b) in 5" :key="index_b" style="display:inline">
              <i
               class="fas fa-star filled"
               :class="{'star-live': (value_b <= value_a.rate), 'star-dead': (value_b >= value_a.rate)}"
              ></i>
             </div>
            </div>
           </div>
          </div>

         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
</template>




<script>
 import moment from "moment";

 export default {
  data() {
   return {
    course: [],
    courseRate: 0,
    courseUnrate: 0,
    countCourseSold: 0,
    courseWhatWillLearn: [],
    vendorName: "",
    quizList: [],
    requirements: [],
    urlid: "",
    description: "",
    vendorCountCourses: 0,
    userAbout: "",
    courseReview: [],
    commentName: "",
    courseRelatedList: [],
    studentRate: {
     onestar: 0,
     twostar: 0,
     threestar: 0,
     fourstar: 0,
     fivestar: 0
    }
   };
  },
  methods: {
   takeQuiz(id) {
    window.location.href = `/admin/user_student/student_lesson_quiz/${id}/${this.urlid}`;
   },

   formatDate(value, fmt = "D MMM YYYY") {
    value = new Date(value);
    return value == null ? "" : moment(value, "YYYY-MM-DD").format(fmt);
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

   getCourseTag(data) {
    /* get course tag */
    axios
     .get(`/admin/user_vendor/vendor_course_related/${data}`)
     .then(res => {
      this.courseRelatedList = res.data;
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
      self.requirements = res.data.requirements.split("|");
      self.getAbout(res.data.user_id);
      self.getCourseTag(res.data.tag);
      self.courseReview = res.data.user_comment;
     })
     .catch(err => {
      console.log(err);
      alert("Error! Contact IT Department.");
     });

    /* get product */

    axios
     .get(`/admin/user_vendor/product/${id}`)
     .then(res => {
      self.description = res.data.product.courseDescription;
     })
     .catch(err => {
      console.log(err);
      alert("Error! Contact IT Department.");
     });

    /* get what will learn */

    axios
     .get(`/admin/user_vendor/cl/${id}`)
     .then(res => {
      self.courseWhatWillLearn = res.data.data;
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

    /*     axios
                                                                   .get(`/admin/user_vendor/vendor_course_comment/135/116`)
                                                                   .then(res => {
                                                                    console.log(res);
                                                                    this.courseReview = res.data;
                                                                   })
                                                                   .catch(err => {
                                                                    console.error(err);
                                                                    alert("Error! Contact IT Department.");
                                                                   });
                                                               */

    /* get course requirement */

    axios
     .get(`/admin/user_vendor/cr/${id}`)
     .then(res => {
      this.requirements = res.data.data;
     })
     .catch(err => {
      console.error(err);
      alert("Error! Contact IT Department.");
     });

    /* get individual rating */

    axios.get(`/admin/user_vendor/ir/${id}`).then(res => {
     let data = res.data;
     let onestar = 0;
     let twostar = 0;
     let threestar = 0;
     let fourstar = 0;
     let fivestar = 0;

     data.forEach(item => {
      if (item.rate == 1) {
       onestar += item.rate;
      } else if (item.rate == 2) {
       twostar += item.rate;
      } else if (item.rate == 3) {
       threestar += item.rate;
      } else if (item.rate == 4) {
       fourstar += item.rate;
      } else if (item.rate == 5) {
       fivestar += item.rate;
      }
     });

     onestar = onestar / 5;
     onestar = (onestar / 5) * 100;

     twostar = twostar / 5;
     twostar = (twostar / 5) * 100;

     threestar = threestar / 5;
     threestar = (threestar / 5) * 100;

     fourstar = fourstar / 5;
     fourstar = (fourstar / 5) * 100;

     fivestar = fivestar / 5;
     fivestar = (fivestar / 5) * 100;

     self.studentRate.onestar = onestar;
     self.studentRate.twostar = twostar;
     self.studentRate.threestar = threestar;
     self.studentRate.fourstar = fourstar;
     self.studentRate.fivestar = fivestar;
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
 @media (max-width: 1980px) {
  .video-tutorials {
   right: 5% !important;
   width: 400px !important;
  }

  .video-tablet {
   display: none;
  }
 }

 @media (max-width: 1600px) {
  .video-tutorials {
   right: 4% !important;
   width: 350px !important;
  }
 }

 @media (max-width: 1300px) {
  .video-tutorials {
   right: 1% !important;
   width: 350px !important;
  }

  .title {
   margin-left: -20px !important;
   width: 400px !important;
  }
 }

 @media (max-width: 1200px) {
  .video-tutorials {
   right: 0.5% !important;
   width: 40% !important;
  }

  .title {
   margin-left: -20px !important;
   width: 400px !important;
  }
 }

 @media (max-width: 1180.98px) {
  .video-tutorials {
   right: 0.1% !important;
   width: 38% !important;
  }

  .title {
   margin-left: -80px !important;
   width: 400px !important;
  }
 }

 @media (max-width: 991.98px) {
  .video-tutorials {
   display: none;
  }

  .title {
   margin-left: -80px !important;
   width: 500px;
  }

  .video-tablet {
   display: inline;
   padding: 0px;
   width: 100%;
  }

 }

 @media (max-width: 767.98px) {
  .video-tutorials {
   display: none;
  }
  
   .md-text-center {
   text-align: center !important;
  }
 }

 @media (max-width: 575.98px) {
  .video-tutorials {
   display: none;
  }

  .md-text-center {
   text-align: center !important;
  }

 }

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
  padding-top: 10px;
  padding-bottom: 10px;
  padding-right: 10px;
 }

 .video-done {
  color: black;
  font-size: 18px;
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
  font-size: 14px;
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
  width: 100%;
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
  width: 100% !important;
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