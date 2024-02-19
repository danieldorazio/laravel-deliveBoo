@extends('layouts.admin')

<div class="container">
    <div class="d-flex align-items-center gap-5 mt-5">
        <h1>Nuovo Piatto:</h1>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-6">

        <form action="{{ route('admin.meals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Nome Piatto --}}
            <div class="form-floating mb-3">
                <input placeholder="name@example.com" type="text" class="form-control @error('name') is-invalid  @enderror"  id="name" name="name" value="{{ old('name') }}">
                <label for="name">Nome</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Descrizione Piatto --}}
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Descrizione piatto" id="description" style="height: 100px" name="description">{{ old('description') }}</textarea>
                <label for="description">Descrizione</label>
            </div>

            {{-- Immagine Piatto --}}
            <div class="mb-3">  
                <label for="image" class="form-label @error('image') is-invalid  @enderror">Inserisci un'immagine</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Prezzo Piatto --}}
            <div>
                <input placeholder="name@example.com" type="text" class="form-control @error('price') is-invalid  @enderror"  id="price" name="price" value="{{ old('price') }}">
                <label for="price">Nome</label>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Piatto Disponibile --}}
            <div>
                <input class="form-check-input" type="checkbox" value="{{ old('available')}}" id="available" name="available">
                <label class="form-check-label" for="available">
                    Piatto Disponibile
                </label>
            </div>

            <button type="submit" class="btn btn-success">Salva</button>  
        </form>
        </div>            
    </div>
</div>    
@endsection
