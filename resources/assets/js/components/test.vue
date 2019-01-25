<script>
new Vue({
  el: '#vue-container',
  data: {
    name: "Steven",
    chartOptions: {
      title: {
        text: "CanvasJS Chart in Vue.js",
      },
      axisY:{
        title: "Count",
      },
      axisX: {
        margin: 16,
        labelWrap: true,
        labelAngle: -30,
        title: "Agent",
        interval: 1
      },
      data: [
        {
          type: "bar",
          showInLegend: true,
          name: "Valid",
          color: "#02AF44",
          dataPoints: []
        },
        {
          type: "bar",
          showInLegend: true,
          name: "Invalid",
          color: "#FD8A17",
          dataPoints: []
        },
      ]
    },
    chart : null,
  },
  mounted: function () {
    axios.get('https://test.testmyssl.xyz/api/allusers')
    .then(response => {
      console.log(response);
      let n = response.data;
      this.chart.options.data[0].dataPoints = n.map(x =>{
        let dataPoint = {
          y: x.valid,
          label: x.name
        }
        return dataPoint;
      });
      this.chart.options.data[1].dataPoints = n.map(x =>{
        let dataPoint = {
          y: x.invalid,
          label: x.name
        }
        return dataPoint;
      });
      this.chart.render();
    })




    this.chart = new CanvasJS.Chart("chartContainer", this.chartOptions);
    this.chart.render();
  }
})
</script>
