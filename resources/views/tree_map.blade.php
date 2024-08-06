<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização TreeMap</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }
        button:hover {
            background-color: #555;
        }
        #tree-map {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .node {
            stroke: #fff;
            stroke-width: 1px;
            transition: stroke-width 0.2s, stroke 0.2s;
        }
        .node:hover {
            stroke: #000;
            stroke-width: 2px;
        }
        .label {
            font-size: 12px;
            text-anchor: middle;
            dominant-baseline: central;
            pointer-events: none;
            fill: #000;
        }
    </style>
</head>
<body>
    <h1>Visualização TreeMap</h1>
    <form method="GET" action="{{ route('tree-map') }}">
        <label for="city">Escolha a cidade:</label>
        <input type="text" id="city" name="city" value="{{ $city ?? 'Porto Alegre' }}">
        <button type="submit">Buscar</button>
    </form>
    <div id="tree-map"></div>

    <script>
        const data = {!! $data !!};

        console.log(data); // Verifique a estrutura dos dados no console do navegador

        const width = 960;
        const height = 600;

        const svg = d3.select("#tree-map").append("svg")
            .attr("width", width)
            .attr("height", height)
            .style("border", "1px solid #ccc")
            .style("background-color", "#fff");

        const root = d3.hierarchy(data).sum(d => d.size);

        d3.treemap()
            .size([width, height])
            .padding(4)(root);

        const color = d3.scaleOrdinal(d3.schemeCategory10);

        const nodes = svg.selectAll("g")
            .data(root.leaves())
            .enter().append("g")
            .attr("transform", d => `translate(${d.x0},${d.y0})`);

        nodes.append("rect")
            .attr("class", "node")
            .attr("width", d => d.x1 - d.x0)
            .attr("height", d => d.y1 - d.y0)
            .style("fill", d => color(d.data.name));

        nodes.append("text")
            .attr("class", "label")
            .attr("x", d => (d.x1 - d.x0) / 2)
            .attr("y", d => (d.y1 - d.y0) / 2)
            .attr("dy", ".35em")
            .attr("text-anchor", "middle")
            .text(d => `${d.data.name}: ${d.data.size.toFixed(2)}`)  /
            .each(function (d) {
                const bbox = this.getBBox();
                if (bbox.width > (d.x1 - d.x0) || bbox.height > (d.y1 - d.y0)) {
                    d3.select(this).attr("font-size", "8px");
                }
            });

        nodes.append("title")
            .text(d => `${d.data.name}: ${d.data.size.toFixed(2)}`);  
    </script>
</body>
</html>
