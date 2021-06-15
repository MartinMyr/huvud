<template>
    <div>
        <h1>Översikt</h1>
        <apexchart width="500" type="line" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>
<script>
    var test = this;
    export default {
        data() {
            return {
                selectedMonth: '',
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chartOptions: {
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        },
                        events:{
                            markerClick: function(event, chartContext, { seriesIndex, dataPointIndex, config}) {

                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                    }
                },
            }
        },
        methods: {
        }
    }



  </script>
