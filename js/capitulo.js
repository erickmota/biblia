$(window).scroll(function(){

    /* Anima e mostra o nome do livro */
    if($(window).scrollTop() > $("#versao").offset().top){

        $("#barraTituloLivro").css({"opacity": "1"});
        $("#barraTituloLivro").slideDown(150);

    }else{

        $("#barraTituloLivro").slideUp(150);

    }

})