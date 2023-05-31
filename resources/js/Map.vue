<template>
    <div style="height:900px;">
      <l-map ref="map" v-model:zoom="zoom" :center="[-62.950,-118.000]" :use-global-leaflet="false" :options="{attributionControl: false}" :min-zoom="2" :max-zoom="4">
        <l-tile-layer
          url="../assets/images/maps/bayview/{z}/{x}/{y}.png"
          layer-type="base"
          name="bayview"
          :tms="true"
          :no-wrap="true"
        ></l-tile-layer>

        <l-marker :lat-lng="coordinates" draggable> </l-marker>
      </l-map>
    </div>
  </template>
  
  <script lang="ts">
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
      };
    },
  };
  </script>
  
  <style></style>