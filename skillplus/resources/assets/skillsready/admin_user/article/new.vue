<style>
.btn-save-article {
  margin-top: 30px;
}

/* input {
  border: 1px solid silver;
  border-radius: 4px;
  background: white;
  padding: 5px 10px;
}

.dirty {
  border-color: #5a5;
  background: #efe;
}

.dirty:focus {
  outline-color: #8e8;
}

.error {
  border-color: red;
  background: #fdd;
}

.error:focus {
  outline-color: #f99;
} */

input {
  border: 1px solid silver;
  border-radius: 4px;
  background: white;
  padding: 5px 10px;
}

.error {
  color: red;
}

.error:focus {
  color: red;
}

.error-border {
  border: 1px solid red !important;
}

.valid {
  border-color: #5a5;
  background: #efe;
}

.valid:focus {
  outline-color: #8e8;
}
</style>
<template>
  <div>
    <!-- <div>
      <form method="post" action="/admin/user_dashboard/request/article/store">
        <input type="hidden" name="title" value="test" />
        <input type="hidden" name="cat_id" value="1" />
        <input type="hidden" name="pre_text" value="test" />
        <input type="hidden" name="text" value="test" />
        <input type="hidden" name="image" value="test" />
        <input type="hidden" name="mode" value="test" />
        <button type="submit">Submit</button>
      </form>
    </div>-->

    <form @submit="add">
      <div class="row">
        <!-- <div class="col-6">
          <input
            type="text"
            placeholder="login"
            v-model="user"
            v-on:input="$v.user.$touch"
            v-bind:class="{error: $v.user.$error, valid: $v.user.$dirty && !$v.user.$invalid}"
          />

          <pre>{{ $v.user }}</pre>
        </div>-->

        <div class="col-6">
          <div class="row">
            <div class="col-4">
              <label>Title</label>
            </div>
            <div class="col-8">
              <!-- <pre>{{ $v.input.title }}</pre> -->

              <input
                type="text"
                class="form-control"
                v-model="input.title"
                v-on:input="$v.input.title.$touch"
                v-bind:class="{'error-border': $v.input.title.$error}"
              />
              <div
                class="error"
                v-if="$v.input.title.$error || $v.input.title.$dirty && !$v.input.title.$invalid && !$v.input.title.required"
              >Field is required</div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="row">
            <div class="col-4">
              <label>Category</label>
            </div>
            <div class="col-8">
              <select
                class="form-control"
                v-model="input.cat_id"
                v-on:input="$v.input.cat_id.$touch"
                v-bind:class="{'error-border': $v.input.cat_id.$error}"
              >
                <optgroup v-for="(item, index) in form.category" :label="item.title" :key="index">
                  <option
                    v-for="(item, index) in item.submenu"
                    :key="index"
                    :value="item.id"
                  >{{ item.title }}</option>
                </optgroup>
              </select>
              <div
                class="error"
                v-if="$v.input.cat_id.$error || $v.input.cat_id.$dirty && !$v.input.cat_id.$invalid && !$v.input.cat_id.required"
              >Field is required</div>
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
              <input type="text" dir="ltr" class="form-control" v-model="input.image" />
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="row">
            <div class="col-4">
              <label class="control-label">Status</label>
            </div>
            <div class="col-8">
              <select
                class="form-control font-s"
                v-model="input.mode"
                v-on:input="$v.input.mode.$touch"
                v-bind:class="{'error-border': $v.input.mode.$error}"
              >
                <option value="draft">Draft</option>
                <option value="request">Send for review</option>
                <option value="delete">Unpublish Request</option>
              </select>
              <div
                class="error"
                v-if="$v.input.mode.$error || $v.input.mode.$dirty && !$v.input.mode.$invalid && !$v.input.mode.required"
              >Field is required</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 margin-top">
          <label>Article Summary</label>
          <ckeditor
            v-model="input.pre_text"
            :config="editorConfig"
            v-on:input="$v.input.pre_text.$touch"
            v-bind:class="{'error-border': $v.input.pre_text.$error}"
          ></ckeditor>
        </div>
      </div>
      <div class="row">
        <div class="col-12 margin-top">
          <label>Description</label>
          <ckeditor
            v-model="input.text"
            v-on:input="$v.input.text.$touch"
            :config="editorConfig"
            v-bind:class="{'error-border': $v.input.text.$error}"
          ></ckeditor>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <input
            type="submit"
            value="Save Article"
            class="btn btn-success btn-custom btn-save-article"
          />
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import CKEditor from "ckeditor4-vue";
import Vuelidate from "vuelidate";
import { required, minLength, between } from "vuelidate/lib/validators";
Vue.use(Vuelidate);

export default {
  data() {
    return {
      editorConfig: {
        // The configuration of the editor.
        placeholder: "Type the content here!"
      },
      input: {
        title: "",
        cat_id: "",
        image: "",
        mode: "",
        pre_text: "<p>Content of the editor.</p>",
        text: "<p>Content of the editor.</p>"
      },
      form: {
        category: ""
      },
      data: {
        article: null
      }
    };
  },
  validations: {
    input: {
      title: {
        required
      },
      cat_id: {
        required
      },
      mode: {
        required
      },
      pre_text: {
        required
      },
      text: {
        required
      }
    }
  },
  components: {
    ckeditor: CKEditor.component
  },
  mounted() {
    this.getCategory();
  },

  methods: {
    add(e) {
      e.preventDefault();

      this.$v.$touch();

      if (this.$v.$invalid) {
        return false;
      } else {
        axios
          .post("/admin/user_dashboard/request/article/store", this.input)
          .then(res => {
            this.$events.fire("redirect-tab");
          });
      }
    },

    getCategory() {
      let vm = this;
      axios({
        url: "/admin/user_dashboard/request/category",
        method: "get"
      }).then(function(response) {
        vm.form.category = response.data;
      });
    }
  },
  events: {
    "custom-action": function(action, data, index) {
      console.log("hello world");
    }
  }
};
</script>