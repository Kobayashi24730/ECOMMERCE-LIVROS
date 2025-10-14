<?php
require_once __DIR__.'/../app/product_model.php';
$products = getAllProducts();
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>EcoWoman - Produtos</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <header class="site-header">
    <h1>EcoWoman</h1>
    <form id="search-menu">
      <label>Pesquisar<input></label>
    </form>
    <nav id="nav-menu">
      <button>menuLojas</button>
      <a href="/public/cart.php">Carrinho (<span id="cart-count">0</span>)</a>
    </nav>
  </header>

  <!-- TOPO OFERTAS -->
  <section id="TOPO-OFERTAS">
    <button class="TOPO-BTN">
    <img class="img">
    <botton class="TOPO-BTN">
    </section>

  <!-- TOPO FLASH PRODUTOS -->
  <main class="product-grid">
    <?php $imagens = glob("assets/img/*.jpeg"); foreach($products as $index => $p): $img = isset($imagens[$index]) ? $imagens[$index] : "assets/img/default.jpeg";?>
      <article class="product-card">
        <img src="<?php echo htmlspecialchars($img);?>" alt="">
        <h2><?php echo htmlspecialchars($p['title']); ?></h2> 
        <p class="price">R$ <?php echo number_format($p['price'],2,',','.'); ?></p>
        <a class="btn" href="/public/product.php?id=<?php echo $p['id']; ?>">Ver</a>
        <button class="btn add-to-cart" data-id="<?php echo $p['id']; ?>" data-title="<?php echo htmlspecialchars($p['title']); ?>" data-price="<?php echo $p['price']; ?>">Adicionar</button>
      </article>
    <?php endforeach; ?>

  </main>

  
  <!-- products estilo -->
  <main class="product-grid">
    <?php $imagens = glob("assets/img/*.jpeg"); foreach($products as $index => $p): $img = isset($imagens[$index]) ? $imagens[$index] : "assets/img/default.jpeg";?>
      <article class="product-card">
        <img src="<?php echo htmlspecialchars($img);?>" alt="">
        <h2><?php echo htmlspecialchars($p['title']); ?></h2> 
        <p class="price">R$ <?php echo number_format($p['price'],2,',','.'); ?></p>
        <a class="btn" href="/public/product.php?id=<?php echo $p['id']; ?>">Ver</a>
        <button class="btn add-to-cart" data-id="<?php echo $p['id']; ?>" data-title="<?php echo htmlspecialchars($p['title']); ?>" data-price="<?php echo $p['price']; ?>">Adicionar</button>
      </article>
    <?php endforeach; ?>

  </main>


  <script src="/assets/js/app.js"></script>
</body>
</html>
