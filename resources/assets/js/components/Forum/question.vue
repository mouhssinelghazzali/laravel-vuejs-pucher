<template>


     
 <div class="about p-4" @click="trigger">
        
         <v-card class="mt-2">
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
                <router-link :to="data.path">
                {{data.title}}
                </router-link>
            </h3>
            <div class="grey--text"> {{data.username}} said - {{data.created_at}}  </div>
          </div>
        </v-card-title>
 <Flipper :flipKey="flipKey">
      <Flipped flipId="square">
        <div class="square" :class="squareClass"> 
        <v-card-text v-if="open">
           {{data.body}}
        </v-card-text></div>
     
      </Flipped>
    </Flipper>
       
      </v-card>
       </v-card>
      
  </div>
 
</template>
<script>
import { Flipper, Flipped } from "vue-flip-toolkit";
export default {
props:['data'],
 components: {
    Flipped,
    Flipper
  },
  name: "simple",
  data() {
    return {
      flipper: null,
      open: false
    };
  },
  computed: {
    squareClass() {
      return this.open ? "expanded" : "";
    },
    flipKey() {
      return this.open.toString();
    }
  },
  methods: {
    trigger() {
      this.open = !this.open;
    }
  }
}
</script>

<style scoped>
button {
  margin-bottom: 1rem;
}

.square {
  height: 50px;
  width: 100%;
  background: pink;
  align-items: center;
  padding: 16px;
}

.square.expanded {
  height: 100px;
  width: 100%;
  text-align: center;
}
</style>

