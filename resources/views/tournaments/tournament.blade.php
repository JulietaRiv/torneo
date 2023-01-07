<!DOCTYPE html>
<html>
<body>

    <div class="w3-container">
        <h2> Tournament</h2>
        <p>Select a tournament and make them play</p>

        <form>
            <select>
                @foreach ($tournaments as $tournament)
                <option>Tournament: {{$tournament->id}} (sex: {{$tournament->sex}})</option>
                @endforeach
            </select>
        </form>

        <div class="w3-card-4" style="width:50%;">
            <header>
                <h1>Tournament Name</h1>
                <h5>Buttom to make them play</h5>
            </header>

            <div>
                <div class="header">
                    <h1>FCS Tournament Bracket</h1>
                </div>
                <div class="bracket-container">
                    @foreach($levels as $g => $level)
                    <div class="bracket-level">
                        @foreach ($level as $game)

                        <div class="bracket-matchup">
                            <div class="bracket-team winner">
                                <div class="bracket-name">{{$game['player_1_id']}}</div>
                                <div class="bracket-score"></div>
                            </div>
                            <div class="bracket-team loser">
                                <div class="bracket-name">{{$game['player_2_id']}}</div>
                                <div class="bracket-score"></div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</body>
</html>


<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700);
    @import url(https://fonts.googleapis.com/css?family=Dosis);

    html,
    body {
        with: 100%;
        height: 100%;
        margin: 0;
        background-color: #E8E8E8;
    }

    .header {
        height: 10%;
    }

    .header>h1 {
        margin: auto;
        text-align: center;
        font-family: 'Dosis', sans-serif;
        color: #205060
    }

    .bracket-container {
        display: flex;
        flex-direction: row;
        height: 90%;
        width: 100%;
    }

    .bracket-level {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 100%;
        width: 100%;
        flex-grow: 1;
        transition: all ease .5s;
    }

    .bracket-level:hover {
        width: 200%;
    }

    .bracket-matchup {
        width: 90%;
        margin: auto;
        max-height: 50px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bracket-team {
        height: 45%;
        width: 100%;
        background-color: #F5F5F5;
        box-shadow: rgba(0, 0, 0, 0.3) 0 1px 3px;
        display: flex;
        flex-direction: row;
        transition: all ease .5s;
    }

    .bracket-name {
        font-family: 'Open Sans', sans-serif;
        width: 75%;
        font-size: .75em;
        padding: .2em;
        line-height: 1.5em;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #2B2B2B;
        text-align: center;
    }

    .bracket-score {
        font-family: 'Open Sans', sans-serif;
        font-size: .75em;
        padding: .2em;
        line-height: 1.5em;
        white-space: nowrap;
        overflow: hidden;
        color: #2B2B2B;
        text-align: center;
    }

    .winner>.bracket-name,
    .winner>.bracket-score {
        font-weight: bold;
        color: #D07030;
    }

    .bracket-team:hover {
        background-color: #E8E8E8;
        height: 100%;
        transition: all ease .5s;
    }

    .bracket-team:hover>.bracket-name {
        overflow: none;
        text-overflow: clip;
        white-space: normal;
        line-height: 1em;
        align-self: center;
        width: 100%;
    }

    .bracket-team:hover>.bracket-score {
        display: none;
    }

</style>
