<template>
    <div id="loading-component">
        <b-loading :is-full-page="true" v-model="isLoading"></b-loading>
        <div v-if="this.showMsg" class="success-msg">
            <div v-if="success" class="success">
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
        props: {
            isLoading: {
                type: Boolean,
            },
            success: {
                type: Boolean,
            },
            showMsg: {
                type: Boolean,
            },
        },
    }
</script>
