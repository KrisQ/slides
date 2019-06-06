<template>
  <el-card class="box-card">
    <div slot="header" class="clearfix">
      <span>Create Slide</span>
    </div>
    <el-alert v-if="error" type="error">
      <p>All fields are required 😕</p>
    </el-alert>
    <el-form ref="form" method="post">
      <!-- <el-form-item label="markdown">
        <el-input type="textarea" id="email" placeholder="#Hello World" v-model="markdown" required></el-input>
      </el-form-item>-->
      <div id="editor">
        <textarea :value="markdown" @input="update"></textarea>
        <div class="compiled-markdown" v-html="compiledMarkdown"></div>
      </div>
      <br>
      <el-form-item>
        <el-button :style="{width: '100%'}" type="primary" @click.prevent="onSubmit">Add</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>

<style scoped>
html,
body,
#editor {
  border: 1px solid #ccc;
  margin: 0;
  height: 100%;
  font-family: "Helvetica Neue", Arial, sans-serif;
  color: #333;
}

textarea,
#editor div {
  display: inline-block;
  width: 49%;
  height: 500px;
  vertical-align: top;
  box-sizing: border-box;
  padding: 0 20px;
}

textarea {
  border: none;
  border-right: 1px solid #ccc;
  resize: none;
  outline: none;
  background-color: #f6f6f6;
  font-size: 14px;
  font-family: "Monaco", courier, monospace;
  padding: 20px;
}

code {
  color: #f66;
}

.compiled-markdown {
  overflow: scroll;
}
</style>


<script>
import axios from "axios";
import _ from "lodash";
import marked from "marked";
import "marked";

export default {
  data() {
    return {
      markdown: "",
      error: ""
    };
  },
  computed: {
    compiledMarkdown: function() {
      return marked(this.markdown, { sanitize: true });
    }
  },
  methods: {
    update: _.debounce(function(e) {
      this.markdown = e.target.value;
    }, 300),
    onSubmit() {
      axios
        .post("createSlide", {
          markdown: this.markdown
        })
        .then(data => {
          this.$router.push("/");
        })
        .catch(error => {
          console.log(error);
          this.error = true;
        });
    }
  }
};
</script>
