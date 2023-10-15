// Swiper
let swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


 function addProducto(id, token) {
                let url = '../clases/carrito.php'
                let formData = new FormData()
                formData.append('id', id)
                formData.append('token', token)
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                    
                }).then(response => response.json())
                .then(data=>{
                    if(data.ok){
                        let elemento =document.getElementById('num_cart');
                       elemento.innerHTML = data.numero;
                    }
                })

            }
 