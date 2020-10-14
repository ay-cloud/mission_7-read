<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>タイトル</title>
  </head>
  <body>
        <?php  
         // DB接続設定
        $dsn = 'mysql:dbname=**********;host=localhost';
        $user = '*********';
        $password = '**********';
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        ?>      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
    <!--メニューバー-->
    <header class="top">
        <div class="container">
            <h1 class="header-title">
                <a href="#">1016's kitchen</a>
            </h1>
            <label for="menu" class="menu-button">
                <i class="fas fa-bars"></i> Menu
            </label>
        </div>
    </header>
    
    <!-- ナビゲーションバー -->
    <nav class="nav-bar">
      <label for="menu" class="close">
        <i class="fas fa-times-circle"></i>閉じる
      </label>
      <ul class="login">
        <li>
          <a href="#">
              <?php
               //ログインしていない場合　→表示
               if(!isset($_SESSION['name'])){
                  echo "ユーザー登録"
               ;}
               //ログインしている場合　→表示しない
               else{echo ""
               ;}
              ?>
         </a>
        </li>
        <li>
          <a href="#">
              <?php
               //ログインしていない場合　→表示
               if(!isset($_SESSION['name'])){
                  echo "ログイン"
               ;}
               //ログインしている場合　→表示しない
               else{echo ""
               ;}
              ?>
         </a>
        </li>
        <li>
          <a href="#">
              <?php
               //ログインしている場合　→表示
               if(isset($_SESSION['name'])){
                  echo "レシピ投稿"
               ;}
               //ログインしていない場合　→表示しない
               else{
               };
              ?>
          </a>
        <li>
          <a href="#">管理者専用</a>
        </li>
      </ul>
    </nav>
    <!--カテゴリー一覧-->
    <section class="category">
        <div class="container">
            <p class="category-title">カテゴリー一覧</p>
            <ul class="category-all">
                <!--PHPにて表示-->
                <!--<li>カテゴリー</li>-->
                    <li><a href="#">イタリアン</a></li>
                    <li><a href="#">日本食</a></li>
                    <li><a href="#">フランス料理</a></li>
                    <li><a href="#">インド料理</a></li>
                    <li><a href="#">トルコ料理</a></li>
                    <li><a href="#">中華料理</a></li>
                    <li><a href="#">韓国料理</a></li>
                    <li><a href="#">その他</a></li>
            </ul>
        </div>
    </section>
    
    <div class="main">
        <section class="serch">
            <!--検索フォーム-->
            <form action="" class="serch">
                <input type="text" name="serch" class="serch-text">
                <input type="submit" class="serch-btn">
            </form>
            <!--検索結果表示-->
                <div class="serch-result">
                    <p class="serch-title">検索結果</p>
                    <a href="#" class="serch-food">料理名</a>
                    <p class="serch-writer">投稿者</p>
                    <img class="serch-img" src="#" alt="#" title="#"/>
                </div>
            <form>
                <!--PHPにて表示-->
            </form>
        </section>
        <section class="read">
            <div class="container">
                <div class="read-top">
                    <p class="food">料理名
                        <?php	
                              $sql ="SELECT * FROM recipe";
                              $stmt = $pdo->query($sql);
                        	  $results = $stmt->fetchAll();
                        	  foreach ($results as $row){
                        		echo $row['food'];
                        	  }
                        ?>
                    </p>
                    <img src="#" alt="{$row['food']}の画像" title="#"/>
                </div>
                <div class="read-main">
                    <p>本文
                        <?php 
                              $sql ="SELECT * FROM recipe WHERE food ={$row['food']}";
                              $stmt = $pdo->query($sql);
                        	  $results = $stmt->fetchAll();
                        	  foreach ($results as $row){
                        		echo $row['recipe'].',';
                              }
                        ?>
                    </p>
                </div>
                <div class="read-footer">
                    <p>作成者
                       <?php 
                              $sql = "SELECT * FROM recipe WHERE food ={$row['food']}";
                              $stmt = $pdo->query($sql);
                              $results = $stmt->fetchAll();
                              foreach ($results as $row) {
                                echo $row['user_name'];
                              }
                        ?>
                    </p>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <small>&copy; ○○○</small>
        </div>
    </footer>
  </body>
</html>