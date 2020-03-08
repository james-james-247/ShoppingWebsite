$(function(){
    $("#cart").on("click", function(){
        window.location.replace("cart.php");
    });
    $("#profileLogo").on("click", function(){
        window.location.replace("profile.php");
    });
    $("#helpButton").on("click", function(){
        if($("#helpButton").val() == "Help"){
            $("#helpInfo").attr("hidden", false);
            $("#helpButton").val("Hide Help");
        }
        else{
            $("#helpInfo").attr("hidden", true);
            $("#helpButton").val("Help");
        }
    });

    //This is the code required for the page slideshow.html to function 
    imageArray = ["Photos/slideshow-image1.jpg", "Photos/slideshow-image2.jpg", "Photos/slideshow-image3.jpg"];
    thumnailArray = ["image0", "image1", "image2"];
    phraseArray = ["N2S Phone 1", "N2S Phone 2", "N2S Phone 2 Pro"];
    imageCounter = 0;
    $("#backButton").on("click", function(){
        if(imageCounter === 0){
            thumbnailImage = "#" + thumnailArray[imageCounter];
            $(thumbnailImage).css("border-bottom", "none");
            imageCounter = imageArray.length - 1;
            changing(imageCounter);
        }
        else{
            imageCounter--;
            changing(imageCounter);
        }
    });
    $("#nextButton").on("click", function(){
        thumbnailImage = "#" + thumnailArray[imageCounter];
        $(thumbnailImage).css("border-bottom", "none");
        if(imageCounter == imageArray.length - 1){
            imageCounter = 0;
            changing(imageCounter);
        }
        else{
            imageCounter++;
            changing(imageCounter);
        }
    });

    function changing(imageCounter){
        chosenImage = imageArray[imageCounter];
        $("#slideshowImage").fadeTo(1000, 0.2, function() {
            $("#slideshowImage").attr("src", chosenImage).fadeTo(3000, 1);
            $("#slideshowText").html(phraseArray[imageCounter]);
        });
        thumbnailImage = "#" + thumnailArray[imageCounter];
        $(thumbnailImage).css("border-bottom", "black 2px solid");
    }

    $("#password").on("keyup", checker);
    $("#confirmPassword").on("keyup", checker);
    function checker(){
        password = $("#password").val();
        cPassword = $("#confirmPassword").val();
        if(password == cPassword && password != "")
        {
            $(".submitButton").attr("disabled", false);
        }
        else{
            $(".submitButton").attr("disabled", true);
        }
    }
});