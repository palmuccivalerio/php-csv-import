<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Importa Dati da CSV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .instructions {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .instructions h4 {
            margin-bottom: 15px;
        }

        .instructions pre {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 3px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Importa Dati da CSV</h2>

        <!DOCTYPE html>
        <html lang="it">

        <head>
            <meta charset="UTF-8">
            <title>Importa CSV</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <style>
                .instructions {
                    background: #f8f9fa;
                    border: 1px solid #dee2e6;
                    border-radius: 5px;
                    padding: 15px;
                    margin-bottom: 20px;
                }

                .instructions pre {
                    background: #e9ecef;
                    padding: 10px;
                    border-radius: 3px;
                    overflow-x: auto;
                }
            </style>
        </head>

        <body>
            <div class="container mt-5">

                <!-- Istruzioni CSV -->
                <div class="instructions">
                    <h4>Istruzioni CSV</h4>
                    <p><strong>Categorie (categorie.csv):</strong></p>
                    <pre>id,nome</pre>
                    <p>Esempio:</p>
                    <pre>
1,Elettronica
2,Abbigliamento
        </pre>
                    <p><strong>Prodotti (prodotti.csv):</strong></p>
                    <pre>id,nome,prezzo,categoria_id</pre>
                    <p>Esempio:</p>
                    <pre>
1,Prodotto 1,100.00,1
2,Prodotto 2,200.00,2
        </pre>
                    <p>Usa virgole come separatore e verifica che gli ID categoria siano validi.</p>
                </div>
                <!-- Fine Istr-->


                <!-- Link per visualizzare i prodotti importati -->


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
                    <a href="{{ route('products.index') }}" class="btn btn-success ">Visualizza Prodotti Importati</a>
                </form>
            </div>
        </body>

        </html>