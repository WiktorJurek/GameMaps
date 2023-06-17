<template>
    <div v-if="dataLoaded">  
      
      <div style="height:900px;">
        <l-map ref="map" v-model:zoom="zoom" :center="mapData[0].coords.center" :use-global-leaflet="false" :options="{attributionControl: false}" :min-zoom="2" :max-zoom="mapData[0].zoom">
          <l-tile-layer
            :url="mapName"
            layer-type="base"
            :name="mapData[0].name"
            :tms="true"
            :no-wrap="true"
          ></l-tile-layer>

          <l-layer-group v-for="(markerGroup, layerId) in markersData" :key="layerId">
            <l-marker v-for="marker in markerGroup" :key="marker.id" :lat-lng="marker.coords">
              <l-icon v-if="layerId == 12 || layerId == 13" :icon-size="[15,15]" :icon-url="`/assets/icons/${mapData[0].slug}/${layersData[layerId][0].slug}.png`"></l-icon>
              <l-icon v-else :icon-size="[30,30]" :icon-url="`/assets/icons/${mapData[0].slug}/${layersData[layerId][0].slug}.png`"></l-icon>
            </l-marker>
          </l-layer-group>

        </l-map>
      </div>

  </div>
</template>
  
  <script lang="ts">
  import axios from 'axios';
  import "leaflet/dist/leaflet.css";
  import { LMap, LTileLayer, LMarker, LIcon, LLayerGroup } from "@vue-leaflet/vue-leaflet";
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
        zoom: 3,
        gameData: null,
        mapData: null,
        mapName: null,
        markersData: null,
        layersData: null,
        dataLoaded: false
      };
    },
    mounted() {

      const gameName = this.$route.params.gameName;
      this.fetchData(gameName);

    },
    methods: {

      async fetchData(gameName) {

        try {
          const getGame = await axios.get(`/api/v1/games/getbyslug/${gameName}`);
          this.gameData = getGame.data;

          const getMap = await axios.get(`/api/v1/maps/getbygame/${getGame.data[0].id}`);
          this.mapName = `../assets/images/maps/${getMap.data[0].slug}/{z}/{x}/{y}.png`;
          getMap.data[0].coords = JSON.parse(getMap.data[0].coords);
          this.mapData = getMap.data;

          const getLayers = await axios.get(`/api/v1/layers/getbygame/${getGame.data[0].id}`);
          this.layersData = getLayers.data;

          const getMarkers = await axios.get(`/api/v1/markers/getbygame/${getGame.data[0].id}`);
          this.markersData = getMarkers.data;

          this.dataLoaded = true;
        } catch (error) {
          console.error(error);
        }
      },    
    },
  };
  </script>
  
  <style></style>