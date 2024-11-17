// PROGRAM

const display = document.getElementById("display")

function appendToDisplay(input){
    display.value += input;

}
function deleteBackDisplay(input){
    let lastIndex = display.value.length;
    display.value = display.value.substring(0, lastIndex -1);
    
    
}
function last_Display(input){
    display.value = last_Value ;

}


function calculate(){
    try{
        last_Value = display.value = eval(display.value);
    }
    catch(error){
        display.value = "Error"

    }
    

}



function clearDisplay(){
    display.value = "";

}