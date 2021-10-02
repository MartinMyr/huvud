<template>
    <div>
        <h1>Översikt</h1>

        <v-chart @click="onClick" class="chart" :option="option" />

        <logs :logs="getSelectedData" v-if="selectedMonth"></logs>
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
        name: "Chart",
        components: {
            VChart
        },
        provide: {
            [THEME_KEY]: "light"
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
                },
                selectedYear: new Date().getFullYear(),
                selectedMonth: '',
                logs: [],
            };
        },
        beforeMount() {
            this.getLogs();
        },
        computed: {
            getSelectedData(){
                return this.logs[this.selectedYear][this.selectedMonth];
            }
        },
        methods: {
            onClick(event) {
                this.selectedMonth = event.data.key;
            },
            getLogs(){
                var ths = this;

                axios.get(`/api/logs/${this.user.id}`)
                .then(function (response) {
                    ths.logs = response.data;
                    console.log(response.data);

                    ths.setLogsCounted(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
            setLogsCounted(logs){
                var values = [];
                var ths = this;

                $.each(logs[this.selectedYear], function(key, log) {
                    var obj = {};

                    obj['value'] = log.length;
                    obj['name'] = ths.getMonthName(parseInt(key));
                    obj['key'] = key;

                    values.push(obj);
                });

                this.option.series[0].data  = values;
            },
            getMonthName(key){
                switch (key) {
                    case 1:
                        return 'Januari';
                    case 2:
                        return 'Februari';
                    case 3:
                        return 'Mars';
                    case 4:
                        return 'April';
                    case 5:
                        return 'Maj';
                    case 6:
                        return 'Juni';
                    case 7:
                        return 'Juli';
                    case 8:
                        return 'Augusti';
                    case 9:
                        return 'September';
                    case 10:
                        return 'Oktober';
                    case 11:
                        return 'November';
                    case 12:
                        return 'December';
                }
            }
        },
        props: {
            user: {
                type: Object,
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
