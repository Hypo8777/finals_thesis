 <style>
     /* ################################ */
     .content .livereadings_section {
         display: flex;
         flex-direction: column;
         justify-content: flex-start;
         align-items: center;
         gap: 1em;
     }

     .content .livereadings_section .actions div {
         padding: .5em;
         display: flex;
         justify-content: stretch;
         align-items: center;
         flex-direction: row;
         gap: .5em;
         flex-wrap: wrap;
     }


     .content .livereadings_section .actions {
         display: flex;
         flex-direction: row;
         justify-content: center;
         align-items: stretch;
         flex-wrap: wrap;
         gap: .5em;
     }

     .content .livereadings_section .actions div select {
         font-size: .8em;
         padding: .5em;
     }

     .content .livereadings_section .actions div select {
         border-bottom: 2px solid royalblue;
         background-color: cornflowerblue;
         color: #fffe;
         border-top-left-radius: .5em;
         border-top-right-radius: .5em;
     }
 </style>
 <section class="livereadings_section" id="livereadings_section">
     <h1>Live Readings for today</h1>
     <div class="actions">
         <div>
             <label for="">Choose Device</label>
             <select name="" id="device_reading_sel_live">
                 <!-- TODO Load Device Id -->
             </select>
         </div>
         <div>
             <label for="">Display Type</label>
             <select name="" id="selectDisplayTypeLive">
                 <option value="Table">Table</option>
                 <option value="Chart">Chart</option>
             </select>
         </div>
     </div>
     <div class="livereadings_section_loadchart" id="livereadings_section_loadchart">
         <!-- <canvas id="live_chart_canvas"></canvas> -->
     </div>
     <div class="livereadings_section_loadtable" id="livereadings_section_loadtable">
         <h4>Readings Table</h4>
         <table>
             <thead>
                 <tr>
                     <th>Device</th>
                     <th>Water Level</th>
                     <th>Date - Time</th>
                 </tr>
             </thead>
             <tbody class="live_readings_table" id="live_readings_table">
                 <!-- Load Readings as Table -->
             </tbody>
         </table>
     </div>
 </section>
 <script src="assets/js/App.js"></script>
 <script src="assets/js/LiveReadings.js"></script>