<style>
    /* ######################################################### */
    .content .date_readings_section {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 1em;
    }

    .content .date_readings_section .actions {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: stretch;
        flex-wrap: wrap;
        gap: .5em;
    }

    .content .date_readings_section .actions div {
        padding: .5em;
        display: flex;
        justify-content: stretch;
        align-items: flex-end;
        flex-direction: row;
        gap: .5em;
        flex-wrap: wrap;
    }

    .content .date_readings_section .actions div span {
        display: flex;
        flex-direction: column;
        /* gap: .5em; */
    }

    .content .date_readings_section .actions div button,
    .content .date_readings_section .actions div select {
        padding: .5em;
        font-size: .8em;
    }

    .content .date_readings_section .actions div input {
        border-bottom: 2px solid var(--accent);
    }

    .content .date_readings_section .actions div select {
        border-bottom: 2px solid var(--accent);
        background-color: var(--main);
        color: var(--textCol);
        border-top-left-radius: .5em;
        border-top-right-radius: .5em;
    }

    .content .date_readings_section .actions div button {
        background-color: var(--accent);
        color: var(--textCol);
        border-radius: .5em;
    }

    .content .date_readings_section .datereadings_section_loadtable {
        overflow-y: scroll;
        padding-right: .5em;
        height: 50vh;
    }

    /* .content .date_readings_section .datereadings_section_loadtable::-webkit-scrollbar {
    background-color: var(--accent);
    width           : 15px;
    border-radius   : .5em;
}

.content .date_readings_section .datereadings_section_loadtable::-webkit-scrollbar-thumb {
    background-color   : var(--main);
    border-radius      : .5em;
} */

    /* 
.content .date_readings_section .datereadings_section_loadtable table {
    border         : 2px solid var(--accent);
    border-collapse: collapse;
    width          : 100%;
    font-size      : .8em;
}

.content .date_readings_section .datereadings_section_loadtable table thead {
    position: sticky;
    top     : 0;
    left    : 0;
    z-index : 1;
    width   : 100%;
}

.content .date_readings_section .datereadings_section_loadtable table tr th {
    background-color: var(--accent);
    color           : var(--textCol);
    padding         : .3em;
}

.content .date_readings_section .datereadings_section_loadtable table tr td {
    padding: .5em;
}

.content .date_readings_section .datereadings_section_loadtable table tr th,
.content .date_readings_section .datereadings_section_loadtable table tr td {
    border: 1px solid var(--main);
} */

    /* ######################################################### */
</style>

<section class="date_readings_section">
    <h1>Date Readings</h1>
    <div class="actions">
        <div>
            <span>
                <label for="">Date</label>
                <select name="" id="date_readings_sel">
                    <!-- TODO Load Dates here -->
                </select>
            </span>
            <span>
                <label for="">Device ID</label>
                <select name="" id="device_reading_sel">
                    <!-- TODO Load Device IDs Here -->
                </select>
            </span>
            <span class="action_btn">
                <button id="load_date_readings">Load by Date</button>
            </span>
        </div>
        <div>
            <span>
                <label for="">From</label>
                <input type="time" name="" id="load_time_from">
            </span>
            <span>
                <label for="">To</label>
                <input type="time" name="" id="load_time_to">
            </span>
            <span class="action_btn">
                <button id="load_time_readings">Load by Time</button>
            </span>
        </div>
        <div>
            <label for="">Display Type</label>
            <select name="" id="selectDisplayType">
                <option value="Chart">Chart</option>
                <option value="Table">Table</option>
            </select>
        </div>
    </div>
    <div class="datereadings_section_loadchart" id="datereadings_section_loadchart">
        <!-- <canvas id="date_chart_canvas"></canvas> -->
    </div>
    <div class="datereadings_section_loadtable" id="datereadings_section_loadtable">
        <h4>Readings Table</h4>
        <table>
            <thead>
                <tr>
                    <th>Device</th>
                    <th>Water Level</th>
                    <th>Date - Time</th>
                </tr>
            </thead>
            <tbody class="date_readings_table" id="date_readings_table">
                <!-- Load Readings as Table -->
            </tbody>
        </table>
    </div>
</section>
<script src="assets/js/index.js"></script>
<script src="assets/js/fetch_readings.js"></script>