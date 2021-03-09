const {
    default: axios
} = require("axios");

const formAddToCart = document.querySelector('.form-add-to-cart');

if (formAddToCart) {
    formAddToCart.addEventListener('submit', (e) => {
        e.preventDefault();
        const data = new FormData(formAddToCart);

        axios.post('/cart/add', data)
            .then(function (response) {
                showCart(response.data);
            });
    });
}
document.querySelector('.clear-cart').addEventListener('click', ()=>{
   axios.post('/cart/clear')
   .then(function (response) {
       showCart(response.data);
   });
});

let cartModal = new bootstrap.Modal(document.getElementById('cartModal'));

function showCart(cart){
   document.querySelector('.modal-body').innerHTML = cart;
   cartModal.show();
}

// const clearItems = document.querySelectorAll('.remove-item');

// for ( const clearItem of clearItems){
//    clearItem.addEventListener('click', ()=>{
//       alert(123);
//    });
// }
document.querySelector('.modal-body').addEventListener('click',(e)=>{
   if( e.target.classList.contains('remove-item') ){
      const id = e.target.dataset.id;
      axios.post('/cart/remove/' + id)
           .then(function (response) {
               showCart(response.data);
      });
   }
});

document.querySelector('.modal-body').addEventListener('change',(e)=>{
   
   if( e.target.classList.contains('qty-item') ){
      const id = e.target.dataset.id;
      const qty = e.target.value;
      axios.post('/cart/change-qty', {
         id: id,
         qty: qty,
      })
           .then(function (response) {
               showCart(response.data);
      });
   }
})
