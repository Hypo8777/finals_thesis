
// Loading all Date Readings when readings occured
function fetch_date() {
    $.ajax({
        type: "GET",
        url: "php/view/fetch_data.php?get_date",
        success: async (response) => {
            let data = JSON.parse(await response);
            $('#date_readings_sel').html(data.date);
            $('#device_readings_sel').html(data.device);
        }
    });
    return this;
}

// Loading Registered Device in the database
function fetch_device() {
    $.ajax({
        type: "GET",
        url: "php/view/fetch_data.php?get_device",
        success: async function (response) {
            let data = JSON.parse(await response);
            $('#device_reading_sel').html(data.device);
            $('#device_reading_location').val(data.location);
            $('#device_reading_location_live').val(data.location);
            $('#device_reading_sel_live').html(data.device);
        }
    });
    return this;
}

fetch_date();
fetch_device();

setTimeout(() => {
    fetch_date();
    fetch_device();
}, 500);


let opts = {
    animation: false,
    responsive: true,
    plugins: {
        title: {
            display: true,
            text: "Readings Chart",
        }
    },
    scales: {
        y: {
            beginAtZero: false,
            stacked: false,
            ticks: {
                color: 'black',
                font: {
                    weight: 'bold',
                    size: 10,
                    family: 'Segoe UI EMOJI',
                }
            },
            title: {
                display: true,
                text: "Water Levels",
            }
        },
        x: {
            beginAtZero: false,
            ticks: {
                color: 'black',
                font: {
                    weight: '900',
                    size: 10,
                    family: 'Segoe UI EMOJI'
                }
            },
            title: {
                display: true,
                text: "Time",
            }
        }
    }
}