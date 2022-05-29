<template>
    <v-container>

        <v-row>
            <v-col>
                <h1>Select dates range</h1>
            </v-col>
            <v-col>
                <v-row>
                    <v-col
                        cols="12"
                        sm="6"
                    >
                        <v-date-picker
                            v-model="dates"
                            range
                        ></v-date-picker>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                        sm="6"
                    >
                        <v-text-field
                            v-model="dateRangeText"
                            label="Date range"
                            prepend-icon="mdi-calendar"
                            readonly
                        ></v-text-field>

                        <v-spacer/>

                        <v-btn
                            @click="applyFilterDates"

                        >
                            Search
                        </v-btn>

                    </v-col>
                </v-row>
            </v-col>
        </v-row>

    </v-container>
</template>

<script>

import {mapGetters, mapActions} from "vuex";

export default {
    name: "s-date-picker",
    data: () => ({
        //dates: [],
    }),
    async mounted() {
        this.initDate();
        this.$store.dispatch('stats/fetchDates', this.dates);
    },
    computed: {
        ...mapGetters({
            dates: 'stats/getDates'
        }),
        /*...mapActions({
            //this.$store.commit('stats/updateDates', dates);
            dates: this.$store.commit('stats/updateDates')
        }),*/

        dateRangeText() {
            this.$store.dispatch('stats/fetchDates', this.dates);
            return this.dates.join(' ~ ')
        },
        updateDates() {
            this.$store.commit('stats/updateDates', this.dates);
            console.log(this.dates);
        },
    },
    methods: {
        applyFilterDates() {
            let dates = this.dates;
            if (dates.length === 0) {
                console.log('Date required');
            } else {
                this.$store.commit('stats/updateDates', dates);
                console.log(dates);
            }
        },
        initDate() {
            let dt = this.getFormattedDate()
            this.dates.push(dt);
            this.$store.commit('stats/updateDates', this.dates);
        },
        getFormattedDate() {
            return new Date()
                .toJSON()
                .slice(0, 10)
                .replace(/-/g, '-');
        }
    },
}
</script>

<style scoped>

</style>
