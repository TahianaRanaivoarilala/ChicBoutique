@extends('base')
@section('content')
    <div class="container">
        <h1> Creer un article</h1>
       <div class="row">
            <form action="" class="form-control" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Sac à main en cuir... ">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" >contenue de demonstration</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                   <button class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
       </div>
    </div>
@endsection
