<template>
  <div v-if="books.length> 0">
    <h3>Список книг</h3>
    <div class="book__list">
      <transition-group name="book-list">
        <book-item
            v-for="book in books"
            :book="book"
            :key="books.id"
            @remove="$emit('remove',book)"
        />
      </transition-group>
    </div>
  </div>
  <h2 v-else style="color: red">
    Список книг пуст
  </h2>
</template>

<script>
import BookItem from "@/components/BookItem.vue";

export default {
  components: {BookItem},
  props: {
    books: {
      type: Array,
      required: true
    }
  }
}
</script>

<style scoped>
.book__list {
  display: flex;
  align-content: flex-start;
  align-items: stretch;
  flex-direction: row;
  flex-wrap: wrap;
}

.book-list-item {
  display: inline-block;
  margin-right: 10px;
}

.book-list-enter-active,
.book-list-leave-active {
  transition: all 0.4s ease;
}

.book-list-enter-from,
.book-list-leave-to {
  opacity: 0;
  transform: translateY(30px);
}

.book-list-move {
  transition: transform 0.4s ease;
}
</style>