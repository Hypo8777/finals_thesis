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
        color: var(--accent);
    }

    .indicators details summary {
        cursor: pointer;
        padding: .5em;
        /* background-color: var(--accent); */
        color: var(--textCol);
        text-shadow: 1px 1px 2px var(--shadow);
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
    <h3>Indicator Description</h3>
    <details open>
        <summary class="normal">Water Level 1</summary>
        <p>Water Level is normal.</p>
    </details open>
    <details open>
        <summary class="mid">Water Level 2</summary>
        <p> Water Level is fluctiating and has a posibility of increasing to level 3</p>
    </details open>
    <details open>
        <summary class="danger">Water Level 3</summary>
        <p>Water Level is over the set limit and alarms(LEDs & Buzzer) are initiated</p>
    </details open>
</section>