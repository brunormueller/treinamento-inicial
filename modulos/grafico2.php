<?php
$json_data = include('CXTRCAD002KITS.php');
?>
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    am5.ready(function() {
        var root = am5.Root.new("chartdiv");
        root.setThemes([
            am5themes_Animated.new(root)
        ]);
        var chart = root.container.children.push(am5percent.SlicedChart.new(root, {
            layout: root.verticalLayout
        }));
        var series = chart.series.push(am5percent.FunnelSeries.new(root, {
            alignLabels: false,
            orientation: "vertical",
            valueField: "vendidos_kits",
            categoryField: "nome_kits"
        }));
        series.data.setAll([<?php echo $json_data; ?>])
        series.appear();
        var legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50,
            marginTop: 25,
            marginBottom: 15
        }));
       

        legend.data.setAll(series.dataItems);
        chart.appear(1000, 100);
    });
</script>
<div id="chartdiv"></div>