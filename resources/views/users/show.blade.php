<h2>sTANDARDS Name: </h2>
<p>{{ $standardtype->id }} </p>

<h3>sTANDARDS Belongs to</h3>

<ul>
    @foreach($standardtype->nutriments as $nutriment)
    <li>{{ $nutriment->name }}</li>
    @endforeach
</ul>