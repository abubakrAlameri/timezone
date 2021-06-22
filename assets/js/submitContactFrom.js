const form = document.querySelector('#contact_form');

form.addEventListener('submit', (e)=>{
    e.preventDefault();
    let FD = new FormData(form);
    const xhtt = new XMLHttpRequest();
    xhtt.onreadystatechange = () =>{
        if(xhtt.readyState != 4)
        {
            document.querySelector('#loader').style.display ="inline-block";
        }
        else
        {
            document.querySelector('#loader').style.display = "none";
            console.log(xhtt.responseText);
            console.log(xhtt.readyState);
        }
       
     
    }
    xhtt.open('POST','/timezone/home/submitForm',true);
    xhtt.send(FD);
});
