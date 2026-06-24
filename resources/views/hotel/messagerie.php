<div class="card p-4">

<h2>💬 Messagerie ERP</h2>

<form method="POST" action="?url=send_message">

    <div class="mb-3">
        <label class="form-label">Destinataire</label>
        <input
            type="text"
            name="receiver_id"
            class="form-control"
            placeholder="ID destinataire">
    </div>

    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea
            name="message"
            rows="5"
            class="form-control"
            placeholder="Votre message..."></textarea>
    </div>

    <button class="btn btn-primary">
        Envoyer
    </button>

</form>

<hr>

<h4>Historique</h4>

<div class="alert alert-info">
Module Messagerie ERP prêt.
</div>

</div>
