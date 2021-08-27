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
                    :date-formatter="dateFormatter">

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
        <div v-if="successMsg.show" class="success-msg">
            <div v-if="successMsg.success" class="success">
                <i class="fas fa-check"></i>
                <p>Sparad</p>
            </div>
            <div v-else class="failed">
                <i class="fas fa-times"></i>
                <p>Misslyckades att spara</p>
            </div>
        </div>

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
                successMsg: {
                    show: false,
                    success: false,
                }
            };
	    },
        mounted() {
            this.form.user_id = this.user.id;
        },
        methods:{
            handleSubmit(){
                this.isLoading = true;
                axios
				.post("/log/register", this.form)
				.then((response) => {
                    setTimeout(() => {
                        this.isLoading = false,
                        this.showSuccessMsg(true)
                    }, 1000);
				})
                .catch((error) => {
                    setTimeout(() => {
                        this.isLoading = false,
                        this.showSuccessMsg(false);
                    }, 1000);

					console.error(error);
				});
            },
            dateFormatter(dt){
                var dateoptions = { year: 'numeric', month: 'numeric', day: 'numeric' };

                return dt.toLocaleDateString('sv-SE', dateoptions);
            },
            showSuccessMsg(bool){
                console.log(bool)
                if(bool){
                    this.successMsg.success = true;
                    this.successMsg.show = true;
                }else{
                    this.successMsg.success = false;
                    this.successMsg.show = true;
                }
                setTimeout(() => this.successMsg.show = false, 1000);
            }
        },
        props: {
            user: {
                type: Object,
            }
        }
    }
</script>
