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
                    :dt="dt"
                    v-model="date"
                    @input="menu2 = false"
                    @change="datas()"
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
        id: '',
    },
    data: () => ({
        date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        menu: false,
        modal: false,
        menu2: false,
        label: 'Data from:',
        //id: ''
    }),
    async mounted() {
    },
    methods: {
        setDate() {
            let date = Date.parse(this.dt);
            this.date = (
                new Date(date - (new Date())
                    .getTimezoneOffset() * 60000))
                .toISOString().substring(0, 10);
        },
        getDT() {
            console.log('mounted:');
            console.log(this.date);
        },
        datas() {
            this.$emit('datas', {
                id: this.id,
                date: this.date
            })
        },
        getTimeDate1(data) {
            console.log(data)
            console.log(this.id)
            let dt1 = []
            dt1.push(data)
            //dt[this.id] = data
            this.$store.commit('stats/updateDates', {dt1})
            return dt1
        }
    }
}
</script>
