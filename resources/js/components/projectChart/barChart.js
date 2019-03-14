import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,


  props: {
    chartdata: {
      type: Object,
      default: {
        labels: ['Electric', 'Gas', 'Oil', 'LPG', 'Wood'],
        datasets: [{
          label: 'Predev',
          backgroundColor: '#aaf',
          data: null//[90, 79, 30, 0, 23]
        }, {
          label: 'Forecast',
          backgroundColor: '#afa',
          data: null//[60, 55, 12, 0, 25]
        },{
          label: 'Measured',
          backgroundColor: '#faa',
          data: null//[60, 55, 12, 0, 2]
        }
      ]
      }
    },
    options: {
      type: Object,
      default:{
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
      }
    }
  },
  mounted () {
    this.renderChart(  this.chartdata , this.options)
  }
}
