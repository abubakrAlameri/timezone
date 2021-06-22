let readURL = function (file,id='') {
    console.log(id);
    if (file.files && file.files[0]) {
        let reader = new FileReader();

        reader.readAsDataURL(file.files[0]);
        reader.onload = function (e) {
            if(id == '')
            document.querySelector('#d_img').src = e.target.result;
            else
                document.querySelector(id).src = e.target.result;
            
        }
    }

}