<template>
    <div class="container px-2">
  <v-text-field
                name="input-1-3"
                label="Hint Text"
                single-line
                prepend-icon="search"
                 v-model="search"
              ></v-text-field>

      <div class="row px-6">
<section class="wrapper">
    <div class="container-fostrap">
        <div>
            <img src="https://4.bp.blogspot.com/-7OHSFmygfYQ/VtLSb1xe8kI/AAAAAAAABjI/FxaRp5xW2JQ/s320/logo.png" class="fostrap-logo"/>
            <h1 class="heading">
                {{this.$route.params.slug}}
            </h1>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4"  v-for="(question,index) in filteredQuestion " :key="index"> 
                     
                        <div class="card" >
                            <a class="img-card" href="#">
                            <img src="https://1.bp.blogspot.com/-Bii3S69BdjQ/VtdOpIi4aoI/AAAAAAAABlk/F0z23Yr59f0/s640/cover.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title ">
                                    <a href="#"> {{question.title | truncate(30)  }}  
                                  </a>
                                </h4>
                                <p class="">
                                    {{question.body | truncate(80)  }}  
                                </p>
                            </div>
                            <div class="card-read-more">
                                <span class="btn btn-link btn-block">
                                    <router-link :to="'/question/'+question.slug">
                                    Read More
                                    </router-link>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
 <places
    v-model="form.country.label"
    placeholder="Where are we going ?"
    @change="val => { form.country.data = val }"
    :options="{ countries: ['US'] }">
  </places>
</div>
  
      </div>
</template>





<script>
import Places from 'vue-places'
export default {

    data(){
    return {
        questions :null,
        search: '',
        form: {
        country: {
          label: null,
          data: {},
        },
      },
    }

},
components: {
    Places
  },
computed: {
    filteredQuestion (){
      if(this.search){
      return this.questions.filter((question)=>{
         return question.title.toLowerCase().includes(this.search.toLowerCase())
      })
      }else{
        return this.questions;
      }
    }
  },

created()
{
this.getQuestion()
},
methods:{

    getQuestion(){
    axios.get('/api/question/category/' + this.$route.params.slug)
    .then(res => this.questions =  res.data.data)
    .catch( err => {
        console.log(err)
      })
    }


}
}
</script>
   filteredList() {
      return this.postList.filter(post => {
        return post.title.toLowerCase().includes(this.search.toLowerCase())
      })
    }
<style scoped>
.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.overme {
    width: 300px;
    overflow:hidden; 
    white-space:nowrap; 
    text-overflow: ellipsis;
   
}
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
</style>
