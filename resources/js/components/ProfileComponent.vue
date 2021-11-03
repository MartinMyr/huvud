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
                <b-field class="is-primary" label="Profilbild">
                    <b-upload v-model="image" class="file-label">
                        <span class="file-cta">
                            <b-icon class="file-icon" icon="upload"></b-icon>
                            <span class="file-label">Ladda upp</span>
                        </span>
                    </b-upload>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Gammalt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal
                        v-model="user.old_password"
                    >
                    </b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Nytt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal
                        v-model="user.password"
                        >
                    </b-input>
                </b-field>
            </div>
            <div class="col-sm-6">
                <b-field label="Bekräfta nytt lösenord">
                    <b-input type="password"
                        placeholder="************"
                        password-reveal
                        v-model="user.c_password"
                    >
                    </b-input>
                </b-field>
            </div>
            <div class="col-12">
                <div class="input-wrapper">
                    <b-button @click="updateProfile" type="is-dark">Spara</b-button>
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
                    <div class="b-table">
                        <div class="table-wrapper has-mobile-cards">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-wrap">
                                                <span class="is-relative"> Min medicin</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="medicin in medicins">
                                        <td>
                                            <span>{{medicin.name}}</span>
                                            <span
                                                class="delete-med"
                                                :data-id="medicin.id"
                                                @click="deleteMedicin(medicin.id)"
                                            ></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                image: [],
            };
	    },
        mounted() {
            this.getAllMeds();
        },
        methods:{
            deleteMedicin(id){
                this.isLoading = true;

                axios
				.delete(`/api/medicin/delete/${id}`)
				.then((response) => {
                    setTimeout(() => {
                        this.isLoading = false;
                        this.success = true;
                        this.showMsg = true;
                        this.getAllMeds();
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
            updateProfile(){
                this.isLoading = true;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let formData = new FormData();
                formData.append('profile_img', this.image);
                formData.append('name', this.user.name);
                formData.append('email', this.user.email);
                formData.append('id', this.user.id);

                axios
				.post('/api/user/update/profile', formData, config )
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
                    name: this.newMedicin
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
