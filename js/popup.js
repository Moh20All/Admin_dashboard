let myElement=document.getElementById("tab-p");
console.log(myElement)
        function open_p(){
            myElement.classList.add("pop-trans");
        }
        function close_p(){
            myElement.classList.remove("pop-trans");
        }