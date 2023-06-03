<template>
    <!-- <h1>{{ gameData[0].name }} map {{ mapData[0].name }}</h1> -->
    <div style="height:900px;">
      <l-map ref="map" v-model:zoom="zoom" :center="[-62.950,-118.000]" :use-global-leaflet="false" :options="{attributionControl: false}" :min-zoom="2" :max-zoom="4">
        <l-tile-layer
          :url="mapName"
          layer-type="base"
          name="bayview"
          :tms="true"
          :no-wrap="true"
        ></l-tile-layer>

        <l-layer-group v-for="(markerGroup, groupName) in markersData" :key="groupName">
          <l-marker v-for="marker in markerGroup" :key="marker.id" :lat-lng="marker.coords">
            <l-icon :icon-size="[30,30]" :icon-url="`/assets/icons/${mapData[0].name}/${groupName}.png`"></l-icon>
          </l-marker>
        </l-layer-group>

      </l-map>
    </div>
    <div>
    <ul>
      <li v-for="marker in markersData" :key="marker.id">{{ marker.type + marker.coords }}</li>
    </ul>
  </div>
</template>
  
  <script lang="ts">
  import axios from 'axios';
  import "leaflet/dist/leaflet.css";
  import { LMap, LTileLayer, LMarker, LIcon, LLayerGroup } from "@vue-leaflet/vue-leaflet";
  import L from "leaflet";
  export default {
    components: {
      LMap,
      LTileLayer,
      LMarker,
      LIcon,
      LLayerGroup
    },
    data() {
      return {
        zoom: 4,
        gameData: {},
        mapData: {},
        mapName: '',
        markersData: {},
      };
    },
    mounted() {

      const gameName = this.$route.params.gameName;

      axios.get(`/api/v1/games/getbyname/${gameName}`)
        .then(response => {
          this.gameData = response.data;
          return axios.get(`/api/v1/maps/getbygame/${response.data[0].id}`);
        })
        .then(response => {
          this.mapName = `../assets/images/maps/${response.data[0].name}/{z}/{x}/{y}.png`;
          this.mapData = response.data;

          return axios.get(`/api/v1/markers/getbygame/${response.data[0].game}`);
        })
        .then(response => {
          this.markersData = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    methods: {
    },
  };
  </script>
  
  <style></style>