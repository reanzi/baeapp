<template>
  <div class="mt-2">
      <v-card>
          <v-card-title>
              <div class="headline"> {{data.user}} </div>
              <div class="ml-2">Said {{data.created_at}} </div>
              <v-spacer></v-spacer>
              <like :content = "data"></like>
          </v-card-title>
          <v-divider></v-divider>
          
          <edit-reply v-if="editing" :reply="data"></edit-reply>

          <v-card-text v-else v-html="reply"></v-card-text>

          <v-divider></v-divider>
          
          <div v-if="!editing">
              <v-card-actions>
              <v-btn icon small v-if="own" @click="editReply">
                  <v-icon color="primary">edit</v-icon>
              </v-btn>
              <v-btn icon small v-if="own" @click="destroy">
                  <v-icon color="red">delete</v-icon>
              </v-btn>

              <v-spacer></v-spacer>

              <v-btn icon small>
                  <v-icon color="teal">share</v-icon>
              </v-btn>
              <v-btn icon small>
                  <v-icon color="info">thumb_up</v-icon>
              </v-btn>
              <v-btn icon small>
                  <v-icon color="warning">report</v-icon>
              </v-btn>
          </v-card-actions>
          </div>
      </v-card>
  </div>
</template>

<script>
import EditReply from "./EditReply";
import Like from "../likes/Like";
export default {
  components: { EditReply, Like },
  props: ["data", "index"],
  data() {
    return {
      editing: false
    };
  },
  computed: {
    own() {
      return User.own(this.data.user_id);
    },
    reply() {
      return md.parse(this.data.reply);
    }
  },
  created() {
    this.listen();
  },
  methods: {
    destroy() {
      EventBus.$emit("deleteReply", this.index);
    },
    editReply() {
      this.editing = true;
    },
    listen() {
      EventBus.$on("cancelEditing", () => {
        this.editing = false;
      });
    }
  }
};
</script>

<style>

</style>
