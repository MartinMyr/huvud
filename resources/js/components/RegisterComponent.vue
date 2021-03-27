<template>
    <div id="register" class="container">

        <h1>Hej {{ user.name }} hur ont har du just nu?</h1>
        <div class="painscale input-wrapper">

            <div class="items">
                <div
                    class="item"
                    v-for="(pain, i) in painScale">

                    <b-radio
                        v-model="radio"
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

            <b-select placeholder="Välj">
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
                <b-datepicker
                    placeholder="Klicka här"
                    >
                </b-datepicker>
            </b-field>

        </div>

        <div class="meds input-wrapper">

            <h2>Medicin</h2>

        </div>

        <div class="comment input-wrapper">

            <h2>Kommentar</h2>

            <b-field>
                <b-input maxlength="200" type="textarea"></b-input>
            </b-field>

        </div>

        <div class="input-wrapper">
            <b-button type="is-dark">Registrera</b-button>
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
            };
	    },
        mounted() {

        },
        props: ['user']
    }
</script>
