<template>
    <div style="height:900px;">
      <l-map ref="map" v-model:zoom="zoom" :center="[-62.950,-118.000]" :use-global-leaflet="false" :options="{attributionControl: false}" :min-zoom="2" :max-zoom="4">
        <l-tile-layer
          :url="mapName"
          layer-type="base"
          name="bayview"
          :tms="true"
          :no-wrap="true"
        ></l-tile-layer>

        <l-marker :lat-lng="coordinates" draggable> </l-marker>
      </l-map>
    </div>
    <div>
    <ul>
      <li v-for="item in itemMarkers" :key="item.id">{{ item.type + item.coords }}</li>
    </ul>
  </div>
</template>
  
  <script lang="ts">
  import axios from 'axios';
  import "leaflet/dist/leaflet.css";
  import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
  import type L from "leaflet";
  export default {
    components: {
      LMap,
      LTileLayer,
      LMarker,
    },
    data() {
      return {
        zoom: 4,
        coordinates: [50, 50] as L.LatLngExpression,
        itemGame: this.itemGame,
        itemMarkers: this.itemMarkers,
        itemMaps: this.itemMaps,
        mapName: '../assets/images/maps/'+this.itemMaps+'{z}/{x}/{y}.png',
      };
    },
    mounted() {
      this.getGameFromAPI();
      this.getMarkersFromAPI();
      this.getMapFromAPI();
    },
    methods: {
      getGameFromAPI() {
        axios.get('/api/v1/games')
          .then(response => {
            this.itemGame = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
      getMarkersFromAPI() {
        axios.get('/api/v1/markers')
          .then(response => {
            this.itemMarkers = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
      getMapFromAPI() {
        axios.get('/api/v1/maps')
          .then(response => {
            this.itemMaps = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
    },
  };
  </script>
  
  <style></style>