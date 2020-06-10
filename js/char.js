$(document).ready(function(){
    var gender = "m";
    var curr_char = 0;
    var base_path = "img/char/";
    var char_m = ["char_m_0", "char_m_1", "char_m_2", "char_m_3"];
    var char_w = ["char_w_0", "char_w_1", "char_w_2", "char_w_3"];

    $(document).on('click', '.next_char', function(){
        char_img = nextChar();
        console.log(curr_char);
        document.getElementById('current_char_img').src= base_path + char_img + ".png";
        });

    $(document).on('click', '.prev_char', function(){
        char_img = prevChar();
        console.log(curr_char);
        document.getElementById('current_char_img').src= base_path + char_img + ".png";
    });

    function nextChar() {
        curr_char++; // increase i by one
        if (gender == "m") {
            curr_char = curr_char % char_m.length; // if we've gone too high, start from `0` again
            return char_m[curr_char]; // give us back the item of where we are now
        } else {
            curr_char = curr_char % char_w.length; // if we've gone too high, start from `0` again
            return char_w[curr_char]; // give us back the item of where we are now
        }
    }
    
    function prevChar() {
        if (curr_char === 0) { // i would become 0
            if (gender == "m") {
                curr_char = char_m.length; // so put it at the other end of the array
            } else {
                curr_char = char_w.length;
            }
        }
        curr_char--; // decrease by one
        if (gender == "m") {
            return char_m[curr_char]; // give us back the item of where we are now
        } else {
            return char_w[curr_char];
        }
    }
});
