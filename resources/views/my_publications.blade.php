{{-- resources/views/my_publications.blade.php --}}
<x-general.layout>

    {{-- Slot para el CSS específico de esta vista --}}
    <x-slot name="edit_article_style">
        @vite(['resources/css/my_publications_style.css'])
    </x-slot>

    {{-- Contenido principal --}}
    <x-slot name="edit_article_main">
        <h1>MIS PUBLICACIONES</h1>
        @if($status == 200)
            <section class="my-publications-container">

                   @foreach($publications as $publication)

                        @if($publication->estado != 'Vendida' and $publication->visibilidad !== 'Oculta')

                            @if($publication->estado == 'En venta')
                                @php

                                    $publication->estado = 'Disponible'

                                @endphp
                            @endif

                            <x-my-publications.disponibleCard :publication="$publication">
                            </x-my-publications.disponibleCard>

                        @elseif($publication->visibilidad == 'Oculta')

                            <x-my-publications.ocultaCard :publication="$publication">
                            </x-my-publications.ocultaCard>

                        @elseif($publication->estado == 'Vendida')

                            <x-my-publications.vendidaCard :publication="$publication">
                            </x-my-publications.vendidaCard>

                        @endif

                   @endforeach

            </section>
      @else
        <div class="not-found-my-publications"><h2>{{$detail}}</h2></div>
      @endif
    </x-slot>

</x-general.layout>
