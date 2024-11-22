<div id="container-topbar">
    <div id="text-top">
        <center>
            <large><b>ARTECH MANAGEMENT SYSTEM</b></large>
        </center>
    </div>
</div>

<style>
    /* Container styles for the top bar */
    #container-topbar {
        width: 100%;
        position: fixed;
        background-color: #000; /* Solid black background */
        color: #fff; /* White text */
        padding: 15px 20px;
        border-bottom: 2px solid #333; /* Subtle contrast border */
        top: 0;
        z-index: 1000;
    }

    /* Text styling */
    #text-top {
        font-family: 'Roboto', sans-serif; /* Clean, modern sans-serif font */
        font-size: 20px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
    }

    /* Center alignment with subtle hover animation */
    large {
        display: inline-block;
        padding: 5px 10px;
        transition: color 0.3s ease, border-bottom 0.3s ease;
    }

    large:hover {
        color: #ccc; /* Light gray hover effect */
        border-bottom: 1px solid #fff; /* Minimal underline on hover */
    }
</style>
