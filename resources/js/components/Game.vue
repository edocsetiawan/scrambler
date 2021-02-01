<template>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Scrambler</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <label for="name" style="margin-left: 400px;font-size:30px;">{{question.random_words}}</label>
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <input type="answer" style="width:30%;position:fixed;left:35%;margin-top:-10px;" class="form-control" v-model="question.user_answer">
                                        <button type="submit" class="btn btn-primary" style="width: 10%; margin-top: -10px;margin-right:90px;z-index: 1; border: 1px solid #dce4ec;float:right">Submit</button>
                                    </div>
                                </div>
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
        return{
            token : '',
            question : {
                id_words : 0,
                correct_answer : '',
                random_words : '',
                user_answer : '',
                answer : 0
            }
        }
    },
    mounted(){
        this.init();
    },
    methods: {
        init : function(){
            if(localStorage.getItem('token') == null){
                alert("Please login first!");
                this.$router.push({name: 'login'});
            }else{
                let url = `/api/wordlist`;
                this.axios.get(url).then((response)=>{
                    if(response.data.success){
                        this.question.word_id = response.data.data.id;
                        this.question.correct_answer = response.data.data.words;
                        this.question.random_words = this.shuffle(this.question.correct_answer);
                    }else{
                        alert("something went wrong");
                    }
                })
            }
        },
        shuffle : function(word) {
            var a = word.split(""),
            n = a.length;
  
            for(var i = n - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var tmp = a[i];
            a[i] = a[j];
            a[j] = tmp;
        }
            return a.join("");
        },
        submit : function(){
            if(confirm('Are you sure you want to continue?')){
                if(this.question.user_answer === this.question.correct_answer){
                    this.question.answer = 1;
                    alert("Your answer is correct");
                }else{
                    alert("Your answer is wrong, the correct answer is : "+this.question.correct_answer)
                }
                let url = `/api/update-score`;
                this.axios.post(url,this.question,{
                    headers :{
                        'Authorization': 'Bearer '+localStorage.getItem('token')
                    }
                }).then((response)=>{
                    if(response.data.success){
                        this.question.user_answer = '';
                        this.init();
                    }else{
                        alert("Something went wrong");
                    }
                })
            }
        }
    },
}
</script>