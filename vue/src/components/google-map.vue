<template>
    <div class="google-maps-component">
        <GmapMap
            :center="center"
            :zoom="5"
            map-type-id="terrain"
            style="width: 500px; height: 300px"
            >
            <GmapMarker
                :key="m"
                v-for="(m) in markers"
                :position="m.position"
                :clickable="true"
                :draggable="true"
                @click="center=m.position"
            />
        </GmapMap>
    </div>
</template>

<script>

// import maps from '../maps'

export default {
    name: 'google-map',
    props: {
        marker: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            center: { lat: 49.0139, lng: 31.2858 },
            markers: []
                // {  
                //     position: {lat: 50.431782, lng: 30.516382}
                // },
                // {
                //     position: {lat: 49.0932777, lng: 33.2991066}
                // }
        
        };
    },
    mounted() {
    },
    methods: {
        addMarker() {
            this.markers = []
            this.markers.push(this.marker);
        }
    },
    watch: {
        marker() {
            this.addMarker()
        }
    }
}
</script>