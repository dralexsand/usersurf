<template>
    <v-row>
        <v-spacer></v-spacer>
        <v-col
            cols="12"
            sm="6"
            md="4"
        >
            <v-menu
                v-model="menu2"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="auto"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        v-model="date"
                        :label="label"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                    ></v-text-field>
                </template>
                <v-date-picker
                    v-model="date"
                    @input="menu2 = false"
                    @change="datas"
                    :id="id"
                ></v-date-picker>
            </v-menu>

        </v-col>
        <v-spacer></v-spacer>
    </v-row>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    props: {
        id:'',
        label:''
    },
    data: () => ({
        date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        menu: false,
        modal: false,
        menu2: false,
        //label: 'Data from:',
        //id: ''
    }),
    async mounted() {
    },
    methods: {
        datas() {
            console.log('datas local', this.date)
            this.$emit('change', {
                id: this.id,
                date: this.date,
            })
        }
    }
}
</script>
