<template>
    <v-card>
        <v-card-title>
            Statistics
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
            :items="Object.values(desserts)"
            :search="search"
        ></v-data-table>
    </v-card>
</template>

<script>

import {mapGetters} from 'vuex';

export default {
    name: 's-table-demo',
    data() {
        return {
            search: '',
            headers: [
                {
                    text: 'Dessert (100g serving)',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                {text: 'Calories', value: 'calories'},
                {text: 'Fat (g)', value: 'fat'},
                {text: 'Carbs (g)', value: 'carbs'},
                {text: 'Protein (g)', value: 'protein'},
                {text: 'Iron (%)', value: 'iron'},
            ],
            desserts1: []
        }
        /*
        "count": 3,
            "hash": "$2y$10$BsPr.Uy7Um5HnHGkAp1LjO2I.Bz.068zhIBOdS4g4eoF852qqKZa6",
            "url": "page4",
            "total": "139"*/
    },
    computed: {
        ...mapGetters({
            desserts: 'demo/getItemsData'
        }),
    },
    async mounted() {
        this.$store.dispatch('demo/fetchItemsData')
    }


}
</script>
