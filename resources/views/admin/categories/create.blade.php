@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5"> 

	<form action="{{ route('admin.categories.store') }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">
		
		<h4>Nieuwe categorie</h4>

		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
		</div>
        <div class="form-group my-4">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active1" value="1">
				<label class="form-check-label" for="active1">Zichtbaar</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="active" id="active0" value="0">
				<label class="form-check-label" for="active0">Onzichtbaar</label>
			</div>
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
	</form>
</div>

@endsection
