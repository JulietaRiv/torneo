<div class="row">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('storePlayer') }}" name="playersForm" role="form">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="sex" class="form-control">
                            <option value="">Select</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ability</label>
                        <input name="ability" type="integer" class="form-control" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label>Luck</label>
                        <input name="luck" type="integer" class="form-control" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label>Velocity</label>
                        <input name="velocity" type="integer" class="form-control" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label>Streng</label>
                        <input name="streng" type="integer" class="form-control" min="0" max="100">
                    </div>
                    <div class="form-group">
                        <label>Reaction Time</label>
                        <input name="reaction_time" type="integer" class="form-control" min="0" max="100">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
