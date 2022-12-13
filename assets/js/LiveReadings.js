$('#livereadings_section_loadchart').hide();
$('#livereadings_section_loadtable').show();

$('#selectDisplayTypeLive').on('change', () => {
    if ($('#selectDisplayTypeLive').val() == "Chart") {
        $('#livereadings_section_loadchart').show();
        $('#livereadings_section_loadtable').hide();

    } else if ($('#selectDisplayTypeLive').val() == "Table") {
        $('#livereadings_section_loadchart').hide();
        $('#livereadings_section_loadtable').show();
    }
});

function loadLiveReadingsChart() {
    let request = {
        device: $('#device_reading_sel_live').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/ViewReadingsChart.php?get_live_readings&device=" + request.device,
        success: async function (response) {
            // Parse Fetched Data in to JSON format            
            let dataResponse = JSON.parse(await response);
            if (dataResponse.status !== 0) {
                // CHART Data Variables
                var sensor_data = dataResponse.sensor_data.split(",");
                var time_entry = dataResponse.time_entry.split(",");
                let data_array = {
                    x_data: sensor_data.reverse(),
                    y_data: time_entry.reverse(),
                }
                // Generate Chart
                $('#livereadings_section_loadchart').html('<canvas id="live_chart_canvas"></canvas>');
                let date_readings_chart = new Chart($('#live_chart_canvas'), {
                    type: 'line',
                    data: {
                        labels: data_array.y_data,
                        datasets:
                            [{
                                label: "Readings Chart",
                                data: data_array.x_data,
                                borderColor: "#0003",
                                backgroundColor: function (context) {
                                    let value = context.dataset.data[context.dataIndex];
                                    if (value == 3) {
                                        return "red";
                                    } else {
                                        if (value == 2) {
                                            return "yellow";
                                        } else {
                                            return "lime";
                                        }
                                    }
                                }
                            }]
                    },
                    options: opts
                });
            } else {
                $('#livereadings_section_loadchart').text(dataResponse.msg);
                // $('#live_chart_canvas').text(dataResponse.msg);
            }
        }
    });
}


function loadLiveReadingsTable() {
    let request = {
        device: $('#device_reading_sel_live').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/ViewReadingsTable.php?get_live_readings&device=" + request.device,
        success: async function (response) {
            // Parse Fetched Data in to JSON format
            const datalist = await response;
            // CHART Data Variables 
            $('#live_readings_table').html(datalist);
        }
    });
}

setTimeout(() => {
    setInterval(() => {
        if ($('#selectDisplayTypeLive').val() == "Chart") {
            loadLiveReadingsChart();
        } else if ($('#selectDisplayTypeLive').val() == "Table") {
            loadLiveReadingsTable();
        }
    }, 1000);
}, 200);
