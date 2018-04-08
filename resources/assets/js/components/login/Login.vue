<template>
	<!-- <v-container> -->
		<v-layout>
    		<v-flex xs12 sm6 offset-sm3><br>
			<h2>Login Page.....</h2>
			<br>
			<v-form @submit.prevent="login">
			    <v-text-field
			      label="E-mail"
			      v-model="form.email"
			      type="email"
			      required
			    ></v-text-field>

			    <v-text-field
			      label="Password"
			      v-model="form.password"
			      type="password"
			      required
			    ></v-text-field> <br>

			    <v-btn
			    color="cyan white--text"
			    type="submit"
			    >Login</v-btn>
			  </v-form>
    	 </v-card>
    </v-flex>
</v-layout>
<!-- </v-container> -->
</template>
<script>
	export default {
		data() {
			return {
				form : {
					email: null,
					password: null
				}
			}
		},
		methods: {
			login() {
				User.login(this.form)
			}
		}
	}
</script>
<style>
	

</style>