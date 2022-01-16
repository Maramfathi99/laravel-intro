@extends("layouts.mylayout")
@section("title","Using With")
@section("content")
<b>Users Count: {{ $usersCount }}</b>
<br>
<b>Users Count: <?php echo $usersCount ?></b>
<hr>
<b>Colors</b>
<ul>
    @foreach($colors as $color)
        <li>{{ $color }}</li>
    @endforeach
</ul>
<ul>
    <?php foreach($colors as $color) { ?>
        <li><?php echo $color ?></li>
    <?php } ?>
</ul>
@endsection