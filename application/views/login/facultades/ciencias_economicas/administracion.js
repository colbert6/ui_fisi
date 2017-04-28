CanvasDocente();
CanvasTiposProyecto();
CanvasLineasInvestigacion();


function CanvasDocente(){
//alert($("#chartContainer").width());

    var chart = new CanvasJS.Chart("CanvasDocente",
    {
      title:{  text: "Participación de Docentes en los Proyectos de Investigación (2016 - I)"   },
      animationEnabled: true,

      legend: {
        cursor:"pointer",
        itemclick : function(e) {
          if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              e.dataSeries.visible = false;
          }
          else {  e.dataSeries.visible = true;  }
          chart.render();
        }
      },
      axisY: {   title: "Número Proyectos" },
      toolTip: {
        shared: true,  
        content: function(e){
          var str = '';
          var total = 0 ;
          var str3;
          var str2 ;
          for (var i = 0; i < e.entries.length; i++){
            var  str1 = "<span style= 'color:"+e.entries[i].dataSeries.color + "'> " + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ; 
            total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
          }
          str2 = "<span style = 'color:DodgerBlue; '><strong>"+e.entries[0].dataPoint.label + "</strong></span><br/>";
          str3 = "<span style = 'color:Tomato '>Total: </span><strong>" + total + "</strong><br/>";
          
          return (str2.concat(str)).concat(str3);
        }

      },
      data: [
      {        
        type: "bar",
        showInLegend: true,
        name: "ASESOR",
        color: "DarkGray",
        dataPoints: [
        { y: 18, label: "Ing. Miguel Angel Valles Coral"},
        { y: 28, label: "Ing. Pedro Gonzales Sanchez"},
        { y: 25, label: "Ing. Mg. Juan Carlos Garcia Castro"},        
        { y: 16, label: "Ing. M. Sc. Pamela Magnolia Granda Milon"},        
        { y: 26, label: "Ing. John Antony Cueva Ruiz"},        
        { y: 37, label: "Otros"}  

        ]
      },
      {        
        type: "bar",
        showInLegend: true,
        name: "JURADO",
        color: "Gold",          
        dataPoints: [
        { y: 28, label: "Ing. Miguel Angel Valles Coral"},
        { y: 11, label: "Ing. Pedro Gonzales Sanchez"},
        { y: 12, label: "Ing. Mg. Juan Carlos Garcia Castro"},        
        { y: 26, label: "Ing. M. Sc. Pamela Magnolia Granda Milon"},        
        { y: 25, label: "Ing. John Antony Cueva Ruiz"},        
        { y: 47, label: "Otros"}   

        ]
      }

      ]
    });
    chart.render();
}

function CanvasTiposProyecto(){
    var chart = new CanvasJS.Chart("CanvasTiposProyecto",
        {

            title:{
                text: "Proyectos de Investigación",
                fontSize: 30
            },
                        animationEnabled: true,
            axisX:{

                gridColor: "Silver",
                tickColor: "silver",
                valueFormatString: "YYYY"

            },                        
                        toolTip:{
                          shared:true
                        },
            theme: "theme2",
            axisY: {
                gridColor: "Silver",
                tickColor: "silver"
            },
            legend:{
                verticalAlign: "center",
                horizontalAlign: "right"
            },
            data: [
            {        
                type: "line",
                showInLegend: true,
                lineThickness: 2,
                name: "PROYECTOS DE TESIS",
                markerType: "square",
                color: "#F08080",
                dataPoints: [
                { x: new Date(2010,0,3), y: 650 },
                { x: new Date(2011,0,5), y: 700 },
                { x: new Date(2012,0,7), y: 710 },
                { x: new Date(2013,0,9), y: 658 },
                { x: new Date(2014,0,11), y: 734 },
                { x: new Date(2015,0,13), y: 963 },
                { x: new Date(2016,0,15), y: 847 },
                { x: new Date(2017,0,17), y: 853 },
                { x: new Date(2018,0,19), y: 869 },
                { x: new Date(2019,0,21), y: 943 },
                { x: new Date(2020,0,23), y: 970 }
                ]
            },
            {        
                type: "line",
                showInLegend: true,
                name: "TESIS",
                color: "#20B2AA",
                lineThickness: 2,

                dataPoints: [
                { x: new Date(2010,0,3), y: 510 },
                { x: new Date(2011,0,5), y: 560 },
                { x: new Date(2012,0,7), y: 540 },
                { x: new Date(2013,0,9), y: 558 },
                { x: new Date(2014,0,11), y: 544 },
                { x: new Date(2015,0,13), y: 693 },
                { x: new Date(2016,0,15), y: 657 },
                { x: new Date(2017,0,17), y: 663 },
                { x: new Date(2018,0,19), y: 639 },
                { x: new Date(2019,0,21), y: 673 },
                { x: new Date(2020,0,23), y: 660 }
                ]
            }

            
            ],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
        });

chart.render();
}

function CanvasLineasInvestigacion(){
    var chart = new CanvasJS.Chart("CanvasLineasInvestigacion",
    {
        title:{
            text: "Lineas de Investigación"
        },
        exportFileName: "Pie Chart",
        exportEnabled: true,
                animationEnabled: true,
        legend:{
            verticalAlign: "bottom",
            horizontalAlign: "center"
        },
        data: [
        {       
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} {y}%",
            dataPoints: [
                {  y: 35, name: "Telecomunicaciones y Redes", exploded: true},
                {  y: 20, name: "Desarrollo de Software"},
                {  y: 18, name: "Administración de Base de Datos"},
                {  y: 15, name: "Gestión de Proyectos"},
                {  y: 5,  name: "Robotica"},
                {  y: 7,  name: "Metodologías de Sistemas Blandos"}
            ]
    }
    ]
    });
    chart.render();
}