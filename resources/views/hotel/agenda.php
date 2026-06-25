<div class="card p-4 bg-dark text-white">
    <h3>🗓️ Agenda de Présence</h3>
    <table class="table table-bordered text-white mt-3">
        <thead>
            <tr>
                <th>Employé</th>
                <?php for($i=1; $i<=date('t'); $i++): ?>
                    <th class="text-center small"><?= $i ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $employes = $this->db()->query("SELECT code_employe, nom, prenom FROM personnel")->fetchAll();
            foreach($employes as $e): ?>
                <tr>
                    <td><?= $e['nom'] . ' ' . $e['prenom'] ?></td>
                    <?php for($i=1; $i<=date('t'); $i++): ?>
                        <td class="text-center">
                            <span class="badge bg-success">✅</span>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
