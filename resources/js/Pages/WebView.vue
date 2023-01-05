<template>
  <div class="flex justify-center sombra">
    <iframe
      ref="iframe"
      src="https://docs.google.com/forms/d/e/1FAIpQLSe_SVRwWOR6qhDSRo3LIIkwmTWNihYGQ2s7ByR9MrZnEpThJg/viewform"
      width="1024"
      height="1024"
    />
  </div>
</template>

<script>
export default {
  mounted() {
    // Aqui você pode acessar o iframe através da propriedade $refs
    const iframe = this.$refs.iframe;
    console.log(iframe);
  },
};
</script>
<style scoped>
body {
  border-radius: 76px;
  background: linear-gradient(145deg, #f0f0f0, #cacaca);
  box-shadow: 20px 20px 25px #b1b1b1, -20px -20px 25px #ffffff;
}
</style>
