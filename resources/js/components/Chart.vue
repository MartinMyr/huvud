<template>
    <div>
        <h1>Översikt</h1>

        <v-chart @click="onClick" class="chart" :option="option" />

        <logs></logs>
    </div>
</template>

<script>
import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { PieChart } from "echarts/charts";
import {
    TitleComponent,
    TooltipComponent,
    LegendComponent,
    GridComponent
} from "echarts/components";
import VChart, { THEME_KEY } from "vue-echarts";

use([
    CanvasRenderer,
    PieChart,
    TitleComponent,
    TooltipComponent,
    LegendComponent,
    GridComponent
]);

export default {
    name: "HelloWorld",
    components: {
        VChart
    },
    provide: {
        [THEME_KEY]: "dark"
    },
    data() {
        return {
            option: {
                title: {
                    text: 'Per månad',
                    left: 'center',
                    subtext: 'Klicka på tårtbit för att ladda in månadens loggningar',
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        name: '',
                        type: 'pie',
                        radius: '50%',
                        data: [],

                    }
                ]
            }
        };
    },
    beforeMount() {
        this.getLogs();
    },
    methods: {
        onClick(event, instance, ECharts) {
            console.log(event, instance, ECharts);
        },
        getLogs(){
            axios.get('/log/getAll')
            .then(function (response) {
                //this.option.series.data = response.data;
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
        }
    }
};
</script>

<style scoped>
    .chart {
        height: 600px;
        width:100%;
    }
</style>
