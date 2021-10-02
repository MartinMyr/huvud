<template>
    <div id="profile" class="container">

        <h1>Min profil</h1>

        <div class="row mb-4">
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
            <div class="col-sm-6">
                <b-field label="Profilbild">
                    <b-input type="file"
                        :value="user.profile_img"
                    >
                    </b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Gammalt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal>
                    </b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Nytt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal>
                    </b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Bekräfta nytt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal>
                    </b-input>
                </b-field>
            </div>
            <div class="col-12">
                <div class="input-wrapper">
                    <b-button @click="saveProfile" type="is-dark">Spara</b-button>
                </div>
            </div>
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
        <loading :showMsg="showMsg" :success="success" :isLoading="isLoading"></loading>
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
                newMedicin: '',
                isLoading: false,
                success: false,
                showMsg: false,
            };
	    },
        mounted() {
            this.getAllMeds();
        },
        methods:{
            saveProfile(){
                this.isLoading = true;

                axios
				.post('/api/user/update/profile', {
                    name: this.user.name,
                    email: this.user.email,
                    profile_img: this.user.profile_img,
                })
				.then((response) => {
                    setTimeout(() => {
                        this.isLoading = false;
                        this.success = true;
                        this.showMsg = true;

                        setTimeout(() => {
                            this.showMsg = false;
                        }, 1000);
                    }, 1000);
				})
                .catch((error) => {
                    setTimeout(() => {
                        this.isLoading = false;
                        this.success = false;
                        this.showMsg = true;

                        setTimeout(() => {
                            this.showMsg = false;
                        }, 1000);
                    }, 1000);
					console.error(error);
				});
            },
            getAllMeds(){
                axios
				.get(`/api/medicins/${this.user.id}`)
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
				.post('/api/medicin/create', {
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
