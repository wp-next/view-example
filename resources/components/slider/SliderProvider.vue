<template>
  <div>
      <button @click="counter++">
          count = {{ counter }}
      </button>
  </div>
</template>

<script>
export default {
    data: () => ({
        counter: 0
    })
}
</script>

<style scoped>
button {
    color: green;
}
</style>