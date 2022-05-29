<template>
    <v-container>

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
                :items="Object.values(stats)"
                :search="search"
                @click:row="getDetails($event)"
            >
            </v-data-table>
        </v-card>

        <v-row justify="center">
            <v-dialog
                v-model="dialog"
                fullscreen
                hide-overlay
                transition="dialog-bottom-transition"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="primary"
                        dark
                        v-bind="attrs"
                        v-on="on"
                    >
                        Open Dialog
                    </v-btn>
                </template>

                <v-card>
                    <v-toolbar
                        dark
                        color="primary"
                    >
                        <v-btn
                            icon
                            dark
                            @click="dialog = false"
                        >
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title>User Data</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn
                                dark
                                text
                                @click="dialog = false"
                            >
                                Cancel
                            </v-btn>
                        </v-toolbar-items>
                    </v-toolbar>

                    <v-divider></v-divider>

                    <h6>Hash : {{ hash }}</h6>

                    <s-user-data-table
                        :hash="this.hash"
                    />

                </v-card>
            </v-dialog>
        </v-row>

    </v-container>
</template>

<script>

import {mapGetters} from 'vuex';
import SUserDataTable from "./SUserDataTable";

export default {
    name: 's-table',
    props: {
        stats: []
    },
    components: {
        SUserDataTable
    },
    data() {
        return {
            search: '',
            dialog: false,
            headers: [
                {
                    text: 'Hash, id',
                    align: 'start',
                    sortable: true,
                    value: 'hash',
                },
                {text: 'Url', value: 'url'},
                {text: 'Count', value: 'count'},
                {text: 'Total', value: 'total'},
            ],
            hash: '',
        }
    },

    methods: {
        getDetails(item) {
            console.log(item.hash)
            this.hash = item.hash
            this.dialog = true
        },
    }


}
</script>
