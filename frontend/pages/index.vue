<template>
  <div class="container col-md-6 col-lg-4 m-auto">
    <div class="alert alert-success mt-5" role="alert">
      <div v-if="isLoading" class="loader-lg">
        <i class="ivu-load-loop ivu-icon ivu-icon-ios-loading"></i>
      </div>
      <div v-else class="p-2">
        <h4 class="alert-heading mb-2">Hello!!! Welcome To</h4>
        <h5>Laravel-Nuxt template</h5>
        <hr class="mb-2 mt-2" />
        <h6>{{ text }}</h6>
        <h6 class="mb-0">BASE_URL: {{ port }}</h6>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      isLoading: true,
      text: "",
      port: this.$config.BASE_URL,
    };
  },
  methods: {},

  async created() {
    console.log("index page");
    const response = await this.callApi(
      "get",
      "/app/verify_backend_connection"
    );
    if (response.status == 200) {
      this.text = response.data.data;
      this.isLoading = false;
    }
  },
};
</script>
