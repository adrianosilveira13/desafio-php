<?php

require_once('classes/GetLoginDb.php');
require_once('classes/ConnectDB.php');

?>

<html>
  <head>
    <title>Desafio 1</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: sans-serif;
        background-color: #f2f2f2;
        color: #404040;
      }

      .container {
        background-color: white;
        padding: 30px;
        margin: 10px;
        border-radius: 10px;
      }

      h1 {
        margin-bottom: 10px;
      }

      input {
        width: 400px;
        height: 40px;
        padding: 5px;
        font-size: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        outline: none;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 5px;
        margin-bottom: 5px;
      }

      button {
        display: block;
        width: 100%;
        margin-top: 20px;
        height: 50px;
        border: none;
        padding: 12px 24px;
        cursor: pointer;
        font-size: 20px;
        text-transform: uppercase;
        color: #404040;
      }

      table {
        border: none;
      }

      thead {
        border: none;
        background-color: #f2f2f2;
      }

      td {
        padding: 8px 16px;
      }

      td input {
        width: 100%;
      }

      tbody {
        color: grey;
      }

      .success {
        display: block;
        margin: 10px 0;
        color: green;
      }

      .fail {
        display: block;
        margin: 10px 0;
        color: red;
      }

      .wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
      }

      .deletar {
        color: red;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <h1>Inserir Player</h1>
        <form method="POST" action="inserir.php">
          <div>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required />
          </div>
          <div>
            <label for="playerID">PlayerID</label>
            <input type="text" id="playerID" name="player_id" required />
          </div>
          <div>
            <label for="balance">Balance</label>
            <input type="text" id="balance" name="balance" required />
          </div>
          <div>

            <?php if (isset($_GET['success']) && $_GET['success'] == '1') { ?>
              <span class="success">Player Criado</span>
            <?php } ?>

            <?php if (isset($_GET['error']) && $_GET['error'] == '1') { ?>
              <span class="fail">O player ja existe, ou os dados digitados são inválidos!</span>
            <?php } ?>

            <button type="submit">Criar</button>
          </div>
        </form>
      </div>

      <div class="container">
        <h1>Adicionar Balance</h1>
        <form method="POST" action="addBalance.php">
          <div>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required />
          </div>
          <div>
            <label for="playerID">PlayerID</label>
            <input type="text" id="playerID" name="player_id" required />
          </div>
          <div>
            <label for="balance">Valor para Adicionar</label>
            <input type="text" id="balance" name="balance" required />
          </div>
          <div>

            <?php if (isset($_GET['add']) && $_GET['add'] == '1') { ?>
              <span class="success">Valor Adicionado</span>
            <?php } ?>

            <?php if (isset($_GET['add']) && $_GET['add'] == '0') { ?>
              <span class="fail">Ocorreu algum erro ou dados inválidos!</span>
            <?php } ?>

            <button type="submit">Adicionar</button>
          </div>
        </form>
      </div>

      <div class="container">
        <?php if (isset($_GET['update']) && $_GET['update'] = 1) { ?>
          <span class="success">Balance alterado com sucesso!</span>
        <?php } ?>

        <?php if (isset($_GET['delete']) && $_GET['delete'] = 1) { ?>
          <span class="success">Player deletado com sucesso!</span>
        <?php } ?>

        <?php if (isset($_GET['update']) && $_GET['update'] = 0) { ?>
          <span class="fail">Algo deu errado!</span>
        <?php } ?>

        <?php if (isset($_GET['delete']) && $_GET['delete'] = 0) { ?>
          <span class="fail">Algo deu errado!</span>
        <?php } ?>
        
         <table>
           <thead>
             <tr>
               <td>Login</td>
              <td>PlayerID</td>
              <td>Balance</td>
              <td>Actions</td>
             </tr>
           </thead>
            <tbody>
              <?php
                $conn = ConnectDB::getDB();
                $getLogin = new GetLoginDb($conn);
                $users = $getLogin->get();
                foreach ($users as $key => $user) { ?>
                <tr>
                  <td><?php echo $user['login']; ?></td>
                  <td><?php echo $user['player_id']; ?></td>
                  <td id="balance-<?php echo $user['id']; ?>"><?php echo $user['balance']; ?></td>
                  <td>
                    <a href="/editar/?id=<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>" class="editar">Editar</a>
                    <a href="/deletar.php/?id=<?php echo $user['id']; ?>" class="deletar">Deletar</a>
                </td>
                </tr>
              <?php } ?>
            </tbody>
         </table>
      </div>

      <div class="container">
        <h1>Reduzir Balance</h1>
        
        <form method="POST" action="reduceBalance.php">
          <div>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" required />
          </div>
          <div>
            <label for="balance">Valor para Reduzir</label>
            <input type="text" id="balance" name="balance" required />
          </div>
          <div>

            <?php if (isset($_GET['reduce']) && $_GET['reduce'] == '1') { ?>
              <span class="success">Valor Reduzido com sucesso</span>
            <?php } ?>

            <?php if (isset($_GET['reduce']) && $_GET['reduce'] == '0') { ?>
              <span class="fail">Ocorreu algum erro ou dados inválidos!</span>
            <?php } ?>

            <button type="submit">Reduzir</button>
          </div>
        </form>
      </div>
    </div>
      

      <script src="main.js"></script>
  </body>
</html>