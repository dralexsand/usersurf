<template>
    <v-container>
        <h1>Report</h1>

        <v-row>From</v-row>
        <v-row>
            <v-col>
                <DPicker
                    id="dt1"
                    label="Data from"
                    @change="onDatas"
                />
            </v-col>
            <v-col>
                <TPicker
                    id="tm1"
                    label="Time from"
                    @change="onDatas"
                />
            </v-col>

        </v-row>
        <v-row>
            <v-col>
                <DPicker
                    id="dt2"
                    label="Data to"
                    @change="onDatas"
                />
            </v-col>
            <v-col>
                <TPicker
                    id="tm2"
                    label="Time to"
                    @change="onDatas"
                />
            </v-col>

        </v-row>

        <v-spacer class="w-100"></v-spacer>

        <v-row>
            <v-btn
                width="150"
                color="primary"
                @click="getTableData"
            >
                Start
            </v-btn>
        </v-row>

        <v-spacer class="w-100"></v-spacer>

        <s-table
            :stats="stats"
        />

    </v-container>
</template>

<script>

import STable from "../ui/STable";
import DPicker from "../ui/DPicker";
import TPicker from "../ui/TPicker";

import {mapGetters} from 'vuex';

export default {
    name: "Report",
    components: {
        STable, DPicker, TPicker
    },
    data() {
        return {
            get_dates: '',
            date: [],
            dates: {
                dt1: '2022-05-28',
                dt2: '2022-05-28',
                tm1: '00:00',
                tm2: '00:00',
            },
            hash: '',
        }
    },
    computed: {
        ...mapGetters({
            stats: 'stats/getData',
            //dates: 'stats/getDates'
        }),
    },
    async mounted() {
        this.initDates();
        //this.$store.dispatch('stats/fetchStatsData', this.get_dates);
    },
    methods: {
        initDates() {
            this.dt1 = this.getFormattedDate()
            this.dt2 = this.getFormattedDate()
            console.log('initDates')
            console.log(this.dates)
        },
        getFormattedDate() {
            let dt = new Date()
                .toJSON()
                .slice(0, 10)
                .replace(/-/g, '-');

            console.log('getFormattedDate', dt);

            return dt;
        },
        onDatas(data) {
            console.log('child data:', data)

            switch (data.id) {
                case 'dt1':
                    this.dates.dt1 = data.date
                    break;
                case 'dt2':
                    this.dates.dt2 = data.date
                    break;
                case 'tm1':
                    this.dates.tm1 = data.date
                    break;
                case 'tm2':
                    this.dates.tm2 = data.date
                    break;
            }

            console.log(this.dates);
        },
        getTableData() {
            this.datesToString();
            console.log('getTableData', this.get_dates);
            this.$store.dispatch('stats/fetchStatsData', this.get_dates);
        },
        getDetails(item) {
            console.log(item.hash)
            this.hash = item.hash
            this.dialog = true
        },
        datesToString() {
            let dates = this.dates;

            let dttime1 = dates.dt1 + ' ' + dates.tm1 + ':00';
            let dttime2 = dates.dt2 + ' ' + dates.tm2 + ':00';

            let get_dates = '?dt1=' + dttime1 + '&dt2=' + dttime2;
            this.get_dates = get_dates;
        },

    }
}
</script>

<style scoped>

</style>
