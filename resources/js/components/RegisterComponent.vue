<template>
    <div id="register" class="container">

        <h1>Hej {{ user.name }} hur ont har du just nu?</h1>
        <div class="painscale input-wrapper">

            <div class="items">
                <div
                    class="item"
                    v-for="(pain, i) in painScale">

                    <b-radio
                        v-model="form.painLevel"
                        name="painLevel"
                        :native-value="i + 1">
                        {{ i + 1 }}

                    </b-radio>
                </div>
            </div>
            <div class="texts">
                <span>Lätt känning</span>
                <span>Migrän!</span>
            </div>

        </div>

        <div class="pain-type input-wrapper">

            <h2>Vilken typ av värk har du?</h2>

            <b-select
                v-model="form.type"
                placeholder="Välj">
                <option
                    v-for="option in types"
                    :value="option"
                    :key="option">
                    {{ option }}
                </option>
            </b-select>

        </div>

        <div class="time input-wrapper">

            <h2>Välj datum</h2>

            <b-field>
                <b-datepicker v-model="form.date"
                    :first-day-of-week="1"
                    placeholder="Klicka här"
                    :date-formatter="formatDate">

                </b-datepicker>
            </b-field>

        </div>

        <div class="meds input-wrapper">

            <h2>Medicin</h2>

        </div>

        <div class="comment input-wrapper">

            <h2>Kommentar</h2>

            <b-field>
                <b-input
                    v-model="form.comment"
                    maxlength="200"
                    type="textarea">
                </b-input>
            </b-field>

        </div>

        <div class="input-wrapper">
            <b-button @click="handleSubmit" type="is-dark">Registrera</b-button>
        </div>
        <b-loading :is-full-page="true" v-model="isLoading"></b-loading>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                painScale: 10,
                radio: '1',
                types: ['Huvudvärk', 'Migrän'],
                form: {},
                isLoading: false,
            };
	    },
        mounted() {
            this.form.user_id = this.user.id;
        },
        methods:{
            handleSubmit(){
                this.isLoading = true;
                axios
				.post("/api/log/register", this.form)
				.then((response) => {
                    this.isLoading = false;
				})
                .catch((error) => {
                    this.isLoading = false;
					console.error(error);
				});
            },
            formatDate(d){
                var dateString = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate();
                this.form.date =  dateString;

                return Date.parse(dateString);
            },
        },
        props: {
            user: {
                type: Object,
            }
        }
    }
</script>
