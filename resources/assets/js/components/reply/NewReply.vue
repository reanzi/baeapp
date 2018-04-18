<template>
    <div class="mt-4">
        <h1>New Reply</h1>
        <markdown-editor v-model="body"></markdown-editor>
        <v-btn
            color="cyan white--text"
            @click="sendReply">Send Reply</v-btn>
    </div>
</template>

<script>
export default {
  props: ["questionSlug"],
  data() {
    return {
      body: null,
      errors: {}
    };
  },
  methods: {
    sendReply() {
      axios
        .post(`/api/question/${this.questionSlug}/reply`, {
          body: this.body
        })
        .then(res => {
          this.body = "";
          EventBus.$emit("newReply", res.data.reply);
          window.scrollTo(0, 0);
        });
    }
  }
};
</script>

<style>

</style>
