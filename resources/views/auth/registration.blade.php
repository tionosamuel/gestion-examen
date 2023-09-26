@extends('layout')
@section('content')
    <main class="signup-form">
       <div class="row justify-content-center">
        <div class="col-md-4">
        
            <div class="card bg-secondary shadow-2-strong" style="border-radius: 1rem;">
                <div class="card bg-warning">
                    <h3 class="card-header text-center">Inscription un utilisateur</div>
                <div class="card-body">
                    <form action="{{ route("register.user") }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Nom d'utilisateur" autofocus class="form-control">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                            
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email de l'utilisateur"  class="form-control">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                            
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Mot de passe"   class="form-control">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                            
                        @endif
                    </div>
                    <div class="form-group mb-3">
                       <div class="checkbox">
                        <label> <input type="checkbox" name="remember">se souvenir de moi</label>
                       </div>
                    </div>
                   <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-success btn-block">
                        inscription
                    </button>
                   </div>
                    </form>
                </div>
        </div>
            </div>
        </div>
        </div> 
    </main>
@endsection