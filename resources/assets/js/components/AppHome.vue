<template>
	<div>
		<toolbar></toolbar>
		<router-view id="app2"></router-view>
		<app-footer></app-footer>
	</div>
	
</template>
<script>
import toolbar from "./Toolbar";
import AppFooter from "./AppFooter";
import Login from "./auth/Login";

export default {
  components: {
    toolbar,
    AppFooter,
    Login
  }
};
</script>
<style scoped>

</style>