<template>
  <div>
      <!-- <v-btn icon>
          <v-icon color="grey">favorite</v-icon>
      </v-btn> -->
    <v-btn icon @click="likeIt">
        <v-badge right>
            <span slot="badge"> {{count}} </span>
            <v-icon :color="color">favorite</v-icon>
        </v-badge>
    </v-btn>
  </div>
</template>

<script>
export default {
  props: ["content"],
  data() {
    return {
      liked: this.content.liked,
      count: this.content.like_count
    };
  },
  computed: {
    color() {
      return this.liked ? "red" : "red lighten-4";
    }
  },
  methods: {
    likeIt() {
      if (User.loggedIn()) {
        this.liked ? this.decr() : this.incr();
        this.liked = !this.liked;
      }
    },
    incr() {
      axios.post(`/api/like/${this.content.id}`).then(res => this.count++);
    },
    decr() {
      axios.delete(`/api/like/${this.content.id}`).then(res => this.count--);
    }
  }
};
</script>

<style>

</style>
