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
        <p class="publication-status vendida">{{$publication->estado}}</p>
    </div>
</article>

