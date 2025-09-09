<?php
$cfg = require __DIR__ . '/../../../config/config.php';
$user = $_SESSION['user'] ?? null;
?><!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($cfg['app']['name']) ?></title>
  <link rel="stylesheet" href="/assets/css/PaginaPrincipal.css">
</head>
<body>
<header style="padding:12px; display:flex; gap:12px; align-items:center; border-bottom:1px solid #eee;">
  <a href="/" style="font-weight:bold; text-decoration:none;"><?= htmlspecialchars($cfg['app']['name']) ?></a>
  <nav style="display:flex; gap:12px; margin-left:auto;">
    <a href="/vagas">Vagas</a>
    <a href="/vagas/create">Anunciar</a>
    <?php if($user): ?>
      <span>Olá, <?= htmlspecialchars($user['name']) ?></span>
      <a href="/auth/logout">Sair</a>
    <?php else: ?>
      <a href="/auth/login">Entrar</a>
      <a href="/auth/register">Cadastrar</a>
    <?php endif; ?>
  </nav>
</header>
<main style="max-width:1000px; margin: 20px auto; padding: 0 12px;">
