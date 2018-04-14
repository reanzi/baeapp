<template>
     <v-card>
 <v-container>
     <v-form @submit.prevent="update">
         <v-text-field
            label="Title"
            v-model="form.title"
            type="text"
            required
            ></v-text-field>

            <markdown-editor v-model="form.body"></markdown-editor>

            <v-btn
                color="cyan white--text"
                type="submit"
                >save changes</v-btn>

            <v-btn
                color="grey white--text"
                @click="cancel"
                >Cancel</v-btn>

     </v-form>
 </v-container>
     </v-card>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
      form: {
        title: null,
        body: null
      }
    };
  },
  methods: {
    update() {
      axios
        .patch(`/api/question/${this.form.slug}`, this.form)
        .then(res => this.cancel());
    },
    cancel() {
      EventBus.$emit("cancelEditing");
    }
  },
  created() {
    this.form = this.data;
  }
};
</script>

<style>

</style>
