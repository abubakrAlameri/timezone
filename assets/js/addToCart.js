const prodcutForm = document.querySelectorAll('.add-to-cart');

const loadingSpinner = document.createElement('div');
loadingSpinner.style.cssText = `
            position: fixed; 
            top:50%; left:50%; 
            transform: translate(-50%,-50%); 
            width: 5rem; height: 5rem;
            `;
loadingSpinner.innerHTML = `<div class="spinner-border" style="width: 5rem; height: 5rem;"><span class="sr-only"></span></div>`;
        
prodcutForm.forEach(f => {
    f.addEventListener('click',(e)=>{
        document.body.appendChild(loadingSpinner);
        const xhtt = new XMLHttpRequest();
        xhtt.addEventListener('readystatechange',(e) => {
                if (xhtt.readyState == 4)
                    loadingSpinner.remove();
        });

        xhtt.open('POST','/timezone/shop/addToCart',true);
        xhtt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     
        xhtt.send(`p_id=${f.getAttribute('id')}`);
    })
});