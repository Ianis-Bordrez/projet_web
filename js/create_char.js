$(document).ready(function(){
    var gender = "male";
    var curr_char = 0;
    var base_path = "img/char/";
    var char_m = ["char_m_0", "char_m_1", "char_m_2", "char_m_3"];
    var char_w = ["char_w_0", "char_w_1", "char_w_2", "char_w_3"];

    $(document).on('click', '.next_char', function(){
        nextChar();
        loadChar()
        });

    $(document).on('click', '.prev_char', function(){
        prevChar();
        loadChar()
    });

    function nextChar() {
        curr_char++; // increase i by one
        if (gender == "male") {
            curr_char = curr_char % char_m.length; // if we've gone too high, start from `0` again
        } else {
            curr_char = curr_char % char_w.length; // if we've gone too high, start from `0` again
        }
    }
    
    function prevChar() {
        if (curr_char === 0) { // i would become 0
            if (gender == "male") {
                curr_char = char_m.length; // so put it at the other end of the array
            } else {
                curr_char = char_w.length;
            }
        }
        curr_char--; // decrease by one
    }

    function getChar() {
        if (gender == "male") {
            return char_m[curr_char];
        }
        return char_w[curr_char];

    }

    function loadChar() {
        char_img = getChar()
        document.getElementById('current_char_img').src= base_path + char_img + ".png";
    }

    $(document).on('click', '.male_char', function(){
        gender = "male";
        loadChar();
    });
    $(document).on('click', '.female_char', function(){
        gender = "female";
        loadChar();
    });


    $(document).on('click', '.create_char', function(){
        var namee = $('#pseudo').val();
        var classe = null;
        switch (curr_char) {
            case 0:
                classe = "NINJA";
                break;
            case 1:
                classe = "SHAMAN";
                break;
            case 2:
                classe = "SURA";
                break;
            case 3:
                classe = "WARRIOR";
                break;
        }

        $.ajax({
            url:"script/s_create_char.php",
            type:"POST",
            data:{name:namee, class:classe,gender:gender},
            success:function() {
                location.replace("char.php");
            }
        })
    });
});
