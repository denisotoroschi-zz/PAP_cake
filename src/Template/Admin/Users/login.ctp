<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Administrador</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <?=$this->Html->css('backend/login.css')?>
</head>

<body>
  <div class="login">
  <h1>Login Admin</h1>
  <?=$this->Form->create()?> 
  <?=$this->Form->input('n_processo',['type'=>'text','label'=>'','placeholder'=>'Nº Processo','style'=>'background: rgba(0,0,0,0.3)']);?>
  <?=$this->Form->input('pin',['type'=>'password','label'=>'','placeholder'=>'PIN','style'=>'background: rgba(0,0,0,0.3)']);?>
  <?= $this->Form->button('Entrar',['type'=> 'submit','class'=>'btn btn-primary btn-block btn-large']); ?>
  <?= $this->Form->end() ?>
   <!-- <form method="post">
      <input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>-->
</div>

</body>
</html>
