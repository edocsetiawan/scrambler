<template>
    <div>
    <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Player Recap</div>
        <div class="card-body">
            <div class="form-group" v-if="user.role == 2">
                <label for="name">Gladiator : </label> {{user.name}}
                <button type="submit" class="btn btn-primary" style="background-color : red !important;border-color : red !important;float:right" @click="logout()">LOGOUT</button>
                <button type="submit" class="btn btn-primary" style="background-color : blue !important;border-color : blue !important;float : right; margin-right:10px;" @click="click()">PLAY</button>
            </div>
            <div class="form-grup" v-if="user.role == 1">
                <label for="name">Welcome back : </label> {{user.name}}
                <button type="submit" class="btn btn-primary" style="background-color : red !important;border-color : red !important;float:right" @click="logout()">LOGOUT</button>
                <button type="submit" class="btn btn-primary" style="background-color : blue !important;border-color : blue !important;float : right; margin-right:10px;" @click="newWord()">ADD WORD</button>
            </div>
            <div class="form-group" v-if="user.role == 1">
                <label for="score">User List</label>
            </div>
            <div class="form-group" v-if="user.role == 2">
                <label for="score">Score : </label> {{user.score}}
            </div>
            <table class="table table-bordered" v-if="user.role == 1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody v-for="users in user_list">
                    <tr>
                        <td>{{users.name}}</td>
                        <td>{{users.score}}</td>
                        <td><router-link :to="{name: 'userhistory', params: { datauser: users }}">Edit</router-link></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" v-if="user.role == 2">
                <thead>
                    <tr>
                        <th>Words</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody v-for="history in game_history">
                    <tr>
                        <td>{{history.words}}</td>
                        <td>{{history.result}}</td>
                    </tr>
                </tbody>
            </table>
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
            token : '',
            user : [],
            game_history : {},
            user_list : {},
        }
    },
    mounted(){
        this.init();
    },
    methods :{
        click : function(){
            if(confirm("Do you really want to play?")){
                this.$router.push({name: 'gamepage'});
            }
        },
        init : function(){
            if(localStorage.getItem('token') == null){
                alert("Please login first!");
                this.$router.push({name: 'login'});
            }else{
                let url = `/api/getme`;
                this.axios.get(url,{
                    headers : {
                        'Authorization': 'Bearer '+localStorage.getItem('token')
                    }
                }).then((response) => {
                if(response.data.success){
                    this.user = response.data.data.data;
                    if(this.user.role == 1){
                        this.user_list = response.data.data.user_list;
                    }else{
                         this.game_history = response.data.data.game_history;
                    }
                }else{
                    alert("something went wrong");
                }
            });
            }

        },
        logout : function(){
            if(confirm("Do you really want to leave?")){
                localStorage.removeItem('token');
                alert("See you on the next game!");
                this.$router.push({name: 'login'});
            }
        },
        newWord : function() {
            this.$router.push({name: 'newword'});
        }
    }
}
</script>