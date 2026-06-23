<?php

/* ===================== PERSONNEL ===================== */
public function personnel()
{
    $pdo = $this->db();
    $data = $pdo->query("SELECT * FROM personnel ORDER BY id DESC")->fetchAll();
    return $this->view('personnel/liste', ['personnel'=>$data]);
}

/* ===================== PAIE ===================== */
public function paie()
{
    $pdo = $this->db();
    $data = $pdo->query("SELECT * FROM paie ORDER BY id DESC")->fetchAll();
    return $this->view('paie/liste', ['paie'=>$data]);
}

/* ===================== MESSAGERIE ===================== */
public function messagerie()
{
    $pdo = $this->db();
    $data = $pdo->query("SELECT * FROM messages ORDER BY id DESC")->fetchAll();
    return $this->view('messagerie/liste', ['messages'=>$data]);
}

/* ===================== FACTURES ===================== */
public function factures()
{
    $pdo = $this->db();
    $data = $pdo->query("SELECT * FROM factures ORDER BY id DESC")->fetchAll();
    return $this->view('factures/liste', ['factures'=>$data]);
}

/* ===================== PAIEMENTS ===================== */
public function paiements()
{
    $pdo = $this->db();
    $data = $pdo->query("SELECT * FROM paiements ORDER BY id DESC")->fetchAll();
    return $this->view('paiements/liste', ['paiements'=>$data]);
}

/* ===================== CREATE PAIEMENT ===================== */
public function createPaiement()
{
    $pdo = $this->db();
    $clients = $pdo->query("SELECT id, nom, prenom FROM clients")->fetchAll();
    return $this->view('paiements/create', ['clients'=>$clients]);
}
