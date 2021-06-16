<template>
    <div>
        <h1>Översikt</h1>
        <v-chart @click="onClick" class="chart" :option="option" />
    </div>
</template>

<script>
import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { LineChart } from "echarts/charts";
import {
    TitleComponent,
    TooltipComponent,
    LegendComponent,
    GridComponent
} from "echarts/components";
import VChart, { THEME_KEY } from "vue-echarts";

use([
    CanvasRenderer,
    LineChart,
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
                xAxis: {
                    type: 'category',
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: [150, 230, 224, 218, 135, 147, 260],
                    type: 'line'
                }],
                title: {
                    text: "Månads vy",
                    left: "center"
                },
                tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                orient: "vertical",
                left: "left",
                data: [
                    "Direct",
                    "Email",
                    "Ad Networks",
                    "Video Ads",
                    "Search Engines"
                ]
                },
                series: [{
                    name: "Traffic Sources",
                    type: "line",
                    radius: "55%",
                    center: ["50%", "60%"],
                    data: [
                        { value: 335, name: "Direct" },
                        { value: 310, name: "Email" },
                        { value: 234, name: "Ad Networks" },
                        { value: 135, name: "Video Ads" },
                        { value: 1548, name: "Search Engines" }
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: "rgba(0, 0, 0, 0.5)"
                        }
                    },

                }],
            }
        };
    },
    methods: {
        onClick(event, instance, ECharts) {
            console.log(event, instance, ECharts);
        }
    }
};
</script>

<style scoped>
.chart {
  height: 400px;
  width:100%;
}
</style>
