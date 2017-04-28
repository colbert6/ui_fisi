
    $('#btnAceptar').click(function(){
        $('#Grafico').modal('toggle');
    });

    $(function(){
      //grafiquito();
      ReporteDocente();
    });

  function ReporteDocente(){

    var chart = new CanvasJS.Chart("chartContainer", {

      title:{
        text:"Fortune Global 500 Companies by Country"        

      },
                        animationEnabled: true,
      axisX:{
        interval: 1,
        gridThickness: 0,
        labelFontSize: 10,
        labelFontStyle: "normal",
        labelFontWeight: "normal",
        labelFontFamily: "Lucida Sans Unicode"

      },
      axisY2:{
        interlacedColor: "rgba(1,77,101,.2)",
        gridColor: "rgba(1,77,101,.1)"

      },

      data: [
      {     
        type: "bar",
                name: "companies",
        axisYType: "secondary",
        color: "#014D65",       
        dataPoints: [
        
        {y: 5, label: "Sweden"  },
        {y: 6, label: "Taiwan"  },
        {y: 7, label: "Russia"  },
        {y: 8, label: "Spain"  },
        {y: 8, label: "Brazil"  },
        {y: 8, label: "India"  },
        {y: 9, label: "Italy"  },
        {y: 9, label: "Australia"  },
        {y: 12, label: "Canada"  },
        {y: 13, label: "South Korea"  },
        {y: 13, label: "Netherlands"  },
        {y: 15, label: "Switzerland"  },
        {y: 28, label: "Britain" },
        {y: 32, label: "Germany"   },
        {y: 32, label: "France"  },
        {y: 68, label: "Japan"   },
        {y: 73, label: "China"},
        {y: 132, label: "US" }
        ]
      }
      
      ]
    });

    chart.render();
    
  }
    

  function grafiquito(){
    var chart = new CanvasJS.Chart("chartContainer",
    {
        theme: "theme3",
        animationEnabled: true,
        title:{
          text: "Proyectos y Tesis, 2016",
          fontSize: 14
        },
        toolTip: {
          shared: true
        },      
        axisY: {
          title: "Nro de Proyectos"
        },
        axisY2: {
          title: "Proyectos/Mes"
        },      
        data: [ 
        {
          type: "column", 
          name: "Proyectos de Tesis",
          legendText: "Proyectos de Tesis",
          showInLegend: true, 
          dataPoints:[
              <?php foreach ($ProyectoTesis as $key => $value) {
                echo '{label: "'.$value["sem_id"].'"'.', y: '.(int)$value["total"].'},';
              } ?>
          ]
        },
        {
          type: "column", 
          name: "Tesis",
          legendText: "Tesis",
          showInLegend: true,
          dataPoints:[
              <?php foreach ($Tesis as $key => $value) {
                echo '{label: "'.$value["semestre"].'"'.', y: '.(int)$value["total"].'},';
              } ?>
          ]
        }
      
        ],
            legend:{
              cursor:"pointer",
              itemclick: function(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                  e.dataSeries.visible = false;
                }
                else {
                  e.dataSeries.visible = true;
                }
              }
            },
          });
    chart.render();
  
    //GRAFICO PROYECTO DOCENTES
    var barra = new CanvasJS.Chart("chartBarra",
    {
      title:{
        text: "Top Proyectos de Tesis",
        fontSize: 16    
      },
      animationEnabled: true,
      axisY: {
        title: "N° Proyectos de Tesis"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      width: 1000,
      theme: "theme2",
      data: [
        {        
          type: "column",  
          //showInLegend: true, 
          //legendMarkerColor: "grey",
          //legendText: "MMbbl = one million barrels",
          dataPoints: [   
            <?php foreach ($DocentesChart as $key => $value) {
              echo '{y: '.(int)$value["total"].', label: "'.$value["nombre"].'"},';
            } ?>   
          ]
        }   
      ]
    });
    barra.render();
    
    //GRAFICO LINEAS D INVESTIGACION
    var circulo = new CanvasJS.Chart("chartCirculo",
    {
      //title:{
      //  text: "How my time is spent in a week?",
      //  fontFamily: "arial black"
      //}, 
                  animationEnabled: true,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme1",
      data: [
      {        
        type: "pie",
        indexLabelFontFamily: "Garamond",       
        indexLabelFontSize: 20,
        indexLabelFontWeight: "bold",
        startAngle:0,
        indexLabelFontColor: "MistyRose",       
        indexLabelLineColor: "darkgrey", 
        indexLabelPlacement: "inside", 
        toolTipContent: "{name}: <strong>{y} Proyectos</strong>",
        showInLegend: true,
        //indexLabel: "#percent%", 
        dataPoints: [
          <?php foreach ($LinInvesChart as $key => $value) {
              echo '{y: '.(int)$value["total"].', name: "'.$value["linin_descripcion"]. '", indexLabel: "'.$value["total"].' Proy."},';
          } ?>
        ]
      }
      ]
    });
    circulo.render();
  }

  //GRAFICO MODAL 2 - DOCENTES
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Numero de Proyectos por Docente'
    },
    subtitle: {
        text: 'Oficina: <a href="#">Unidad de Investigacion</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de Proyectos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Proyectos: <b>{point.y:.1f} proyectos</b>'
    },
    series: [{
        name: 'Population',
        data: [
            <?php foreach ($Grafico as $key => $value) {
              echo '['.'"'.$value["nombre"].'"'.','.(int)$value["total"].'],';
            } ?> 
        ],
        /*
        
        */
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });

