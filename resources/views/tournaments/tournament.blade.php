<!DOCTYPE html>
<html>
<body>
    <div>
        <div style="text-align:center;padding:15px;">
            <h1> Tenis Tournament</h1>
            <p>Select a tournament and make them play</p>
            <form>
                <select onchange="location.href='/tournament/'+this.value">
                    @foreach ($tournaments as $tournament)
                    <option @if ($tournamentId==$tournament->id) selected @endif value={{$tournament->id}}>
                        Tournament: {{$tournament->id}} (sex: {{$tournament->sex}})</option>
                    @endforeach
                </select>
                <br><br>
                <button type="button" onclick="location.href='/playTournament/{{$tournamentId}}'">Make them play</button>
            </form>
        </div>
        <div style="margin:45px;"><button type="button" onclick="location.href='/players'">Manage Players</button>
        </div>
        <div>
            <div>
                <div class="header">
                    <h2 style="text-align:center;">Tournament N° {{$tournament->id}}</h2>
                </div>
                <div class="bracket-container">
                    @foreach($levels as $g => $level)
                    <div class="bracket-level">
                        @foreach ($level as $game)
                        @php
                        $winner1 = $winner2 = '';
                        if(null != $game['score_player_1']){
                        $winner1 = $game['score_player_1'] > $game['score_player_2']? 'winner': '';
                        $winner2 = $game['score_player_2'] > $game['score_player_1']? 'winner': '';
                        }
                        @endphp
                        <div class="bracket-matchup">
                            <div class="bracket-team {{$winner1}}">
                                <div class="bracket-name">Round: {{$game['round']}}</div>
                                <div class="bracket-name">Player 1°: @isset($game['player_1_id']) {{$game->player1->name}} @endif</div>
                                <div class="bracket-score">@isset($game['score_player_1']) {{$game->score_player_1}} @endif</div>
                            </div>
                            <div class="bracket-team {{$winner2}}">
                                <div class="bracket-name">Round: {{$game['round']}}</div>
                                <div class="bracket-name">Player 2°: @isset($game['player_2_id']) {{$game->player2->name}} @endif</div>
                                <div class="bracket-score">@isset($game['score_player_2']) {{$game->score_player_2}} @endif</div>
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

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700);
    @import url(https://fonts.googleapis.com/css?family=Dosis);

    html,
    body {
        width: 100%;
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
        width: 80%;
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
