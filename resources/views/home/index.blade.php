
<h1>
    Hoşgeldiniz <br>
</h1>

@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif