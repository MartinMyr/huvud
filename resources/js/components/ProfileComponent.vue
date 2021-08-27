<template>
    <div id="profile" class="container">
        <h1>Min profil</h1>
        <div class="row">
            <div class="col-sm-6">
                <b-field label="Namn">
                    <b-input v-model="user.name"></b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Email">
                    <b-input type="email"
                        :value="user.email"
                    >
                    </b-input>
                </b-field>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                 <b-field label="Password">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal>
                    </b-input>
                </b-field>
            </div>
        </div>

        <div class="input-wrapper">
            <b-button  type="is-dark">Spara</b-button>
        </div>

        <div class="meds">
            <h2>Medicin</h2>

            <div class="row">
                <div class="col-sm-6">
                    <b-field label="Lägg till medicin">
                        <b-input v-model="newMedicin"></b-input>
                    </b-field>
                    <div class="input-wrapper">
                        <b-button @click="addMedicin()"  type="is-dark">Lägg till</b-button>
                    </div>
                </div>
                <div class="col-sm-6">
                     <b-table :data="medicins" :columns="columns"></b-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                columns: [
                    {
                        field: 'medicin',
                        label: 'Min medicin',
                        width: '100',
                        numeric: false
                    },
                ],
                medicins: [],
                newMedicin: ''
            };
	    },
        mounted() {
            this.getAllMeds();
        },
        methods:{
            getAllMeds(){
                axios
				.get('/medicins?user_id='+this.user.id)
				.then((response) => {
                    this.medicins = response.data;
				})
                .catch((error) => {
					console.error(error);
				});
            },
            addMedicin(){
                if(this.newMedicin == ''){return;}
                axios
				.post('medicin/create', {
                    user_id: this.user.id,
                    medicin: this.newMedicin
                })
				.then((response) => {
                    if(response){
                        this.newMedicin = '';
                        this.getAllMeds();
                    }
				})
                .catch((error) => {
					console.error(error);
				});
            },
        },
        props: {
            user: {
                type: Object,
            }
        }
    }
</script>
