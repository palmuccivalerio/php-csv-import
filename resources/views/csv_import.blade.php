<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Importa Dati da CSV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Importa Dati da CSV</h2>
    
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
    
    <form action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categories_file">File CSV Categorie</label>
            <input type="file" name="categories_file" id="categories_file" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="products_file">File CSV Prodotti</label>
            <input type="file" name="products_file" id="products_file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Importa Dati</button>
    </form>
</div>
</body>
</html>
