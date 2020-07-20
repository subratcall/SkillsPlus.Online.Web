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
    :poster="content.thumbnail"
   >
    <source :src="content.video" type=video/webm />
    <source :src="content.video" type=video/ogg />
    <source :src="content.video" type=video/mp4 />
    <source :src="content.video" type=video/3gp />
   </video>
   <div class="video-details">
    <button class="button buy-now">Take Quiz123</button>
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
       :poster="content.thumbnail"
      >
       <source :src="content.video" type=video/webm />
       <source :src="content.video" type=video/ogg />
       <source :src="content.video" type=video/mp4 />
       <source :src="content.video" type=video/3gp />
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

  <!--
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
         &nbsp;&nbsp;{{ value.title }}
        </a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  -->

  <div class="row">
   <div class="col-lg-12">
    <div class="row">
     <div
      class="col-lg-6 offset-lg-1 section-3"
      v-for="(value, index) in content.parts"
      :key="index"
     >
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
        <div v-html="value.description"></div>
        <div class="text-right">
         <a :href="'/admin/user_student/lesson/'+urlid+'/'+value.id">Read full lesson</a>
        </div>
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
       <li
        class="col-lg-12"
        v-for="(value, index) in courseRelatedList"
        :key="index"
        v-show="index < orc_limit"
       >
        <div class="row">
         <div class="col-lg-3">
          <!-- <b>{{ value.duration }} Hours</b> -->
          <video class="padding-top video" id="video" width="100%" controls autoplay="false" poster>
           <source :src="value.meta.video" type=video/webm />
           <source :src="value.meta.video" type=video/ogg />
           <source :src="value.meta.video" type=video/mp4 />
           <source :src="value.meta.video" type=video/3gp />
          </video>
         </div>

         <div class="col-lg-4 row">
          <div class="col-lg-12">
           <div class="row">
            <div class="col-lg-12 md-text-center">
             <a href>{{ value.title }}</a>
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
        <div class="row" v-show="index + 1 == orc_limit">
         <div class="col-lg-12 text-center">
          <a @click="orc_limit += 5">See more</a>
          <i class="fa fa-angle-down"></i>
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
          :src="vendorAvatar"
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
       <div
        class="row"
        v-for="(value_a, index_a) in courseReview"
        :key="index_a"
        v-show="index_a < cr_limit"
       >
        <div class="col-lg-12">
         <div class="row">
          <div class="col-4 col-sm-2">
           <img :src="value_a.avatar" width="46" alt />
          </div>

          <div class="col-4 col-sm-2">
           <p>
            {{ value_a.name }}
            <br />
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
         <div class="row" v-show="index_a + 1 == cr_limit">
          <div class="col-lg-12 text-center">
           <a @click="cr_limit += 5">See more</a>
           <i class="fa fa-angle-down"></i>
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



