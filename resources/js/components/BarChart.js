import {
  Bar
} from 'vue-chartjs'

export default {
  extends: Bar,
  mounted() {

/*
    this.renderChart({
      labels: ['Electric', 'Gas', 'Oil', 'LPG', 'Wood'],
      datasets: [{
        label: 'Predev',
        backgroundColor: '#339',
        chartdata: [90, 79, 30, 0, 23]
      }, {
        label: 'Forecast',
        backgroundColor: '#449',
        chartdata: [60, 55, 12, 0, 25]
      },{
        label: 'Measured',
        backgroundColor: '#559',
        chartdata: [60, 55, 12, 0, 2]
      }
    ]
    }, {
      responsive: true,
      maintainAspectRatio: false
    })
    */
    props: {
      chartdata: {
        type: Object,
        default: null
      },
      options: {
        type: Object,
        default: null
      }
    },
    mounted () {
      this.renderChart(this.chartdata, this.options)
    }
    }
  }
}
