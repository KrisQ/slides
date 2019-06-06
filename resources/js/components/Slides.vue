<template>
  <div>
    <slide :slides="slides" :markdown="markdown"></slide>

    <el-progress :percentage="percentage"></el-progress>

    <div class="block" v-if="slides.length > 0">
      <div :style="{flexGrow: 1}"></div>
      <el-pagination
        ref="paginate"
        class="center-pagination"
        layout="prev, pager, next"
        :total="pagination.totalPages"
        :page-size="pagination.perPage"
        @current-change="select($event)"
      ></el-pagination>
      <div :style="{flexGrow: 1}"></div>
    </div>
  </div>
</template>

<style>
.markdown-card {
  height: 500px;
  overflow: scroll;
}

.block {
  display: flex;
  margin: 0 auto;
}
</style>


<script>
import axios from "axios";
import marked from "marked";
import "marked";
import Slide from "../components/Slide.vue";

export default {
  data() {
    return {
      slides: [],
      markdown: "",
      percentage: 0,
      pagination: {
        totalPages: 0,
        next: "",
        prev: ""
      }
    };
  },
  components: {
    slide: Slide
  },
  mounted() {
    this.fetchSlides();
    const vm = this;
    window.addEventListener("keyup", function(event) {
      if (event.keyCode == 39) {
        vm.next();
      }
      if (event.keyCode == 37) {
        vm.prev();
      }
    });
  },
  methods: {
    fetchSlides() {
      axios
        .get(`slides`)
        .then(res => {
          this.slides = res.data.data;
          this.pagination.totalPages = res.data.total;
          this.pagination.perPage = res.data.per_page;
          this.pagination.currentPAge = res.data.current_page;
          this.pagination.path = res.data.path;
          this.percentage = Math.round(
            (this.pagination.currentPAge / this.pagination.totalPages) * 100
          );
          this.markdown = marked(this.slides[0].markdown);
          console.log(this.slides);
        })
        .catch(err => console.log(err));
    },
    next() {
      this.percentage !== 100 && this.select(this.pagination.currentPAge + 1);
    },
    prev() {
      this.pagination.currentPAge !== 1 &&
        this.select(this.pagination.currentPAge - 1);
    },
    select(e) {
      console.log(e);
      axios
        .get(`slides?page=${e}`)
        .then(res => {
          this.slides = res.data.data;
          this.pagination.totalPages = res.data.total;
          this.pagination.perPage = res.data.per_page;
          this.pagination.currentPAge = res.data.current_page;
          this.pagination.path = res.data.path;
          this.percentage = Math.round(
            (this.pagination.currentPAge / this.pagination.totalPages) * 100
          );

          this.markdown = marked(this.slides[0].markdown);
        })
        .catch(err => console.log(err));
    }
  }
};
</script>

