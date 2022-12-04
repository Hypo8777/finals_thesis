$('#datereadings_section_loadchart').show();
$('#datereadings_section_loadtable').hide();

$('#selectDisplayType').on('change', () => {
    if ($('#selectDisplayType').val() == "Chart") {
        $('#datereadings_section_loadchart').show();
        $('#datereadings_section_loadtable').hide();
    } else if ($('#selectDisplayType').val() == "Table") {
        $('#datereadings_section_loadchart').hide();
        $('#datereadings_section_loadtable').show();
    }
});



function loadDateReadingsChart() {
    let request = {
        date_readings_sel: $('#date_readings_sel').val(),
        device_reading_sel: $('#device_reading_sel').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/readings.php?get_readings_bydate&date=" + request.date_readings_sel + "&device=" + request.device_reading_sel,
        success: async function (response) {
            // Parse Fetched Data in to JSON format
            // console.log(await response);
            let dataResponse = JSON.parse(await response);
            // CHART Data Variables
            var sensor_data = dataResponse.sensor_data.split(",");
            var time_entry = dataResponse.time_entry.split(",");
            let data_array = {
                x_data: sensor_data,
                y_data: time_entry,
            }
            // Generate Chart
            $('#datereadings_section_loadchart').html('<canvas id="date_chart_canvas"></canvas>');
            let date_readings_chart = new Chart($('#date_chart_canvas'), {
                type: 'line',
                data: {
                    labels: data_array.y_data,
                    datasets:
                        [{
                            label: "Readings for Device",
                            data: data_array.x_data,
                            borderColor: "#0003",
                            backgroundColor: function (context) {
                                let value = context.dataset.data[context.dataIndex];
                                if (value == 3) {
                                    return "crimson";
                                } else {
                                    if (value == 2) {
                                        return "gold";
                                    } else {
                                        return "lime";
                                    }
                                }
                            }
                        }
                        ]
                },
                options: opts
            });
        }
    });
}

setTimeout(() => {
    loadDateReadingsChart();
}, 200);

function loadDateReadingsTable() {
    let request = {
        date_readings_sel: $('#date_readings_sel').val(),
        device_reading_sel: $('#device_reading_sel').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/readings_table.php?get_readings_bydate&date=" + request.date_readings_sel + "&device=" + request.device_reading_sel,
        success: async function (response) {
            const datalist = await response;
            $('#date_readings_table').html(datalist);
        }
    });
}

$('#load_date_readings').click(() => {
    if ($('#selectDisplayType').val() == "Chart") {
        loadDateReadingsChart();
    } else if ($('#selectDisplayType').val() == "Table") {
        loadDateReadingsTable();
    }
});

function loadDateReadingsByTime_Chart() {
    let request = {
        date_readings_sel: $('#date_readings_sel').val(),
        device_reading_sel: $('#device_reading_sel').val(),
        load_time_from: $('#load_time_from').val(),
        load_time_to: $('#load_time_to').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/readings.php?get_readings_bytime&date=" + request.date_readings_sel + "&device=" + request.device_reading_sel + "&from=" + request.load_time_from + "&to=" + request.load_time_to,
        success: async function (response) {
            // Parse Fetched Data in to JSON format
            let dataResponse = JSON.parse(await response);
            // CHART Data Variables
            var sensor_data = dataResponse.sensor_data.split(",");
            var time_entry = dataResponse.time_entry.split(",");
            // Generate Chart
            $('#datereadings_section_loadchart').html('<canvas id="date_chart_canvas"></canvas>');
            let date_readings_chart = new Chart($('#date_chart_canvas'), {
                type: 'line',
                data: {
                    labels: time_entry,
                    datasets:
                        [{
                            label: "Readings for Device",
                            data: sensor_data,
                            borderColor: "#0003",
                            backgroundColor: function (context) {
                                let value = context.dataset.data[context.dataIndex];
                                if (value == 3) {
                                    return "crimson";
                                } else {
                                    if (value == 2) {
                                        return "gold";
                                    } else {
                                        return "lime";
                                    }
                                }
                            }
                        }
                        ]
                },
                options: opts
            });
        }
    });
}



function loadDateReadingsByTime_Table() {
    let request = {
        date_readings_sel: $('#date_readings_sel').val(),
        device_reading_sel: $('#device_reading_sel').val(),
        load_time_from: $('#load_time_from').val(),
        load_time_to: $('#load_time_to').val()
    }
    $.ajax({
        type: "GET",
        url: "php/view/readings_table.php?get_readings_bytime&date=" + request.date_readings_sel + "&device=" + request.device_reading_sel + "&from=" + request.load_time_from + "&to=" + request.load_time_to,
        success: async function (response) {
            const datalist = await response;
            $('#date_readings_table').html(datalist);
        }
    });
}

$('#load_time_readings').click(() => {
    if ($('#selectDisplayType').val() == "Chart") {
        loadDateReadingsByTime_Chart();
    } else if ($('#selectDisplayType').val() == "Table") {
        loadDateReadingsByTime_Table();
    }
});