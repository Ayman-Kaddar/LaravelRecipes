<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body style="background-color: #ffff00 !important;">
    @if (Route::has('login'))
    <nav class="row navbar navbar-light text-end" style="background-color: #f39200">
        @auth
        <div class="text-right">
            <h1 class="display-1 text-center" >Lista de Recetas</h1><br>
        </div>
    @else
        <div class="text-right">
            <h1 class="display-1 text-center" >Lista de Recetas</h1><br>
            <button class="btn btn-light"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
        @if (Route::has('register'))
            <button class="btn btn-light"><a href="{{ route('register') }}" class="text-decoration-none">Register</a></button>
        @endif
        </div>
        @endauth
    </nav>
    @endif

    
    <div class="text-center">
    <h4> {{ $recipe->title }}</h4>
    <p><h4>Descripción:</h4> <br> {{ $recipe->description }}</p>
    <h6>Imagen: </h6>
    <img src="http://localhost:8000/storage/{{$recipe->image}}" class="w-25" alt="..."><br>
    <p><h4>El Tiempo de preparación és: </h4>{{ $recipe->prepTime }}</p>
    <h3>Los pasos són: </h3>
    @foreach ($recipe->steps as $step )
    <p> {{ $step->text }}</p>
    @endforeach
    <h3>Los ingredientes utilizados són: </h3>
    @foreach ($recipe->ingredients as $ingredients )
    <p> {{ $ingredients->text }}</p>
    @endforeach
    <p><h4>El usuario es: </h4>{{ $recipe->user->name }}</p>
    @if(Auth::check())
            <form action = "{{route('comment.store')}}" method="POST">
                @csrf
                <h2>Puedes comentar tu dudas</h2>
                <div><textarea class=" w-50 form-control" name="text" id="text" cols="30" rows="10" style="margin: 0 auto"></textarea></div>
                <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" id="recipe_id" name="recipe_id" value="{{$recipe->id}}">
            <button  class="btn btn-warning me-3"type="submit">Envia</button>
            </form>
            @endif

    <h2>Comentarios:</h2>
    @foreach ($recipe->comments as $comment)
        <p><h3>Creador:</h3> {{$comment->user->name}} </p>
        <p><h3>Comentario:</h3>{{$comment->text}}</p>
    @endforeach

    <div class="text-center">
    <button type="button" button type="button" class="btn btn-warning" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('recipe.index')}}'">Listar categorias</button>
    </div>

</body>
