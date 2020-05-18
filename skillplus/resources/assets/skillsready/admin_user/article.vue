<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <my-vuetable></my-vuetable>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <label>Title</label>
        <input type="text" class="form-control" />
      </div>

      <div class="col-lg-6">
        <label>Category</label>
        <select class="form-control" name="cat_id">
          <optgroup v-for="(item, index) in form.category" :label="item.title"></optgroup>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 margin-top">
        <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
      </div>
    </div>

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

<style lang="scss">
@import "../../sass/style.css";
</style>

<script>
import CKEditor from "ckeditor4-vue";
export default {
  data() {
    return {
      editorData: "<p>Content of the editor.</p>",
      editorConfig: {
        // The configuration of the editor.
      },
      form: {
        category: null
      },
      data: {
        article: null
      }
    };
  },
  components: {
    ckeditor: CKEditor.component
  },
  mounted() {
    var vm = this;

    this.getCategory();
  },
  methods: {
    getCategory() {
      axios({
        url: "/admin/user_dashboard/request/category",
        method: "post",
        data: {
          type: "category"
        }
      }).then(function(response) {
        vm.form.category = response.data;
      });
    }
  }
};
</script>