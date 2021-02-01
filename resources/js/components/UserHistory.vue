<template>
    <div>
    <div class="row justify-content-md-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Player Recap</div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Gladiator : </label> {{datauser.name}}
                <button type="submit" class="btn btn-primary" style="background-color : blue !important;border-color : blue !important;float : right; margin-right:10px;" @click="click()">EXIT</button>
            </div>
            <div class="form-group">
                <label for="score">Score : </label> {{datauser.score}}
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Words</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody v-for="history in datauser.game_history">
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
    props: ['datauser'],
    data(){
        return {
        }
    },
    mounted(){
    },
    methods :{
        click : function(){
            this.$router.push({name: 'landingpage'});
        }
    }
}
</script>