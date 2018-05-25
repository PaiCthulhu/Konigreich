<section class="statblock">
    <header>{{$char->name}}@if(isset($char->surname)) {{$char->surname}}@endif <span class="float-right">CR 0</span></header>
    <p class="info">
        <b>XP 0</b><br/>
        @if(isset($char->race))
            @if(isset($char->gender)){{$char->getGenderName()}}@endif @if(isset($char->age)) ({{$char->age}})@endif {{$char->race}} <br/>
        @endif
    </p>
    <div class="divider">Defense</div>
    <p class="defenses">

    </p>
    <div class="divider">Offense</div>
    <p class="offenses">

    </p>
    <div class="divider">Statistics</div>
    <p class="statistics">
        @if(isset($char->attributes))
            <b>Str</b> {{$char->attributes['str']->val()}},
            <b>Dex</b> {{$char->attributes['dex']->val()}},
            <b>Con</b> {{$char->attributes['con']->val()}},
            <b>Int</b> {{$char->attributes['int']->val()}},
            <b>Wis</b> {{$char->attributes['wis']->val()}},
            <b>Cha</b> {{$char->attributes['cha']->val()}} <br/>
        @endif
    </p>
    <div class="divider">Special Abilities</div>
    <p class="spabilities">

    </p>
    @if(isset($char->ecology))
    <div class="divider">Ecology</div>
    <p class="eoclogy">

    </p>
    @endif
    <p class="description">

    </p>
</section>
<link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{PATH}}/public/css/style.min.css" type="text/css" />