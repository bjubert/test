document.addEventListener('DOMContentLoaded', principale);
function principale(){
    console.log("bonjour");
    i = 0;

    while(i<=22){
        afficheImage(i);
        i++
    }


    let images = document.querySelectorAll(".imageGalerie");
    let nbImage = images.length;
    console.log(images);
    console.log(nbImage);

    for(y=1; y < nbImage; y++){
        images[y].addEventListener('mouseover', grandirImage());
        images[y].addEventListener('mouseout', grandirImage());
    }

    function afficheImage(i){
        let imageInv = document.querySelector(".invisible");
        let nouvelleImage = imageInv.cloneNode(true);
        let galerie = document.querySelector(".galerie");
        let src = "css/imagesGalerie/"+i+".jpg";
        galerie.append(nouvelleImage);
        nouvelleImage.classList.remove("invisible");
        nouvelleImage.setAttribute("src",src);
    }

    function grandirImage(){
        console.log('grandi');
        this.classList.toggle("grandir");
    }

}