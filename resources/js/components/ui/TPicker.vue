<template>
    <v-row>
        <v-col
            cols="11"
            sm="5"
        >
            <v-dialog
                ref="dialog"
                v-model="modal2"
                :return-value.sync="time"
                persistent
                width="290px"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        v-model="time"
                        label="Picker in dialog"
                        prepend-icon="mdi-clock-time-four-outline"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                    ></v-text-field>
                </template>
                <v-time-picker
                    v-if="modal2"
                    v-model="time"
                    full-width
                    @change="datas"
                >
                    <v-spacer></v-spacer>
                    <v-btn
                        text
                        color="primary"
                        @click="modal2 = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        text
                        color="primary"
                        @click="$refs.dialog.save(time)"
                    >
                        OK
                    </v-btn>
                </v-time-picker>
            </v-dialog>
        </v-col>
    </v-row>
</template>

<script>
export default {
    props: {
        id: '',
    },
    data() {
        return {
            time: '00:00',
            menu2: false,
            modal2: false,
        }
    },
    methods: {
        datas() {
            console.log('datas local', this.time)
            this.$emit('change', {
                id: this.id,
                date: this.time,
            })
        }
    }
}
</script>
