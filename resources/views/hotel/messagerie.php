<div class="row">
    <div class="col-md-4">
        <div class="card bg-dark border-primary p-3">
            <h5>✉️ Nouveau Message</h5>
            <form action="?url=collab_envoyer_message" method="POST">
                <select name="destinataire" class="form-select bg-secondary text-white mb-2">
                    <?php foreach($personnel as $p): ?>
                        <option value="<?= $p['code_employe'] ?>"><?= $p['nom'] ?> <?= $p['prenom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="objet" class="form-control mb-2" placeholder="Objet" required>
                <textarea name="contenu" class="form-control mb-2" rows="4" placeholder="Votre message..."></textarea>
                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card bg-secondary p-3">
            <h5>📜 Historique</h5>
            <div class="list-group">
                <?php foreach($messages as $m): ?>
                <div class="list-group-item bg-dark text-white border-secondary mb-2">
                    <strong><?= $m['exp_nom'] ?></strong> <small class="text-muted"><?= $m['date_envoi'] ?></small>
                    <p class="mb-0"><strong><?= $m['objet'] ?></strong>: <?= $m['contenu'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
