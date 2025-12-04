<x-general.layout>

    <x-slot name="general_details_style">
        @vite(['resources/css/general_details_style.css'])
    </x-slot>

    <x-slot name="general_details_main">

        {{-- Mensaje de éxito opcional --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores de validación opcionales --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('publicaciones.update', $publication->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="publish-general-details">
                <div class="form-field">
                    <label for="title">Título</label>
                    <input id="title"
                           name="title"
                           type="text"
                           value="{{ old('title', $publication->titulo) }}"
                           required>
                </div>

                <div class="form-field">
                    <label for="description">Descripción</label>
                    <textarea id="description"
                              name="description">{{ old('description', $publication->descripcion) }}</textarea>
                </div>

                <div class="form-field">
                    <label for="price">Precio</label>
                    <input id="price"
                           name="price"
                           type="number"
                           step="0.01"
                           value="{{ old('price', $publication->precio) }}"
                           required>
                </div>

                {{-- Vista previa de la portada actual (opcional) --}}
                @if($publication->portada)
                    <div class="form-field">
                        <label>Portada actual</label>
                        <div class="current-cover">
                            <img src="{{ asset('storage/'.$publication->portada) }}" alt="Portada actual">
                        </div>
                    </div>
                @endif

                <div class="form-field">
                    <label for="front">Nueva portada (opcional)</label>
                    <input id="front"
                           name="front"
                           type="file"
                           accept=".jpg, .png">
                </div>

                <div class="save-button">
                    <button type="submit" name="save" class="small-button">Guardar</button>
                </div>
            </div>
        </form>
    </x-slot>

</x-general.layout>
