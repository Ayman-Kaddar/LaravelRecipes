<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body style="background-color: #ffff00 !important;">
     @if (Route::has('login'))
     <nav class="row navbar navbar-light text-end" style="background-color: #f39200">
        @auth
        <div class="text-right">
            <h1 class="display-1 text-center" >{{ $category->name }}</h1><br>
        </div>
    @else
        <div class="text-right">
            <h1 class="display-1 text-center" >{{ $category->name }}</h1><br>
            <button class="btn btn-light"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
        @if (Route::has('register'))
            <button class="btn btn-light"><a href="{{ route('register') }}" class="text-decoration-none">Register</a></button>
        @endif
        </div>
        @endauth
    </nav>
    @endif

    @foreach ($category->recipes as $recipe)
    <div class="text-center">
    <div class="card bg-ligth" style="display: inline-block; width: 50rem; margin: 1vw;">
    <h5> {{ $recipe->title }}</h5>
    <p> {{ $recipe->description }}</p>
    <img src="http://localhost:8000/storage/{{$recipe->image}}" class="w-25" alt="..."><br>
    <a class="btn btn-warning mt-2 mb-2" href="{{ route('recipe.show', ['recipe'=>$recipe]) }}">Ir a la receta</a>
    </div>
    </div>

    @endforeach
    <div class="text-center">
    <button type="button" button type="button" class="btn btn-warning" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('category.index')}}'">Listar categorias</button>
    </div>
</body>
