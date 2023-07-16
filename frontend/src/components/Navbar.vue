<template>
  <div class="navbar">
    <div style="cursor: pointer;" @click="$router.push('/')">Главная страница</div>
    <div class="navbar__btns"></div>
    <my-button @click="$router.push('/books')">Библиотека</my-button>
    <my-button @click="$router.push('/about')">О сайте</my-button>
    <my-button @click="$router.push('/my/main')">Личный кабинет</my-button>
    <my-button @click="$router.push('/admin')">Админка</my-button>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.btn {
  margin-left: 20px;
}

.navbar {
  height: 50px;
  background-color: lightgray;
  box-shadow: 2px 2px 4px gray;
  display: flex;
  align-items: center;
  padding: 0 15px;
}

.navbar__btns {
  margin-left: auto;
}
</style>