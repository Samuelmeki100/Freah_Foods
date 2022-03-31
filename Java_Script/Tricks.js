$(document).ready(function(){
	//XMLHttpRequest Object
	const xmlhttp = new XMLHttpRequest();
	
    xmlhttp.onload = function() {
        const myObj = JSON.parse(this.responseText);
        let text = "";
        for (let x in myObj) {
            //if status is null set on check if not then its unchecked
            if(myObj[x].type == "live stock" ){
				
                $("#livestock").append("" +
                    "<div class='card'>" +
                    "   <img src='images/livestock/"+myObj[x].name+".svg' alt='' class='card__img'>" +
                    "   <div class='card__data'>" +
                    "       <h1 class='card__title'>"+myObj[x].name+"</h1>" +
                    "       <span class='card__preci'>MKW "+numberWithCommas(myObj[x].price)+"</span>" +
                    "       <p class='card__description'>Size 1.6 m / 850 kg.</p>" +
                    "       <a href='#' onclick='addProductstoCart("+myObj[x].id+")' class='card__button'> Cart </la>" +
                    "   </div>" +
                    "</div>");
					
            }else if(myObj[x].status=="vegetable"){
				
                $("#ck_event_list").append("");
					
            }
        }

    };

	//get Events
    xmlhttp.open("GET", "PHP/Get_all_Farming_Types.php");
    xmlhttp.send();

    //Numbers with Commas
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    //add to cart function

	
});

function Cart_counter(){
    const CountOBJ=$("#counter");
    let counter=parseInt ($("#counter").text());

    if($("#counter").text()==""){
        addProductstoCart()
        $("#counter").text(1)
    }else{
        $("#counter").text(counter+=1);
    }

}


function addProductstoCart(Product_id){
    $.post("demo_test_post.asp",
        {
            name: "Donald Duck"
        },
        function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
}

function  pop_wide() {
    $("#pop_wide").toggleClass("pop_wide");
}

function insertLO() {
    pop_wide();
    const content = "<input type='text' id='emial'> <button onclick='login()'></button>";
    //empty pop wide
    $("#pop_wide").html(" ");

    //set pop wide
    $("#pop_wide").html(content);
}

function removeLO(){
    $("#pop_wide").html("content");$("#pop_wide").toggleClass("pop_wide");
}
