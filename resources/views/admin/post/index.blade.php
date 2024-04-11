@extends('base')
@section('content')
    <div class="container">
            <table class=" table table-striped">
                <thead>
                    <th>titre</th>
                    <th>description</th>
                    <th>prix</th>
                    <th class="text-end">Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->price}} Ar</td>
                        <td class="text-end">
                            <button class="btn btn-warning">Editer</button>
                            <button class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@endsection
