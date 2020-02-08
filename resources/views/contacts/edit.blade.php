@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Modification du contact <b><!-- TODO Afficher le nom du contact -->{{$contact->name}}</b></h3>
                <form action="{{route('contacts.update', $contact)}}" method="post">
                    <!-- TODO mise en place de la form pour modifier un contact -->
                    @csrf
                    @method('PATCH')
                    
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
