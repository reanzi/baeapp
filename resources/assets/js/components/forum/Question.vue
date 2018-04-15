<template>
      <v-card class="mt-2">
        <!-- <v-card-media src="/static/doc-images/cards/desert.jpg" height="200px">
        </v-card-media> -->
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
                <router-link :to="data.path">
                    {{data.title}}
                </router-link>
            </h3>
            <div class="grey--text">
                {{data.user}}, asked 
                {{data.created_at}}
            </div>
          </div>
        </v-card-title>
        <v-card-text>
            {{data.body}}
        </v-card-text>
      </v-card>
</template>
<script>
export default {
  props: ["data"]
};
</script>

<style scoped>

</style>
