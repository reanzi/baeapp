<template>
    <v-layout>
    	<v-flex xs12 sm8 offset-sm2><br>
            <h2>Create A Question..</h2>
            <br>
            <v-form @submit.prevent="ask">
                    <v-text-field
                        label="Title"
                        v-model="form.title"
                        type="text"
                        required
                    ></v-text-field>
                    <!-- <br> -->
                    <v-select
                        :items="categories"
                        v-model="form.category_id"
                        item-text="name"
                        item-value="id"
                        label="Category"
                        autocomplete
                    ></v-select>

                    <markdown-editor v-model="form.body"></markdown-editor>

                    <v-btn
                    color="cyan white--text"
                    type="submit"
                    >Ask</v-btn>
                </v-form>
        </v-flex>
    </v-layout>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: null,
        category_id: null,
        body: null
      },
      categories: [],
      errors: {}
    };
  },
  created() {
    axios.get("/api/category").then(res => (this.categories = res.data.data));
  },
  methods: {
    ask() {
      axios
        .post("/api/question", this.form)
        .then(res => this.$router.push(res.data.path))
        .catch(error => (this.errors = error.response.data.error));
    }
  }
};
</script>
 
<style>

</style>
