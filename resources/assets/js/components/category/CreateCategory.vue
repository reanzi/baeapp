<template>
  <v-container>
      <v-form @submit.prevent="submit">
          <v-text-field
          label="Category Name"
          v-model="form.name"
          require></v-text-field>

          <v-btn type="submit" color="indigo white--text" v-if="editSlug">update</v-btn>
          <v-btn type="submit" color="teal white--text" v-else>Create</v-btn>
      </v-form>
      <hr>
      <v-card class="mt-2">
          <v-toolbar color="cyan" dark dense height="35px">
              <v-toolbar-title>Categories Available</v-toolbar-title>
          </v-toolbar>
        <div v-for="category in categories" :key="category.id">
            <v-list-tile>
              <v-list-tile-action>
                  <v-btn icon small @click="edit(index)">
                      <v-icon color="orange">edit</v-icon>
                  </v-btn>
              </v-list-tile-action>

              <v-list-tile-content>
                  <v-list-tile-title>
                      {{category.name}}
                  </v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-action>
                  <v-btn icon small @click="destroy(category.slug,index)">
                      <v-icon color="red">delete</v-icon>
                  </v-btn>
              </v-list-tile-action>
              <hr>
          </v-list-tile>
          <v-divider></v-divider>
        </div>
          
      </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null
      },
      categories: {},
      editSlug: null
    };
  },
  created() {
    if (!User.admin()) {
      this.$router.push("/forum");
    }
    axios.get("/api/category").then(res => (this.categories = res.data.data));
  },
  methods: {
    submit() {
      this.editSlug ? this.update() : this.create();
    },
    update() {
      axios.patch(`/${this.editSlug}`, this.form).then(res => {
        // unshift is used to push data to the top of a list
        this.categories.unshift(res.data);
        this.form.name = null;
      });
    },
    create() {
      axios.post("/api/category", this.form).then(res => {
        // unshift is used to push data to the top of a list
        this.categories.unshift(res.data);
        this.form.name = null;
      });
    },
    destroy(slug, index) {
      axios
        .delete(`/api/category/${slug}`)
        .then(res => this.categories.splice(index, 1));
    },
    edit(index) {
      this.form.name = this.categories[index].name;
      this.editSlug = this.categories[index].slug;
      this.categories.splice(index, 1);
    }
  }
};
</script>

<style scoped>

</style>
