$(document).ready(function () {
  expense_report();
});

function expense_report() {
  $.ajax({
    url: "processos/CXTRCAD002GRAFICOS.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      if (response.status == true) {
        var html = "";
        $("#dynamic_chartdiv").html("");
        $("#dynamic_chartdiv").html('<div id="chartdiv" ></div>');

        am5.ready(function () {
          // Create root element
          // https://www.amcharts.com/docs/v5/getting-started/#Root_element
          var root = am5.Root.new("chartdiv");

          // Set themes
          // https://www.amcharts.com/docs/v5/concepts/themes/
          root.setThemes([am5themes_Animated.new(root)]);

          // Create chart
          // https://www.amcharts.com/docs/v5/charts/xy-chart/
          var chart = root.container.children.push(
            am5xy.XYChart.new(root, {
              panX: true,
              panY: true,
              wheelX: "panX",
              wheelY: "zoomX",
              pinchZoomX: true,
            })
          );

          // Add cursor
          // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
          var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
          cursor.lineY.set("visible", false);

          // Create axes
          // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
          var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 30,
          });
          xRenderer.labels.template.setAll({
            rotation: -90,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15,
          });

          var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
              maxDeviation: 0.3,
              categoryField: "category", //add your field name
              renderer: xRenderer,
              tooltip: am5.Tooltip.new(root, {}),
            })
          );

          var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
              maxDeviation: 0.3,
              //min: 0,
              renderer: am5xy.AxisRendererY.new(root, {}),
            })
          );

          // Create series
          // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
          var series = chart.series.push(
            am5xy.ColumnSeries.new(root, {
              name: "Series 1",
              xAxis: xAxis,
              yAxis: yAxis,
              valueYField: "value", //add your field name
              sequencedInterpolation: true,
              categoryXField: "category", //add your field name
              tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}",
              }),
            })
          );

          series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
          });
          series.columns.template.adapters.add("fill", function (fill, target) {
            return chart.get("colors").getIndex(series.columns.indexOf(target));
          });

          series.columns.template.adapters.add(
            "stroke",
            function (stroke, target) {
              return chart
                .get("colors")
                .getIndex(series.columns.indexOf(target));
            }
          );

          // Set data
          //static data
          /*
	var data = [{
	  country: "USA",
	  value: 2025
	}, {
	  country: "China",
	  value: 1882
	}, {
	  country: "Japan",
	  value: 1809
	}];
	*/

          //dynamic data pass
          var chart_data = [];
          for (var i = 0; i < response.data.length; i++) {
            chart_data.push({
              category: response.data[i].category,
              value: parseInt(response.data[i].value),
            });
          }
          console.log(chart_data);

          xAxis.data.setAll(chart_data);
          series.data.setAll(chart_data);

          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          series.appear(1000);
          chart.appear(1000, 100);
        }); // end am5.ready()
      } else {
        alert(response.msg);
      }
    },
    error: function (xhr, status) {
      console.log("ajax error = " + xhr.statusText);
      alert(response.msg);
    },
  });
}
