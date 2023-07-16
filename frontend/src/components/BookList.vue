<template>
  <div v-if="books.length> 0">
    <h3>Список книг</h3>
    <transition-group name="book-list">
      <book-item
        v-for="book in books"
        :book="book"
        :key="books.id"
        @remove="$emit('remove',book)"
      />
    </transition-group>
  </div>
  <h2 v-else style="color: red">
    Список книг пуст
  </h2>
</template>

<script>
import BookItem from "@/components/BookItem.vue";
export default {
  components: {BookItem},
  props:{
    books:{
      type: Array,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
.user-list-item {
  display: inline-block;
  margin-right: 10px;
}

.user-list-enter-active,
.user-list-leave-active {
  transition: all 0.4s ease;
}

.user-list-enter-from,
.user-list-leave-to {
  opacity: 0;
  transform: translateX(130px);
}

.user-list-move {
  transition: transform 0.4s ease;
}
</style>