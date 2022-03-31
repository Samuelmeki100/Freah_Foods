<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Axis</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="CSS/Rating.css">
	<link rel="stylesheet" type="text/css" href="CSS/fonts.css">
	<script src="Java_Script/jquery-3.6.0.js"></script>
	<script src="Java_Script/Tricks.js"></script>
	<script src="Java_Script/Rating.js"></script>
    <style>
        .pop_wide{
            position: absolute;
            width: 100%;
            background-color: #1b1e21eb;
            height: 100%;
            z-index: 4;
        }
    </style>

</head>
<body>
<div id="pop_wide"  >

</div>

        <nav class="nav">
            <img src="images/AXIS.svg">

            <ul class="middlenav">
                <a href="#">Grid</a>
                <a href="#">Tools</a>
                <a href="#">Crops</a>
                <a href="#">Animals</a>
                <a href="#" >Shop</a>
                <a href="#"class="active">Home</a>
            </ul>
            <div class="lastnav">

                <a href="#" style=" text-decoration: none;" onclick="pop_wide()">
                    <span style="padding:2px;right: 143px;background-color: #22662b;border: solid;border-radius: 100%;text-decoration: none;color: #FFF; font-weight: 700; position: absolute;"><label id="counter"><strong></strong></label></span>
                    <img src="images/cart.svg" width="30px">

                </a>
                <a href="#"><img src="images/heart.svg" width="30px"></a>
                <a href="#" onclick="insertLO()"><img src="images/dp.jpg" width="32px" height="32px" class="display-photo"></a>
            </div>
            <hr>
        </nav>
        <div class="app-body">
            <nav class="navigation">
                <li>Filter</li>
                <ul>Catergories
                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>



                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="cb1">
                        <label for="cb1">Checkbox 1</label>
                    </div>

                    <div class="cselect"><select><option>Others</option></select></div>
                </ul>
                <li>Price
                    <form class="form-inline" action="/action_page.php">

                        <input type="number" id="min" placeholder="Min" name="min">

                        <input type="number" id="max" placeholder="Max" name="max">


                    </form><button type="submit" class="sub">Submit</button>
                </li>

                <li>Rating
                    <div class="hb-ratingbar" data-rated="2.5">
                        <i class="unfilled"></i>
                        <i class="filled"></i>
                        <svg class="cover" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 50" preserveAspectRatio="none" fill="currentColor"><path d="M0 0v50h250V19l-12 13 3 18-16-9-15 9 3-18-13-13-12 13 3 18-16-9-15 9 3-18-13-13-12 13 3 18-16-9-15 9 3-18-13-13-12 13 3 18-16-9-15 9 3-18-13-13-12 13 3 18-16-9-15 9 3-18L0 19l17-3 8-16Zm50 19 17-3 8-16H25l8 16zm50 0 17-3 8-16H75l8 16zm50 0 17-3 8-16h-50l8 16zm50 0 17-3 8-16h-50l8 16zm25-19 8 16 17 3V0Z"/></svg>

                    </div></li>

                <li style="border-bottom: none;">ad</li>
            </nav>
        </div>

        <!----------------main body---------------->

        <div class="div2">
            <div class="search_wrap search_wrap_6">
                <div class="search_box">
                    <input type="text" class="input" placeholder="search...">
                    <div class="btn">
                        <p>Search</p>
                    </div>
                </div>
            </div>
            <div id="product_container">

                <h4> live stock</h4>
                <div id="livestock" class="items">
                    <!-- live stock pics -->
                </div>

                <h4>fruits </h4>
                <div id="Fruit" class="items">
                    <!-- Fruits go there pics -->
                </div>
         </div>
        </div>

</body>
<script>

    function login(){
        alert(document.getElementsByName(email).values());
        let email=$("#email").val();
        let pass =$("#pass").val();
        ///check if not empty
    if(email.length >3 ||pass.length > 3){
        $.post("php/login.php",
            {
                email: email,
                pass: pass
            },
            function(data, status){
                if(data == "success"){
                    alert("Welcome "+ getCookie("userName"));
                }else {
                    alert(data );
                }

            });
        }
    }
    $("#mySidenav").load("Pages/LogIn_and_Create_Account/Login.html");

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>
</html>