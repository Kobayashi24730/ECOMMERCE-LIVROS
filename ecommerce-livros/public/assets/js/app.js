// carrinho simples usando sessionStorage (ou localStorage)
(function(){
  function getCart(){
    return JSON.parse(sessionStorage.getItem('cart')||'[]');
  }
  function saveCart(cart){ sessionStorage.setItem('cart', JSON.stringify(cart)); renderCount(); }
  function renderCount(){
    const cart = getCart();
    let totalItems = cart.reduce((s,i)=>s+i.quantity,0);
    document.getElementById('cart-count').textContent = totalItems;
  }

  document.addEventListener('click', function(e){
    if(e.target.matches('.add-to-cart')){
      const id = e.target.dataset.id;
      const title = e.target.dataset.title;
      const price = parseFloat(e.target.dataset.price);
      const cart = getCart();
      const item = cart.find(x=>x.id==id);
      if(item) item.quantity++;
      else cart.push({id, title, price, quantity:1});
      saveCart(cart);
      alert('Adicionado ao carrinho: '+title);
    }
  });

  // inicializa
  renderCount();
  window.getCart = getCart; // expõe para checkout
})();
