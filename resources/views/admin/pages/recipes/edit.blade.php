@component('admin.layout.elements.body')
	@slot('title')  <h4 style="margin-left: 30px;"> Editar Receitas </h4> @endslot
	<form action="{{ route('recipe.update', $recipe['id'] ) }}" class="form-horizontal" style="background-color: #fff; border-radius: 4px;" method="post">
		{!! csrf_field() !!}
		<div class="row">
			<div class="col-md-12">
			    <div class="white-box">
			    	<div class="form-group">
					    <label for="title" class="control-label col-sm-2">Titulo</label>
					    <div class="col-sm-8">
					        <input type="text" name="title" required='true' id="title" value="{{ $recipe['title'] ?? '' }} " class="form-control"  >
					    </div>
					</div>

					<div class="form-group">
					    <label for="url" class="control-label col-sm-2">Ingredientes</label>
					    <div class="col-sm-8">
					        <textarea name="ingredients" rows="4" required='true' class="form-control" > {{ $recipe['ingredients'] ?? '' }} </textarea>
					    </div>
					</div>

					<div class="form-group">
					    <label for="body" class="control-label col-sm-2">Método de Preparo</label>
					    <div class="col-sm-8">
					    	<textarea name="method_preparation" rows="5" required='true' class="form-control"> {{ $recipe['ingredients'] ?? '' }} </textarea>
				        </div>
					</div>

					<br/>
					<div class="form-group">
					    <div class="col-sm-offset-4">
					        <input type="submit" value="salvar" class="btn btn-primary">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">voltar</button>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endcomponent