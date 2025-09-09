<h2>Cadastrar</h2>
<?php if(!empty($msg)): ?><div style="color:green;"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<?php if(!empty($error)): ?><div style="color:red;"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post" action="/auth/register">
  <label>Nome<br><input name="name" required></label><br><br>
  <label>E-mail<br><input type="email" name="email" required></label><br><br>
  <label>Senha<br><input type="password" name="password" required></label><br><br>
  <button type="submit">Cadastrar</button>
</form>
<p>Já tem conta? <a href="/auth/login">Entrar</a></p>
