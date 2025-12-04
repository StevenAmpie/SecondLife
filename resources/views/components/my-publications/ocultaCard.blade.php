<article class="publication-card">
    <div class="publication-image-wrapper">
        <img
            src="{{ asset($publication->portada)}}"
            alt={{$publication->titulo}}
            class="publication-image">
    </div>

    <div class="publication-info">
        <p class="publication-title">{{$publication->titulo}}</p>
        <p class="publication-price">${{$publication->precio}}</p>
        <p class="publication-date">{{$publication->fecha}}</p>
        <p class="publication-status oculta">{{$publication->visibilidad}}</p>
    </div>

    <div class="publication-actions">
        <form action="{{route('update-state', $publication->id)}}" method="POST">
            @method('PUT')
            @csrf
            <button type="submit" class="small-button" name="Visibilidad" value="Visible">
                Mostrar publicación
            </button>
        </form>
        <form action="{{route('publicaciones.show')}}" method="GET">
            <button type="submit" class="small-button" name="id" value="{{$publication->id}}">
                Editar publicación
            </button>
        </form>
        <form action="{{route('publicaciones.destroy', $publication->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-delete" name="eliminar" value="Eliminar">
                Eliminar publicación
            </button>
        </form>
    </div>
</article>
