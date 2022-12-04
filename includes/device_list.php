<style>
    /* ######################################### */

    .devices_section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1em;
    }



    .devices_section .search_list {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: .5em;
    }

    .devices_section .search_list input {
        padding: .5em;
        /* background-color: #6494ed85; */
        border-bottom: 2px solid var(--accent);
    }

    .devices_section .search_list button {
        background-color: var(--accent);
        color: var(--textCol);
        border-radius: .5em;
    }

    .devices_section .list_table {
        overflow-y: scroll;
        padding-right: .5em;
        height: 50vh;
    }

    .devices_section .list_table table {
        border-collapse: collapse;
    }


    /* ########################################## */
</style>
<section class="devices_section" id="devices_section">
    <h1>Devices</h1>
    <div class="search_list">
        <label for="">Search</label>
        <input type="text" name="" id="search_input" placeholder="Device, Location etc">
        <button id="search_device">Search</button>
    </div>
    <div class="list_table">
        <caption>List of Devices</caption>
        <table>
            <thead>
                <tr>
                    <th>Device</th>
                    <th>Location</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody class="load_list" id="load_list">
                <!-- Load Device Here -->
            </tbody>
        </table>
    </div>
</section>
<script>
    $('#search_device').click(() => {
        // console.log($('#search_input').val());
        $.ajax({
            type: "POST",
            url: "php/view/devices.php?search",
            data: {
                searchInput: $('#search_input').val()
            },
            success: async function(response) {
                $('#load_list').html(await response);
            }
        });
    });
    setTimeout(() => {
        $.ajax({
            type: "POST",
            url: "php/view/devices.php?load_list",
            success: async function(response) {
                $('#load_list').html(await response);
            }
        });
    }, 200);
</script>