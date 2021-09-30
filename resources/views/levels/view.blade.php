@extends("template")
@section("title")
    Уровни
@endsection

<?php
use App\Models\Level
/**
 * @var Level[] $levels
 */
?>
@section("content")
    @foreach($levels as $id => $level)
        <div class="item">
            <div>{{$id}}</div>
            <div>{{$level}}</div>
        </div>
    @endforeach
@endsection
