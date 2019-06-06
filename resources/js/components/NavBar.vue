<template>
  <div>
    <el-menu
      :default-active="activeIndex2"
      class="nav-flex"
      mode="horizontal"
      @select="handleSelect"
      :router="true"
    >
      <!-- background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b"-->

      <!-- <el-menu-item index="/">Home 🔪</el-menu-item> -->
      <div class="nav-flex-grow"></div>
      <el-menu-item class="hidden-xs-only" index="/">Home 🏡</el-menu-item>
      <el-menu-item class="hidden-xs-only" index="/add">Add Slide ✏️</el-menu-item>
      <el-submenu class="hidden-sm-and-up" index="1">
        <template slot="title">Menu</template>
        <el-menu-item index="/">Home 🏡</el-menu-item>
        <el-menu-item index="/add">Add Slide ✏️</el-menu-item>
      </el-submenu>
    </el-menu>
  </div>
</template>

<style>
.nav-flex {
  display: flex;
}
.nav-flex-grow {
  flex-grow: 1;
}
</style>


<script>
export default {
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "1"
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>
