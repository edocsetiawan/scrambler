<template>
    <div>
    <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Add New Word</div>
        <div class="card-body">
                <form @submit.prevent="click">
                    <div class="form-group">
                        <label for="name">Word</label>
                        <input type="name" class="form-control" v-model="parameter.words">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            parameter : {
                words : ''
            }
        }
    },
    mounted(){
    },
    methods :{
        click : function(){
            if(this.word === ''){
                alert("Error, word can't empty");
            }else{
                let url = `http://localhost:8000/api/add-word`;
                this.axios.post(url, this.parameter).then((response) => {
                    if(response.data.success){  
                        alert("Insert word success!");
                        this.$router.push({name: 'landingpage'});
                    }else{
                        alert("something went wrong");
                    }
                });
            }
        }
    }
}
</script>