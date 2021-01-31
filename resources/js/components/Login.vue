//Login.vue
<template>
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form @submit.prevent="userLogin">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" v-model="parameter.email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" v-model="parameter.password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            parameter : {}
        }
    },
    methods :{
        userLogin() {
          let url = `http://localhost:8000/api/login`;
          this.axios.post(url, this.parameter).then((response) => {
            if(response.data.success){
                localStorage.setItem('token', response.data.data.token) 
                this.$router.push({name: 'landingpage'});
            }else{
                alert("something went wrong");
            }
            
          });
        }
    }
}
</script>