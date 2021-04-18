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
            <b-button  type="is-dark">Registrera</b-button>
        </div>

        <div class="meds">
            <h2>Medicin</h2>

            <div class="row">
                <div class="col-sm-6">
                    <b-field label="Lägg till medicin">
                        <b-input></b-input>
                    </b-field>
                </div>
                <div class="col-sm-6">
                     <b-table :data="medicins" :columns="columns"></b-table>
                </div>
            </div>


            <div class="input-wrapper">
                <b-button  type="is-dark">Registrera</b-button>
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
                        label: 'Sparade mediciner',
                        width: '100',
                        numeric: false
                    },
                ],
                medicins: [],
            };
	    },
        mounted() {
            this.getAllMeds();
        },
        methods:{
            getAllMeds(){
                axios
				.get("/api/medicins?user_id="+this.user.id)
				.then((response) => {
                    console.log(response);
                    this.medicins = response.data;
				})
                .catch((error) => {
					console.error(error);
				});
            },
        },
        props: ['user']
    }
</script>
