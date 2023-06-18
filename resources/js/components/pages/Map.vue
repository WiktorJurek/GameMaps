<template>
    <div v-if="dataLoaded">  
    <div class="drawer lg:drawer-open">
      <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content">
        <div style="height:900px;">
          <l-map ref="map" v-model:zoom="zoom" :center="mapData[0].coords.center" :use-global-leaflet="false" :options="{attributionControl: false}" :min-zoom="2" :max-zoom="mapData[0].zoom">
            <l-tile-layer
              :url="mapName"
              layer-type="base"
              :name="mapData[0].name"
              :tms="true"
              :no-wrap="true"
            ></l-tile-layer>

            <div v-if="showAll">
              <l-layer-group v-for="(markerGroup, layerId) in markersData" :key="layerId">
                <div v-if="markerGroup.visible">
                  <l-marker v-for="(markerData, markerId) in markerGroup" :key="markerData.id" :lat-lng="markerData.coords">

                      <l-icon v-if="layerId == 12 || layerId == 13" :icon-size="[15,15]" :icon-url="`/assets/icons/${markerData.visible}/${mapData[0].slug}/${layersData[layerId][0].slug}.png`"></l-icon>
                      <l-icon v-else :icon-size="[30,30]" :icon-url="`/assets/icons/${markerData.visible}/${mapData[0].slug}/${layersData[layerId][0].slug}.png`"></l-icon>
                      <l-popup>{{ layersData[layerId][0].name }}
                        <input type="checkbox" v-model="markerData.visible">Mark
                      </l-popup>
                  </l-marker> 
                </div>
              </l-layer-group>
            </div>
          </l-map>
        </div>
        <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
      </div>
      <div class="drawer-side">
      <label for="my-drawer-2" class="drawer-overlay"></label> 
      <ul class="menu p-5 w-60 h-full bg-base-200 text-base-content">
        <input v-for="(layerData, layerId) in layersData" type="checkbox" v-model="markersData[layerId].visible"  :aria-label="layerData[0].name" class="btn btn-sm my-1" :key="layerId"/>
        <input type="checkbox" v-model="showAll" aria-label="Show all" class="btn btn-sm my-1"/>
      </ul>
    </div>
    </div>

  </div>
</template>
  
  <script lang="ts">
  import axios from 'axios';
  import "leaflet/dist/leaflet.css";
  import { LMap, LTileLayer, LIcon, LMarker, LLayerGroup, LPopup } from "@vue-leaflet/vue-leaflet";
  export default {
    components: {
      LMap,
      LTileLayer,
      LMarker,
      LIcon,
      LLayerGroup,
      LPopup,
    },
    data() {
      return {
        zoom: 3,
        gameData: null,
        mapData: null,
        mapName: null,
        markersData: null,
        layersData: null,
        dataLoaded: false,
        showAll: true,
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

          Object.keys(getMarkers.data).forEach((key) =>{
            getMarkers.data[key].visible = true;
          });            
        
          this.dataLoaded = true;
        } catch (error) {
          console.error(error);
        }
      },    
    },
  };
  </script>
  
<style>

</style>