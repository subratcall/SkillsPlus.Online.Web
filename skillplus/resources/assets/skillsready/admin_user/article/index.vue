<template>
  <div>
    <div class="row margin-bottom">
      <div class="col-lg-12">
        <ul class="navigation nav nav-pills">
          <li class="nav-item">
            <a
              :class="[ tab == 'list' ? 'nav-link active' : 'nav-link']"
              @click="tab = 'list'"
            >My Articles</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              :class="[ tab == 'new' ? 'nav-link active' : 'nav-link']"
              @click="tab = 'new'"
            >New Article</a>
          </li>
        </ul>
      </div>
    </div>

    <transition name="fade">
      <div v-if="tab == 'list'">
        <article-list></article-list>
      </div>

      <div v-if="tab == 'new'">
        <article-new></article-new>
      </div>
    </transition>

    <!-- <div class="row">
      <div class="col-lg-12">
        <form method="post" action="/admin/user_dashboard/request/article">
          <input type="hidden" name="sort" value="title" />
          <input type="hidden" name="type" value="list" />
          <button type="submit">submit</button>
        </form>
      </div>
    </div>-->
  </div>
</template>
<script>
import ListComponent from "./list.vue";
import NewComponent from "./new.vue";

export default {
  data() {
    return {
      tab: "list"
    };
  },
  components: {
    "article-list": ListComponent,
    "article-new": NewComponent
  },
  events: {
    'redirect-tab': function() {
      this.tab = "list"
    }
  }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>

<style lang="scss">
@import "../../../sass/style.css";
</style>
