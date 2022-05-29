<template>
    <v-app>


        <v-main>
            <router-view/>
        </v-main>

    </v-app>
</template>

<script>


export default {
    name: "App",
    components: {

    },
    data() {
        return {
            title: 'App Vue'
        }
    }
}
</script>

<style scoped>

</style>
