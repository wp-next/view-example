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

<style lang="postcss" scoped>
button {
    color: green;
    padding: calc(1px + 2px);
}
</style>