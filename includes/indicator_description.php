<style>
    .indicators {
        /* background-color   : var(--accent); */
        /* width           : 100%; */
        padding: .5em;
        border-radius: .5em;
        display: flex;
        flex-direction: column;
        gap: .5em;
    }

    .indicators h3 {
        color: royalblue;
    }

    .indicators details summary {
        cursor: pointer;
        padding: .5em;
        /* background-color: var(--accent); */
        color: #fffe;
        display: flex;
        justify-content: stretch;
        align-items: baseline;
        gap: .5em;
    }

    .indicators details .normal {
        background-color: lime;
    }

    .indicators details .normal~p {
        background-color: #00ff006a;
    }


    .indicators details .mid {
        background-color: gold;
    }

    .indicators details .mid~p {
        background-color: #ffd9007c;
    }

    .indicators details .danger {
        background-color: crimson;
    }

    .indicators details .danger~p {
        background-color: #dc143c7d;

    }

    .indicators details p {
        padding: .5em;
    }
</style>
<section class="indicators">
    <h3>Water Levels</h3>
    <details open>
        <summary class="normal"><i id="level1" class="ri-drop-fill"></i> <span>Water Level 1</span></summary>
        <p>Water Level is normal.</p>
    </details open>
    <details open>
        <summary class="mid"><i id="level2" class="ri-drop-fill"></i> <span>Water Level 2</span></summary>
        <p> Water Level is fluctiating and has a posibility of increasing to level 3</p>
    </details open>
    <details open>
        <summary class="danger"><i id="level3" class="ri-drop-fill"></i> <span>Water Level 3</span></summary>
        <p>Water Level is over the set limit and alarms(LEDs & Buzzer) are initiated</p>
    </details open>
</section>