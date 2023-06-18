<template>
    <div>
        <ul>
            <li v-for="game in games" :key="game.id">
                <router-link :to="`map/${game.slug}`">{{ game.name }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
    components: {
    },
    data() {
      return {
        games: [],
      };
    },
    mounted() {
      this.getGameFromAPI();
    },
    methods: {
      getGameFromAPI() {
        axios.get('/api/v1/games')
          .then(response => {
            this.games = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
    },
  };    
</script>

<style>
</style>