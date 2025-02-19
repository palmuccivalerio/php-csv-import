<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prodotti Importati</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Lista Prodotti</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
              <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->category->name ?? 'N/A' }}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Bottone per aprire la modale di esportazione CSV -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exportModal">
    Crea CSV Personalizzato
</button>

<!-- Modale per Esportazione CSV -->
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('products.export') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exportModalLabel">Esporta CSV Personalizzato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Seleziona i campi da includere:</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="fields[]" value="id" id="fieldId" checked>
            <label class="form-check-label" for="fieldId">ID</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="fields[]" value="name" id="fieldName" checked>
            <label class="form-check-label" for="fieldName">Nome</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="fields[]" value="price" id="fieldPrice" checked>
            <label class="form-check-label" for="fieldPrice">Prezzo</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="fields[]" value="category" id="fieldCategory" checked>
            <label class="form-check-label" for="fieldCategory">Categoria</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
          <button type="submit" class="btn btn-primary">Esporta CSV</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
<!-- Includi jQuery, Popper.js e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</html>
