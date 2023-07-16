<template>
  <div class="book" @click="$router.push(`/books/${book.id}`)">
    <div class="book__tmp">
      <div class="book__id"><strong>{{ book.id }}</strong></div>
      <div class="book__title"><strong>Название:</strong> {{ book.title }}</div>
      <div class="book__body"><strong>Описание:</strong> {{ book.body }}</div>
    </div>
    <div class="book__btns">
      <my-button>
        Открыть
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
  border: 2px solid #005bff;
  border-radius: 20px;
  cursor: pointer;
  width: 220px;
  height: 400px;
  margin: 20px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.book__btns {
  align-items: end;
}

.book__tmp {
  display: flex;
  flex-direction: column;
  height: 80%;
}

.book__id {
  height: 30px;
  display: flex;
  justify-content: center;
}

.book__title {
  height: 90px;
}

.book__body {

}
</style>