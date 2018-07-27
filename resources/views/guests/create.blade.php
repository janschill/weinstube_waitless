<!-- @if ($errors->has('no_waitid_available'))
    <small class="error">{{ $errors->first('no_waitid_available') }}</small>
@endif -->

<h3 class="title title--medium">Gast hinzufügen</h3>
<form method="POST" action="/guests" class="form">
  {{ csrf_field() }}

  <label class="form__label form__label--left">Wartenummer:</label>
  <div class="form__radio-wrap">
    @foreach ($unoccupiedWaitids as $unoccupiedWaitid)
      <input class="form__radio-input" type="radio" name="guest[waitidId]" id="radio-{{$unoccupiedWaitid->number}}" value="{{$unoccupiedWaitid->id}}">
      <label class="form__radio-label" for="radio-{{$unoccupiedWaitid->number}}">{{$unoccupiedWaitid->number}}</label>
    @endforeach
  </div>

  <label class="form__label form__label--left">Personanzahl:</label>
  <div class="form__radio-wrap">
    @for ($i = 1; $i < 12; $i++)
      <input class="form__radio-input" type="radio" name="guest[groupSize]" id="radio-{{$i}}" value="{{$i}}" {{ $i === 1 ? 'checked' : '' }}>
      <label class="form__radio-label" for="radio-{{$i}}">{{$i}}</label>
    @endfor
  </div>

  <label class="form__label form__label--left">Kommentar:</label>
  <input class="form__text-input" type="text" name="guest[comment]">

  <label class="form__label form__label--left">Vorbestellung:</label>
  <input type="hidden" value="0" name="guest[preordered]">
  <input class="form__checkbox-input" type="checkbox" value="1" name="guest[preordered]">

  <button class="form__submit" type="submit"></button>
</form>

@include ('layouts.errors')
