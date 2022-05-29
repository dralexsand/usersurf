<template>
    <v-card>
        <v-card-title>
            User Data
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="desserts"
            :search="search"
        ></v-data-table>
    </v-card>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    name: "s-user-data-table",
    props: {
        hash: '',
    },
    data() {
        return {
            search: '',
            headers: [
                {text: 'ID', value: 'id'},
                {
                    text: 'User Id',
                    align: 'start',
                    sortable: true,
                    value: 'user_id',
                },

                {text: 'Hash', value: 'hash', sortable: false},
                {text: 'Url', value: 'url'},
                {text: 'IP', value: 'ip'},
                {text: 'Time In', value: 'time_in'},
                {text: 'Time Out', value: 'time_out'},
                {text: 'Time Summary', value: 'time_summary'},
            ],
            //hash: '',
            //desserts: [],
        }
    },
    async mounted() {
        this.$store.dispatch('stats/fetchUserData', this.hash)
    },
    computed: {
        ...mapGetters({
            desserts: "stats/getUserData",
        }),
    }
}
</script>
