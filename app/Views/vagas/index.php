<h2>Vagas disponíveis</h2>
<p><a href="/vagas/create">Anunciar uma vaga</a></p>
<?php if(!empty($error)): ?><div style="color:red;"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap:16px;">
<?php foreach($vagas as $v): ?>
  <div style="border:1px solid #ddd; padding:12px; border-radius:12px;">
    <h3><?= htmlspecialchars($v['titulo']) ?></h3>
    <div><strong>Endereço:</strong> <?= htmlspecialchars($v['endereco']) ?></div>
    <div><strong>Preço/hora:</strong> R$ <?= number_format($v['preco_hora'],2,',','.') ?></div>
    <div><small>Anunciante: <?= htmlspecialchars($v['owner_name']) ?></small></div>
    <?php if(!empty($user)): ?>
    <form method="post" action="/vagas/reservar" style="margin-top:8px;">
      <input type="hidden" name="vaga_id" value="<?= (int)$v['id'] ?>">
      <label>Início <input type="datetime-local" name="inicio" required></label>
      <label>Fim <input type="datetime-local" name="fim" required></label>
      <button type="submit">Reservar</button>
    </form>
    <?php else: ?>
    <p><a href="/auth/login">Entre</a> para reservar.</p>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
</div>
