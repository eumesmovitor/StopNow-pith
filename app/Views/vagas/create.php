<h2>Anunciar vaga</h2>
<?php if(!empty($msg)): ?><div style="color:green;"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<?php if(!empty($error)): ?><div style="color:red;"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post" action="/vagas/store">
  <label>Título<br><input name="titulo" required></label><br><br>
  <label>Endereço<br><input name="endereco" required></label><br><br>
  <label>Preço/hora (R$)<br><input name="preco_hora" type="number" step="0.01" min="0" required></label><br><br>
  <label>Descrição (opcional)<br><textarea name="descricao" rows="4"></textarea></label><br><br>
  <button type="submit">Salvar</button>
</form>
