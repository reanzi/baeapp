<template>
    <v-layout>
    	<v-flex xs12 sm6 offset-sm3><br>
				<h2>Sign Up Page.....</h2>
				<br>
			<v-form @submit.prevent="signUp">
					<v-text-field
						label="Name"
						v-model="form.name"
						type="text"
						required
					></v-text-field>
					<span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

					<v-text-field
						label="E-mail"
						v-model="form.email"
						type="email"
						required
					></v-text-field>
					<span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

					<v-text-field
						label="Password"
						v-model="form.password"
						type="password"
						required
					></v-text-field>
					<span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
					
					<v-text-field
						label="Retype Password"
						v-model="form.password_confirmation"
						type="password"
						required
					></v-text-field> 
					<br>

					<v-btn
					color="cyan white--text"
					type="submit"
					>Sign Up</v-btn>

					<router-link to="/login">
							<v-btn flat>Login</v-btn>
						</router-link>
				</v-form>
        </v-flex>
    </v-layout>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors: {}
    };
  },
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "forum" });
    }
  },
  methods: {
    signUp() {
      axios
        .post("/api/auth/signup", this.form)
        .then(res => {
          User.responseAfterLogin(res);
          this.$router.push({ name: "forum" });
        })
        .catch(error => (this.errors = error.response.data.errors));
    }
  }
};
</script>
<style>

</style>