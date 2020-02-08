@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Créer un contact</h3>
                <form action="{{route('contacts.store')}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                                   <label for="name">Votre nom:</label>
                                <input  type="text" name="name"  value="{{  old('name', "") }}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="Entrez votre nom">

                                  @error('name')
                                <p>Nom erronné</p>
                                @enderror
                        </div>
                    
                        <div class="form-group">
                                   <label for="tel">Votre numero de telephone:</label>
                                <input  type="text" name="tel"  value="{{  old('tel', "") }}"
                                       class="form-control @error('tel') is-invalid @enderror" id="tel"
                                       placeholder="0x xx xx xx xx">

                                  @error('tel')
                                <p>Mauvais numero de telephone</p>
                                @enderror
                        </div>
                    
                        <div class="form-group">
                                   <label for="email">Votre email:</label>
                                <input  type="text" name="email"  value="{{  old('email', "") }}"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="entrez votre email">

                                  @error('email')
                                <p>Email invalide</p>
                                @enderror                                
                        </div>
                    <button type="submit">Soumettre</button>    
                </form>
            </div>
        </div>
    </div>
@endsection
