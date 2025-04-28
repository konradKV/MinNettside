<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/Naturfag.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biogassprosjekt</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <nav>
        <div>
            <a href="../Html/HvordanFungererBiogass.html">Hvordan Fungerer Biogass?</a>
            <a href="../Html/Naturfag.html">Hovudmeny</a>

        </div>
    </nav>
    <main>
        <h2>Statistikk for Biogassproduksjon</h2>
        <h3>Har du hørdt om biogass før?</h3>
        <div id="piechart1" style="width: 100%;"></div>
        
        <div id="piechart2" style="width: 100%;"></div>
        <h3>Hva forbinner du med biogass?</h3>
        <div id="piechart3" style="width: 100%;"></div>
        <h3>Hva mener du er den største fordelen med biogass?</h3>
        <div id="piechart4" style="width: 100%;"></div>
        <h3>Hva mener du er den største utfordringen med biogass?</h3>
        <div id="piechart5" style="width: 100%;"></div>
        <h3>Ville du vurdert å bruke biogass i din verdag?</h3>
        <div id="piechart6" style="width: 100%;"></div>
        <h3>Tror du at man kan lage biogass heime?</h3>
        <div id="piechart7" style="width: 100%;"></div> 
    </main>
    <script>
        // Pie chart data for chart 1
        var data1 = [{
            values: [4, 5],
            labels: ['ja', 'nei',],
            type: 'pie'
        }];

        // Pie chart layout for chart 1
        var layout1 = {
            height: 400,
            width: 500
        };


        // Pie chart layout for chart 2
        var layout2 = {
            height: 400,
            width: 500
        };

        // Pie chart data for chart 3
        var data3 = [{
            values: [3, 1, 1, 2],
            labels: ['redusert CO2 utslipp', '  bruk av avfall som ressurs', 'fornybar energi', 'billigere alternativ'],
            type: 'pie'
        }];

        // Pie chart layout for chart 3
        var layout3 = {
            height: 400,
            width: 500
        };

        // Pie chart data for chart 4
        var data4 = [{
            values: [2, 1, 5],
            labels: ['tilgjengelighet', 'teknologiutvikling', 'vet ikke'],
            type: 'pie'
        }];

        // Pie chart layout for chart 4
        var layout4 = {
            height: 400,
            width: 500
        };

        // Pie chart data for chart 5
        var data5 = [{
            values: [1, 1, 6],
            labels: ['ja', 'nei', 'kanskje'],
            type: 'pie'
        }];

        // Pie chart layout for chart 5
        var layout5 = {
            height: 400,
            width: 500
        };

        // Pie chart data for chart 6
        var data6 = [{
            values: [2, 1, 5],
            labels: ['ja', 'nei', 'kanskje'],
            type: 'pie'
        }];

        // Pie chart layout for chart 6
        var layout6 = {
            height: 400,
            width: 500
        };

        // Pie chart data for chart 7
        var data7 = [{
            values: [5, 3],
            labels: ['ja', 'nei',],
            type: 'pie'
        }];

        // Pie chart layout for chart 7
        var layout7 = {
            height: 400,
            width: 500
        };

    

        // Pie chart layout for chart 8
        var layout8 = {
            height: 400,
            width: 500
        };

        // Plot pie charts
        Plotly.newPlot('piechart1', data1, layout1);
        Plotly.newPlot('piechart3', data3, layout3);
        Plotly.newPlot('piechart4', data4, layout4);
        Plotly.newPlot('piechart5', data5, layout5);
        Plotly.newPlot('piechart6', data6, layout6);
        Plotly.newPlot('piechart7', data7, layout7);


    </script>
</body>
</html>
