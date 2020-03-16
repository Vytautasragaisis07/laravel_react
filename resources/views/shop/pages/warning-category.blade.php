@extends('shop.main')
@section('content')

    <div class="warningCateg py-3 m-2">
        <p>Ar tikrai norite pašalinti šią kategorija?</p>
        <div class="warningCateg">
            <a class="btn btn-primary" href="/delete_category/ {{$category->id}}" role="button">trinti</a>
        </div>
    </div>
@stop

