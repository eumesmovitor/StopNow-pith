<h2>Entrar</h2>
<?php if(!empty($error)): ?><div style="color:red;"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post" action="/auth/login">
  <label>E-mail<br><input type="email" name="email" required></label><br><br>
  <label>Senha<br><input type="password" name="password" required></label><br><br>
  <button type="submit">Entrar</button>
</form>
<p>Não tem conta? <a href="/auth/register">Cadastre-se</a></p>
