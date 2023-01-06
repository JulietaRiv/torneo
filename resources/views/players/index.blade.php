<html>
<div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="box-title">Players</h1>
        </div>
        <div class="col-sm-6">
            <div>
                <button class="btn btn-success" onclick="window.location.href=`/player`">
                    Add</button>
            </div><br>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
    </div>
</div>

<head>
    <title>Players</title>
</head>
<body>
    <table style="width: 100%; border: 1px solid;">
        <thead>
            <tr style="border: 1px solid;">
                <th style="border: 1px solid;"></th>
                <th style="border: 1px solid;">Name</th>
                <th style="border: 1px solid;">Sex</th>
                <th style="border: 1px solid;">Ability</th>
                <th style="border: 1px solid;">Luck</th>
                <th style="border: 1px solid;">Velocity</th>
                <th style="border: 1px solid;">Streng</th>
                <th style="border: 1px solid;">Reaction Time</th>
                <th></th>
            </tr>
        </thead>
        @foreach($players as $player)
        <tbody>
            <tr>
                <td style="border: 1px solid;">{{$player->id}}</td>
                <td style="border: 1px solid;">{{$player->name}}</td>
                <td style="border: 1px solid;">{{$player->sex}}</td>
                <td style="border: 1px solid;">{{$player->ability}}</td>
                <td style="border: 1px solid;">{{$player->luck}}</td>
                <td style="border: 1px solid;">{{$player->velocity}}</td>
                <td style="border: 1px solid;">{{$player->streng}}</td>
                <td style="border: 1px solid;">{{$player->reaction_time}}</td>
                <td style="border: 1px solid;"> <button class="btn btn-danger" onclick="window.location.href=`{{ route('deletePlayer', $player->id) }}`">
                        Delete</button></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>
