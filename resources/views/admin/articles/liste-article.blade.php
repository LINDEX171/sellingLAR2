@extends('layouts.app')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <h5>Liste Article</h5>
                    <div class="ibox-tools">
                        <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#modal-form">Ajouter Article</a>

                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <!-- Formulaire de Recherche -->
                    <form method="GET" action="{{ route('liste') }}" class="form-inline my-2 my-lg-0">
                        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Rechercher un article" aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </form> 
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-lg-2">Id</th>
                                    <th class="col-lg-2">Nom</th>
                                    <th class="col-lg-2">Description</th>
                                    <th class="col-lg-2">Categorie</th>
                                    <th class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($article as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->nom }}</td>
                                    <td>{{ $a->description }}</td>
                                    <td>{{ $a->categorie->nom }}</td>
                                
                                   
                                    <td>
                                        <a href="/update-article/{{ $a->id }}" class="btn btn-info btn-sm ">
                                            <i class="fa fa-pencil"></i> 
                                        </a>
                                        <a href="/delete-article/{{ $a->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        
                        <div style="display: flex; justify-content: flex-end;">
                            {{ $article->links() }}
                        </div>
                        <!-- End Pagination -->
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal popup -->
<div id="modal-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ajouter Article</h4>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'ajout de niveau -->
                <form class="form-horizontal" action="{{ Route('enregistrerArticle') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-10">
                            <input name="nom" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <input name="description" class="form-control" required>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="categorie_id">Categorie </label>
                        <div class="col-lg-10">
                            <select name="categorie_id" class="form-control">
                                <option value="" selected disabled>Sélectionnez categorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary btn-orange" type="submit">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
