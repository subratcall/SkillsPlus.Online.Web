<style>
.btn-save-article {
  margin-top: 30px;
}
</style>
<template>
  <div>
    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Title</label>
          </div>
          <div class="col-8">
            <input type="text" class="form-control" />
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label>Category</label>
          </div>
          <div class="col-8">
            <select class="form-control" name="cat_id">
              <optgroup v-for="(item, index) in form.category" :label="item.title" :key="index">
                <option v-for="(item, index) in item.submenu" :key="index">{{ item.title }}</option>
              </optgroup>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row margin-top">
      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label class="control-label">Thumbnail</label>
          </div>
          <div class="col-8">
            <input type="text" name="image" dir="ltr" class="form-control" />
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="row">
          <div class="col-4">
            <label class="control-label">Status</label>
          </div>
          <div class="col-8">
            <select class="form-control font-s" name="mode">
              <option value="draft">Draft</option>
              <option value="request">Send for review</option>
              <option value="delete">Unpublish Request</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 margin-top">
        <label>Article Summary</label>
        <ckeditor v-model="form.summary" :config="editorConfig"></ckeditor>
      </div>
    </div>
    <div class="row">
      <div class="col-12 margin-top">
        <label>Description</label>
        <ckeditor v-model="form.description" :config="editorConfig"></ckeditor>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <input type="submit" value="Save Article" class="btn btn-custom btn-save-article" />
      </div>
    </div>
  </div>
</template>

<script>
import CKEditor from "ckeditor4-vue";
export default {
  data() {
    return {
      editorConfig: {
        // The configuration of the editor.
      },
      form: {
        category: null,
        summary: "<p>Content of the editor.</p>",
        description: "<p>Content of the editor.</p>"
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
    this.getCategory();
  },
  methods: {
    getCategory() {
      let vm = this;
      axios({
        url: "/admin/user_dashboard/request/category",
        method: "get"
      }).then(function(response) {
        vm.form.category = response.data;
        console.log(vm.form.category);
      });
    }
  }
};
</script>