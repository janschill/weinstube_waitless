@extends ('layouts.master_guests')
@section('content')


<table class "list">
        <tr>
                <th>Nummer</th>
                <th>Personen</th>
                <th>Vorbestellung?</th>
                <th>Kommentar</th>
                <th>Wartedauer</th>
                <th>Status</th>
        </tr>
    @foreach ($guests as $guest)
    <tr>
            <th>#{{ $guest->waitid->number }}</th>
            <th>{{ $guest->group_size }}</th>
            <th><input type="checkbox" id="preordered-cb" onclick="myFunction({{$loop->index}})" {{ $guest->preordered ? 'checked' : ''}}></th>>
            <th>{{ $guest->comment }}</th>
            <th>{{ $guest->arrival_time->diffForHumans() }}</th>
            <th>
                    <select class="guest__select" name="inputState">
                            @foreach ($states as $state)
                            <option class="guest__option" value="state[{{ $state->id }}]" {{ $state->state === $guest->state->state ? 'selected=\'selected\'' : '' }}>{{ $state->state }}</option>
                            @endforeach
                        </select>
            </th>
    @endforeach
</table>


<script>
function myFunction(id) {
        <?php use App\Http\Controllers\GuestsController;
(GuestsController::switchPreorder(1));?>
alert(id);
}
</script>



@endsection