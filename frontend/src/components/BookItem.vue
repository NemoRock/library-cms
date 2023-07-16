<template>
  <div class="book">
    <div>
      <div>{{ book.id }}</div>
      <div><strong>Название:</strong> {{ book.title }}</div>
      <div><strong>Описание:</strong> {{ book.body }}</div>
    </div>
    <div class="book__btns">
      <my-button
          @click="$router.push(`/books/${book.id}`)"
      >
        Открыть
      </my-button>
      <my-button
          @click="$emit('remove', book)"
      >
        Удалить
      </my-button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    book: {
      type: Object,
      required: true,
    }
  }
}
</script>

<style scoped>
.book {
  padding: 15px;
  border: 2px solid teal;
  margin-top: 15px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.book__btns {
  display: flex;
}
</style>