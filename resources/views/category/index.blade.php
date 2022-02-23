<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body style="background-color: #ffff00 !important;">
    @if (Route::has('login'))
    <nav class="row navbar navbar-light text-end" style="background-color: #f39200">
        @auth
        <div class="text-right">
            <h1 class="text-center"><strong>Listado de categorias</strong></h1><br>
        </div>
    @else
        <div class="text-right">
            <h1 class="display-1 text-center">Listado de categorias</h1><br>
            <button class="btn btn-light"><a href="{{ route('login') }}" class="text-decoration-none">Log in</a></button>
        @if (Route::has('register'))
            <button class="btn btn-light"><a href="{{ route('register') }}" class="text-decoration-none">Register</a></button>
        @endif
        </div>
        @endauth
    </nav>
    @endif
    <div>  
            <div class="text-center">
                @foreach ($categories as $category)
                <div style="display: inline-block; width: 60rem; margin: 1vw;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $category->name }}</h2>
                    </div>
                    <img src="http://localhost:8000/storage/pizza.jpg" class="card-img-top" alt="...">
                    <div>
                        <a href="{{route('category.show', ['category'=>$category])}}" class="btn btn-warning mt-3 mb-3">Mira las recetas</a>
                    </div>
                </div>
                @endforeach
                </div>
            <br>
            @if (Route::has('login'))
            @auth
            <div class="text-center">
            <button type="button" button type="button" class="btn btn-warning" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('recipe.create')}}'">Crear receta</button>
            <button type="button" button type="button" class="btn btn-warning" style="margin-bottom: 1vw;" onclick="window.location.href='{{route('recipe.index')}}'">Mirar Recetas</button>

            </div>
            @endauth
            @endif
    </div>
</body>
