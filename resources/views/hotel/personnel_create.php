<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Nouveau Personnel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

.card{
    background:rgba(255,255,255,.08);
    border:none;
    border-radius:20px;
}

.form-control{
    background:#1e293b;
    color:white;
    border:1px solid #475569;
}

.form-control:focus{
    background:#1e293b;
    color:white;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="card p-4">

<h2>👨‍💼 Nouveau Personnel</h2>

<form method="post">

<div class="mb-3">
<label>Nom complet</label>
<input type="text" class="form-control">
</div>

<div class="mb-3">
<label>Fonction</label>
<input type="text" class="form-control">
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" class="form-control">
</div>

<div class="mb-3">
<label>Salaire</label>
<input type="number" class="form-control">
</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="?url=personnel"
class="btn btn-secondary">
Retour
</a>

</form>

</div>

</div>

</body>
</html>
