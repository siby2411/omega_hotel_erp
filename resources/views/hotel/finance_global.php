<div class="card p-4 bg-dark text-white">
    <h3>💰 État Financier Global</h3>
    <div class="alert alert-info">
        <h4>Revenu Total : <?= number_format($total ?? 0, 0, ',', ' ') ?> FCFA</h4>
    </div>
    <p>Cette vue affiche la synthèse consolidée de toutes les transactions de l'établissement.</p>
    <a href="?url=dashboard" class="btn btn-secondary">Retour au Dashboard</a>
</div>
