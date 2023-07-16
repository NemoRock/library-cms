<template>
  <div class="btn">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'my-button'
}
</script>

<style lang="scss" scoped>
.btn {
  padding: 10px 15px;
  background: none;
  color: #005bff;
  border: 1px solid #005bff;
  cursor: pointer;
  display: flex;
  justify-content: center;
  border-radius: 10px;
}
</style>