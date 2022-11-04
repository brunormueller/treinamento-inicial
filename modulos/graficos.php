<?php
$json_data = include('CXTRCAD002GRAFICOS.php');


?>
<style>
    #chartdiv {
        width: 20%;
        height: 100px;
    }
</style>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {
        var root = am5.Root.new("chartdiv");
        root.setThemes([
            am5themes_Animated.new(root)
        ]);
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
            layout: root.verticalLayout
        }));
        var series = chart.series.push(am5percent.PieSeries.new(root, {
            valueField: "numero_rua_usuario",
            categoryField: "estado_usuario"
        }));
        series.data.setAll(<?php echo $json_data; ?>)
        var legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 15,
            marginBottom: 15
        }));

        legend.data.setAll(series.dataItems);
        series.appear(1000, 100);

    });
</script>
<div id="chartdiv"></div>