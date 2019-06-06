<template>
  <div>
    <h3 v-if="slides.length === 0" :style="{textAlign: 'center'}">No Slides</h3>
    <el-card v-if="slides[0]" class="markdown-card">
      <div>
        <div>
          <span v-html="markdown"></span>
        </div>
      </div>
    </el-card>
    <br>
  </div>
</template>

<script>
export default {
  props: ["slides", "markdown"]
};
</script>